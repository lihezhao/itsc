<?php

class Exif extends BaseExif {
	private $imgtype = array("", "GIF", "JPG", "PNG", "SWF", "PSD", "BMP", "TIFF(intel byte order)", "TIFF(motorola byte order)", "JPC", "JP2", "JPX", "JB2", "SWC", "IFF", "WBMP", "XBM");
	
	public function getFileType() {
		return $this->imgtype[$this->fileType];
	}
		
	public function getThumb($width, $height) {
	
		$dir = pathinfo($this->pathName, PATHINFO_DIRNAME);
		$file = pathinfo($this->pathName, PATHINFO_BASENAME);
		$baseThumbPath  = str_replace(Yii::app()->params['imagePath'],
				Yii::app()->params['thumbPath'], $dir);
		$thumbPath = $baseThumbPath . "//{$width}x{$height}";
		$fileName = $thumbPath . '/' . $file;
		if (file_exists($fileName)) {
		} else {
			$image = Yii::app()->image->load($this->pathName);
	
			$image->resize($width, $height);
			switch ($this->orientation) {
				case 6:
					$image->rotate(90);
					break;
				case 8:
					$image->rotate(270);
					break;
			}
	
			if (is_dir($thumbPath)) {
			} else {
				mkdir($thumbPath,0777,true);
			}
			$image->save($fileName);
		}
		return str_replace(Yii::app()->params['thumbPath'],
				Yii::app()->params['thumbUrl'], $fileName);
	}
}
