<?php

class ImageFile extends BaseImage {
	const STATUS_HIDE = 0;
	const STATUS_SHOW = 1;
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
}