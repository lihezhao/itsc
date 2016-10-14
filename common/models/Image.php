<?php

class Image extends BaseImage {
	const STATUS_HIDE = 0;
	const STATUS_SHOW = 1;
	const STATUS_HOMEPAGE = 2;
	protected function beforeSave() {
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->id = new CDbExpression("replace(uuid(), '-', '')");
				$this->created_at = date('Y-m-d h:i:s');
			}
			return true;
		} else {
			return false;
		}
	}
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getStatus() {
		switch ($this->status) {
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
	
	public static function thumb($size, $index, $count) {
		$imagePath = Yii::app()->params['imagePath'];
		$thumbPath = Yii::app()->params['thumbPath'];
		
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
			
			foreach ($find['files'] as $file) {
				if ($pos < $index) {
					$pos++;
					continue;
				}
				$this->thumbImage($size);
				$i++;
				if ($i == $count) return $i;
			}
			
			foreach ($find['folderFiles'] as $folder => $files) {
				foreach ($files as $file) {
					if ($pos < $index) {
						$pos++;
						continue;
					}
					$this->thumbImage($size);
					$i++;
					if ($i == $count) return $i;
				}
			}
			return $i;
		}
		return false;
	}
	
	private function thumbImage($size) {
		
	}
}