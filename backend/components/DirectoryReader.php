<?php
class DirectoryReader {
	public function read($path, $index) {
		$find = Folder::findFiles($path);
		if ($find != false) {
			$pos = 0;
			$count = 0;
			$exifReader = new ExifReader();
			foreach ($find['files'] as $file) {
				if ($pos < $index) {
					$pos++;
					continue;
				}
				
				$count++;
			}
		}
		
		
		foreach ($di as $file) {
			if ($file->isFile()) {
				$fileName = $file->getPathname();
				$image = Image::model()->find('path=:path', array(':path'=>$fileName));
				if ($image) {
				} else {
					$exif = $exifReader->read($fileName);
					if ($exif->fileType != 0) {
						$image = new Image();
						$image->path = $fileName;
						if (!$image->save()) {
							print_r($image->getErrors());exit;
						}
						$image = Image::model()->find('path=:path', array(':path'=>$fileName));
						$exif->id = $image->id;
						$exif->insert();
					}
				}
			}
		}
	}
}