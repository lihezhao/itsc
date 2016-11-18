<?php

class SignupForm extends CFormModel {
	public $username;
	public $password;
	public $passwordConfirm;
	public $email;
	public $verifyCode;
	
	public function rules() {
		return array(
			array('username, password, passwordConfirm, email, verifyCode', 'required'),
			array('passwordConfirm', 'authenticate'),
			array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
		);
	}
	
	public function attributeLabels() {
		return array(
			'username' => Yii::t('app', 'Username'),
			'password' => Yii::t('app', 'Password'),
			'passwordConfirm' => Yii::t('app', 'Password Confirm'),
			'email' => Yii::t('app', 'Email'),
			'profile' => Yii::t('app', 'Profile'),
			'verifyCode' => Yii::t('app', 'Verification Code'),
		);
	}
	
	public function authenticate($attributes, $params) {
		if (!$this->hasErrors()) {
			if ($this->password != $this->passwordConfirm) {
				$this->addError('passwordConfirm', Yii::t('app', 'Password and Confirm not match.'));
			}
		}
	}
	
	public function signup() {
		$model = new ItscUser;
		$model->attributes = $this->attributes;
		if (!$model->save()) {
			print_r($model->getErrors());exit;
		}
		return true;
	}
}