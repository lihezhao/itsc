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
	
	
}