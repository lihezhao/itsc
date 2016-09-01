<?php
class Comment extends BaseComment {
	public $verifyCode;
	
	public function getAttributeLabel($attribute) {
		return Yii::t('itsc', parent::getAttributeLabel($attribute));
	}

	protected function beforeSave() {
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->id = new CDbExpression("replace(uuid(), '-', '')");
			}
			return true;
		} else
			return false;
	}
	
}