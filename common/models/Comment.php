<?php
class Comment extends BaseComment {
	public $verifyCode;
	public function getAttributeLabel($attribute) {
		return Yii::t('app', parent::getAttributeLabel($attribute));
	}
	
	public function attributeLabels() {
		$result = parent::attributeLabels();
		$result['verifyCode'] = 'Verification Code';
		return $result;
	}
	
	public function rules() {
		$result = parent::rules();
		$result[] = array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements());
		return $result;
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