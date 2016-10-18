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
		
			$image->save($thumbFilename);
		} catch (Exception $e) {
		}
	}
	
	public static function batchThumb($size, $index, $count) {
		$imagePath = Yii::app()->params['imagePath'];
		$thumbPath = Yii::app()->params['thumbPath'] . '/' . $size;
	
		if ($index == 0) {
			Yii::app()->cache->delete($imagePath);
		}
		$find = Yii::app()->cache->get($imagePath);
		if ($find === false) {
			$find = FileHelper::findFiles($imagePath);
			Yii::app()->cache->set($imagePath, $find);
		}
		if ($find != false) {
			$pos = 0;
			$i = 0;
				
			foreach ($find['files'] as $filename) {
				if ($pos < $index) {
					$pos++;
					continue;
				}
				$thumbFilename = str_replace($imagePath, $thumbPath, $filename);
				if (file_exists($thumbFilename)) {
					
				} else {
					ImageHelper::thumb(
							$filename,
							$thumbFilename,
							$size);
				}
				$i++;
				if ($i == $count) return $i;
			}
				
			foreach ($find['folderFiles'] as $folder => $files) {
				foreach ($files as $filename) {
					if ($pos < $index) {
						$pos++;
						continue;
					}
					ImageHelper::thumb(
							$filename,
							str_replace($imagePath, $thumbPath, $filename),
							$size);
					$i++;
					if ($i == $count) return $i;
				}
			}
			return $i;
		}
		return false;
	}
	
	public static function getFileCount() {
		$imagePath = Yii::app()->params['imagePath'];
		$find = Yii::app()->cache->get($imagePath);
		if ($find === false) {
			$find = FileHelper::findFiles($imagePath);
			Yii::app()->cache->set($imagePath, $find);
		}
		return count($find['files']) + count($find['folderFiles'], COUNT_RECURSIVE) - count($find['folderFiles']);
	
	}
	
}