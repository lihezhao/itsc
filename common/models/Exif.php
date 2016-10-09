<?php

class Exif extends BaseExif {
	private $imgtype = array("", "GIF", "JPG", "PNG", "SWF", "PSD", "BMP", "TIFF(intel byte order)", "TIFF(motorola byte order)", "JPC", "JP2", "JPX", "JB2", "SWC", "IFF", "WBMP", "XBM");
	
	public function getFileType() {
		return $this->imgtype[$this->fileType];
	}
	
	public function getDataSize($size) {
		if ($this->height > $this->width) {
			$width = $size * $this->width / $this->height;
			$height = $size;
		} else {
			$width = $size;
			$height = $size * $this->height / $this->width;
		}
		if ($this->orientation == 6 || $this->orientation == 8) {
			$oldWidth = $width;
			$width = $height;
			$height = $oldWidth;
		}
		
		return $width . 'x' . $height;
	}
	
	public function getThumbPath($width, $height) {
		$dir = pathinfo($this->pathName, PATHINFO_DIRNAME);
		$baseThumbPath  = str_replace(Yii::app()->params['imagePath'],
				Yii::app()->params['thumbPath'], $dir);
		return $baseThumbPath . "/{$width}x{$height}";
	}
	
	public function thumbFile($width, $height) {
		$thumbPath = $this->getThumbPath($width, $height);
		$file = pathinfo($this->pathName, PATHINFO_BASENAME);
		$fileName = $thumbPath . '/' . $file;
		return file_exists($fileName) ? Yii::app()->baseUrl . str_replace(Yii::app()->params['thumbPath'],
				Yii::app()->params['thumbUrl'], $fileName) : false;
	}

	public function getThumb($width, $height) {
		$thumbPath = $this->getThumbPath($width, $height);
		$file = pathinfo($this->pathName, PATHINFO_BASENAME);
		$fileName = $thumbPath . '/' . $file;
		if (file_exists($fileName)) {
		} else {
			Yii::import('application.extensions.image.Image');
			$image = new Image($this->pathName);
	
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
		return Yii::app()->baseUrl . str_replace(Yii::app()->params['thumbPath'],
				Yii::app()->params['thumbUrl'], $fileName);
	}
	
	private static $meteringModeArr = array(
		"0"   =>  "未知",
		"1"   =>  "平均",
		"2"   =>  "中央重点平均测光",
		"3"   =>  "点",
		"4"   =>  "分区",
		"5"   =>  "评估",
		"6"   =>  "局部",
		"255" =>  "其他"
    );
	
	private static $lightSourceArr = array(
		"0"    =>  "未知",
		"1"    =>  "日光",
		"2"    =>  "荧光灯",
		"3"    =>  "钨丝灯",
		"10"  =>  "闪光灯",
		"17"  =>  "标准灯光A",
		"18"  =>  "标准灯光B",
		"19"  =>  "标准灯光C",
		"20"  =>  "D55",
		"21"  =>  "D65",
		"22"  =>  "D75",
		"255"  =>  "其他"
    );
	
	private static $resolutionUnitArr = array(
		"",
		"",
		"英寸",
		"厘米");
	
	private static function getVal($name, $arr) {
		return isset($arr[$name]) ? $arr[$name] : '未知'; 
	}
	
	public static function listData($field, $front = true) {
		$result = array();
		$sql = "select $field, count(*) as cnt from {{exif}} e, {{image}} i where e.id=i.id ";
		if ($front) {
			$sql .= 'and i.status=' . Image::STATUS_SHOW . ' ';
		}
		$sql .= "group by $field";
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$rows = $command->queryAll();
		foreach ($rows as $row) {
			switch ($field) {
				case 'meteringMode':
					$val = self::getVal($row[$field], self::$meteringModeArr);
					break;
				case 'lightSource':
					$val = self::getVal($row[$field], self::$lightSourceArr);
					break;
				default:
					$val = $row[$field] == '' ? '未知' : $row[$field];
			}
			$key = $row[$field] == '' ? 'unknown' : $row[$field];
			$result[$key] = $val . '(' . $row['cnt'] . ')';
		}
		return $result;
	}
	
	public function search($type = 'front') {
		$criteria = new CDbCriteria();
		if ($type == 'front') {
			$criteria->join = 'INNER JOIN {{image}} ON t.id={{image}}.id';
			$criteria->addCondition('{{image}}.status>=' . Image::STATUS_SHOW);
		} else if ($type == 'home') {
			$criteria->join = 'INNER JOIN {{image}} ON t.id={{image}}.id';
			$criteria->addCondition('{{image}}.status=' . Image::STATUS_HOMEPAGE);
		}
		if (isset($this->ISOSpeedRatings)) {
			$criteria->addInCondition('isoSpeedRatings', $this->ISOSpeedRatings);
		}
		if (isset($this->make)) {
			$criteria->addInCondition('make', $this->make);
		}
		if (isset($this->flash)) {
			$criteria->addInCondition('flash', $this->flash);
		}
		if (isset($this->focalLength)) {
			$criteria->addInCondition('focalLength', $this->focalLength);
		}
		if (isset($this->exposureTime)) {
			$criteria->addInCondition('exposureTime', $this->exposureTime);
		}
		if (isset($this->apertureFNumber)) {
			$criteria->addInCondition('apertureFNumber', $this->apertureFNumber);
		}
		if (isset($this->model)) {
			$criteria->addInCondition('model', $this->model);
		}
		if (isset($this->exposureBiasValue)) {
			$criteria->addInCondition('exposureBiasValue', $this->exposureBiasValue);
		}
		if (isset($this->meteringMode)) {
			$criteria->addInCondition('meteringMode', $this->meteringMode);
		}
		if (isset($this->lightSource)) {
			$criteria->addInCondition('lightSource', $this->lightSource);
		}
		if (isset($this->pathName)) {
			$condition = array();
			if (is_array($this->pathName)) {
				foreach ($this->pathName as $pathName) {
					$condition[] = 'pathName like "' . str_replace('\\', '\\\\\\\\', Yii::app()->params['imagePath'] . '/' . $pathName) . '%"';
				}
			} else {
				$condition[] = 'pathName like "' . str_replace('\\', '\\\\\\\\', Yii::app()->params['imagePath'] . '/' . $this->pathName) . '%"';
			}
			$criteria->addCondition('(' . implode(') or (', $condition) . ')');
		}
		
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	
}
