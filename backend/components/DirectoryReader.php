<?php
class DirectoryReader {
	
	private function saveImage($fileName) {
		
		$image = Image::model()->find('path=:path', array(':path'=>$fileName));
		if ($image) {
		} else {
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
	}
	
	public function getFileCount($path) {
		$find = Yii::app()->cache->get($path);
		if ($find === false) {
			$find = FileHelper::findFiles($path);
			Yii::app()->cache->set($path, $find);
		}
		return count($find['files']) + count($find['folderFiles'], COUNT_RECURSIVE) - count($find['folderFiles']); 
	}
	
	public function read($path, $index, $count) {
		if ($index == 0) {
			Yii::app()->cache->delete($path);
		}
		$find = yii::app()->cache->get($path);
		if ($find === false) {
			$find = FileHelper::findFiles($path);
			Yii::app()->cache->set($path, $find);
		}
		if ($find != false) {
			$pos = 0;
			$i = 0;
			
			foreach ($find['files'] as $file) {
				if ($pos < $index) {
					$pos++;
					continue;
				}
				$this->saveImage($file);
				$i++;
				if ($i == $count) return $i;
			}
			
			foreach ($find['folderFiles'] as $folder => $files) {
				foreach ($files as $file) {
					if ($pos < $index) {
						$pos++;
						continue;
					}
					$this->saveImage($file);
					$i++;
					if ($i == $count) return $i;
				}
			}
			return $i;
		}
		return false;
	}
}