<?php
class ImageService {
	const STATUS_HIDE = 0;
	const STATUS_SHOW = 1;
	const STATUS_HOMEPAGE = 2;
	
	private static $flashArr = array(
			0x0	 => "No Flash",
			0x1  => "Fired",
			0x5  => "Fired, Return not detected",
			0x7  => "Fired, Return detected",
			0x8	 => 'On, Did not fire',
			0x9  => 'On, Fired',
			0xd  => 'On, Return not detected',
			0xf  => 'On, Return detected',
			0x10 => 'Off, Did not fire',
			0x14 => 'Off, Did not fire, Return not detected',
			0x18 => 'Auto, Did not fire',
			0x19 => 'Auto, Fired',
			0x1d => 'Auto, Fired, Return not detected',
			0x1f => 'Auto, Fired, Return detected',
			0x20 => 'No flash function',
			0x30 => 'Off, No flash function',
			0x41 => 'Fired, Red-eye reduction',
			0x45 => 'Fired, Red-eye reduction, Return not detected',
			0x47 => 'Fired, Red-eye reduction, Return detected',
			0x49 => 'On, Red-eye reduction',
			0x4d => 'On, Red-eye reduction, Return not detected',
			0x4f => 'On, Red-eye reduction, Return detected',
			0x50 => 'Off, Red-eye reduction',
			0x58 => 'Auto, Did not fire, Red-eye reduction',
			0x59 => 'Auto, Fired, Red-eye reduction',
			0x5d => 'Auto, Fired, Red-eye reduction, Return not detected',
			0x5f => 'Auto, Fired, Red-eye reduction, Return detected',
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
	
	public static function getStatus($image) {
		switch ($image->status) {
			case self::STATUS_HIDE:
				$result = 'Hide';
				break;
			case self::STATUS_SHOW:
				$result = 'Show';
				break;
			case self::STATUS_HOMEPAGE:
				$result = 'Show and Home';
		}
		return $result;
	}
	
	public static function getAverageRating($image) {
		$result = 0;
		$count = sizeof($image->ratings);
		if ($count > 0) {
			$sum = 0;
			foreach ($image->ratings as $rating) {
				$sum += $rating->value;
			}
			$result = $sum / $count;
		}
		return $result;
	}
	
	public static function getTagLinks($image) {
		$links = array();
		foreach (Tag::string2array($image->tags) as $tag)
			$links[] = CHtml::link(CHtml::encode($tag), array('gallery/index', 'tag' => $tag));
			return $links;
	}
	
	
	
	public static function countGroupBy($field, $front = true) {
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
				case 'flash':
					$val = self::getVal($row[$field], self::$flashArr);
					break;
				default:
					$val = $row[$field] == '' ? '未知' : $row[$field];
			}
			$key = $row[$field] == '' ? 'unknown' : $row[$field];
			$result[$key] = $val . '(' . $row['cnt'] . ')';
		}
		return $result;
	}
	
	private static function getVal($name, $arr) {
		return Yii::t('app', isset($arr[$name]) ? $arr[$name] : '未知');
	}
	
	private static $imgtype = array("", "GIF", "JPG", "PNG", "SWF", "PSD", "BMP", "TIFF(intel byte order)", "TIFF(motorola byte order)", "JPC", "JP2", "JPX", "JB2", "SWC", "IFF", "WBMP", "XBM");
	
	public static function getFileType($image) {
		return self::$imgtype[$image->fileType];
	}
	
	public static function getDataSize($image, $size) {
		if ($image->height > $image->width) {
			$width = $size * $image->width / $image->height;
			$height = $size;
		} else {
			$width = $size;
			$height = $size * $image->height / $image->width;
		}
		if ($image->orientation == 6 || $image->orientation == 8) {
			$oldWidth = $width;
			$width = $height;
			$height = $oldWidth;
		}
	
		return $width . 'x' . $height;
	}
	
	public static function getRelativePath($image) {
		return str_replace(Yii::app()->params['imagePath'], '', $image->pathName);
	}
	
	public static function getThumbPath($image, $width, $height) {
		$dir = pathinfo($image->pathName, PATHINFO_DIRNAME);
		$baseThumbPath  = str_replace(Yii::app()->params['imagePath'],
				Yii::app()->params['thumbPath'], $dir);
		return $baseThumbPath . "/{$width}x{$height}";
	}
	
	public static function thumbFile($image, $width, $height) {
		$thumbPath = ImageService::getThumbPath($image, $width, $height);
		$file = pathinfo($image->pathName, PATHINFO_BASENAME);
		$fileName = $thumbPath . '/' . $file;
		return file_exists($fileName) ? Yii::app()->baseUrl . str_replace(Yii::app()->params['thumbPath'],
				Yii::app()->params['thumbUrl'], $fileName) : false;
	}
	
	public static function search($image, $type = 'front') {
		$criteria = new CDbCriteria();
		if ($type == 'front') {
			$criteria->join = 'INNER JOIN {{image}} ON t.id={{image}}.id';
			$criteria->addCondition('{{image}}.status>=' . self::STATUS_SHOW);
		} else if ($type == 'home') {
			$criteria->join = 'INNER JOIN {{image}} ON t.id={{image}}.id';
			$criteria->addCondition('{{image}}.status=' . self::STATUS_HOMEPAGE);
		}
		if (isset($image->id0->tags)) {
			$criteria->addSearchCondition('tags', $image->id0->tags);
		}
		if (isset($image->ISOSpeedRatings)) {
			$criteria->addInCondition('isoSpeedRatings', $image->ISOSpeedRatings);
		}
		if (isset($image->make)) {
			$criteria->addInCondition('make', $image->make);
		}
		if (isset($image->flash)) {
			$criteria->addInCondition('flash', $image->flash);
		}
		if (isset($image->focalLength)) {
			$criteria->addInCondition('focalLength', $image->focalLength);
		}
		if (isset($image->exposureTime)) {
			$criteria->addInCondition('exposureTime', $image->exposureTime);
		}
		if (isset($image->apertureFNumber)) {
			$criteria->addInCondition('apertureFNumber', $image->apertureFNumber);
		}
		if (isset($image->model)) {
			$criteria->addInCondition('model', $image->model);
		}
		if (isset($image->exposureBiasValue)) {
			$criteria->addInCondition('exposureBiasValue', $image->exposureBiasValue);
		}
		if (isset($image->meteringMode)) {
			$criteria->addInCondition('meteringMode', $image->meteringMode);
		}
		if (isset($image->lightSource)) {
			$criteria->addInCondition('lightSource', $image->lightSource);
		}
		if (isset($image->pathName)) {
			$condition = array();
			$paths = explode(',', $image->pathName);
			foreach ($paths as $pathName) {
				$condition[] = 'pathName like "' . Yii::app()->params['imagePath'] . '/' . $pathName . '%"';
			}
			$criteria->addCondition('(' . implode(') or (', $condition) . ')');
		}
	
		$criteria->order = 'pathName';
	
		return new CActiveDataProvider($image, array(
				'criteria' => $criteria,
		));
	}
	
}