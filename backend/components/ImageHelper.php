<?php
class ImageHelper {
	public static function thumb($filename, $thumbFilename, $size, $options = array()) {
//		print_r($filename);
//		print_r($thumbFilename);exit;
		@$exifData = exif_read_data($filename, "IFD0");
		$orientation = 0;
		if ($exifData === false) {
		} else {
			$exifData = exif_read_data($filename, 0, true);
			$orientation = $exifData['IFD0']['Orientation'];
		}
		Yii::import('application.extensions.image.Image');
		try {
			$image = new Image($filename);
			$image->resize($size, $size);
			switch ($orientation) {
				case 6:
					$image->rotate(90);
					break;
				case 8:
					$image->rotate(270);
					break;
			}
			$dir = pathinfo($thumbFilename, PATHINFO_DIRNAME);
			if (is_dir($dir)) {
			} else {
				mkdir($dir, 0777, true);
			}
			$er = error_reporting(0);
			$image->save($thumbFilename);
			error_reporting($er);
		} catch (Exception $e) {
		}
	}
	
	public static function batchThumb($size, $start, $count) {
		
		$imagePath = Yii::app()->params['imagePath'];
		$thumbPath = Yii::app()->params['thumbPath'] . '/' . $size;
	
		if ($start == 0) {
			Yii::app()->cache->delete('batchThumb');
		}
		$files = self::getFiles();
		
		if ($files != false) {
			$fileCount = sizeof($files);
			$count = $start + $count;
				
			for ($pos = $start, $i = 0; $i < $count - $start; $pos++) {
				$thumbFilename = str_replace($imagePath, $thumbPath, $files[$pos]);
				if (file_exists($thumbFilename)) {
					
				} else {
					ImageHelper::thumb(
							$files[$pos],
							$thumbFilename,
							$size);
					$i++;
				}
				if ($pos >= $fileCount) break;
			}
		
			return $pos;
		}
		
		return false;
	}
	
	public static function getFileCount() {
		$count = Yii::app()->cache->get('batchThumbCount');
		if ($count == false) {
			self::getFiles();
			$count = Yii::app()->cache->get('batchThumbCount');
		}
		return $count;
	}
	
	public static function getFiles() {
		$result = Yii::app()->cache->get('batchThumb');
		if ($result === false) {
			$imagePath = Yii::app()->params['imagePath'];
			$find = FileHelper::findFiles($imagePath);
			$result = array();
			foreach ($find['files'] as $filename) {
				$result[] = $filename;
			}
			foreach ($find['folderFiles'] as $folder => $files) {
				foreach($files as $filename) {
					$result[] = $filename;
				}
			}
			Yii::app()->cache->set('batchThumb', $result);
			Yii::app()->cache->set('batchThumbCount', sizeof($result));
		}
		return $result;
	}
	
}