<?php
class DirectoryReader {
	public function read($path) {
		$di = new DirectoryIterator($path);
		$exifReader = new ExifReader();
		foreach ($di as $file) {
			if ($file->isFile()) {
				$fileName = $file->getPathname();
				$image = ImageFile::model()->find('path=:path', array(':path'=>$fileName));
				if ($image) {
				} else {
					$exif = $exifReader->read($fileName);
					if ($exif->fileType != 0) {
						$image = new ImageFile();
						$image->path = $fileName;
						if (!$image->save()) {
							print_r($image->getErrors());exit;
						}
						$exif->id = $image->id;
						$exif->insert();
					}
				}
			}
		}
	}
}