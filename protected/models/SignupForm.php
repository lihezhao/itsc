<?php

class SignupForm extends CFormModel {
	public $username;
	public $password;
	public $passwordConfirm;
	public $email;
	public $profile;
	
	
	public function rules() {
		return array(
			array('username, password, passwordConfirm, email, profile', 'required'),
			array('passwordConfirm', 'authenticate'),
				
		);
	}
	
	public function attributeLabels() {
		return array(
			'username' => Yii::t('itsc', 'Username'),
			'password' => Yii::t('itsc', 'Password'),
			'passwordConfirm' => Yii::t('itsc', 'Password Confirm'),
			'email' => Yii::t('itsc', 'Email'),
			'profile' => Yii::t('itsc', 'Profile'),
		);
	}
	
	public function authenticate($attributes, $params) {
		if (!$this->hasErrors()) {
			if ($this->password != $this->passwordConfirm) {
				$this->addError('passwordConfirm', Yii::t('itsc', 'Password and Confirm not match.'));
			}
		}
	}
	
	public function signup() {
		
	}
}