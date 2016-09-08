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
	
	public static function listData($field) {
		$result = array();
		$sql = "select $field, count(*) as cnt from {{exif}} group by $field";
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
	
	public function search() {
		$criteria = new CDbCriteria();
	
		$criteria->addInCondition('isoSpeedRatings', $this->ISOSpeedRatings);
		$criteria->addInCondition('make', $this->make);
		$criteria->addInCondition('flash', $this->flash);
		$criteria->addInCondition('focalLength', $this->focalLength);
		$criteria->addInCondition('exposureTime', $this->exposureTime);
		$criteria->addInCondition('apertureFNumber', $this->apertureFNumber);
		$criteria->addInCondition('model', $this->model);
		$criteria->addInCondition('exposureBiasValue', $this->exposureBiasValue);
		$criteria->addInCondition('meteringMode', $this->meteringMode);
		$criteria->addInCondition('lightSource', $this->lightSource);
		
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	
}
