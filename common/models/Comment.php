<?php
class Comment extends BaseComment {
	public $verifyCode;
	
	public function behaviors() {
		return array(
				'MTRandIDBehavior' => array(
						'class' => 'common.behaviors.MTRandIDBehavior',
				),
		);
	}
	
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
	
}