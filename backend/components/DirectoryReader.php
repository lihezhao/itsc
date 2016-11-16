<?php
class DirectoryReader {
	
	private function saveImage($fileName) {
		$exif = ExifReader::read($fileName);
		if ($exif->fileType != 0) {
			$image = new Image();
			$image->path = $fileName;
			$image->status = Image::STATUS_HIDE;
			if (!$image->save()) {
				print_r($image->getErrors());exit;
			}
			$image = Image::model()->find('path=:path', array(':path'=>$fileName));
			$exif->id = $image->id;
			$exif->insert();
		}
	}
	
	public function read($path, $start, $count) {
		if ($index == 0) {
			Yii::app()->cache->delete($path);
		}
		$files = FileHelper::getFiles($path);
	
		if ($files != false) {
			$fileCount = sizeof($files);
			$count = $start + $count;
			
			for ($pos = $start, $i = 0; $i < $count - $start; $pos++) {
				$image = Image::model()->find('path=:path', array(':path' => $files[$pos]));
				if ($image) {
				} else {
					$this->saveImage($files[$pos]);
					$i++;
				}
				if ($pos >= $fileCount) break;
			}
			
			return $pos;
		}
		return false;
	}
}