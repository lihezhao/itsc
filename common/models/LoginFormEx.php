<?php
class LoginFormEx extends LoginForm {
	public function attributeLabels()
	{
		return array(
				'username' 		=> Yii::t('app', 'Username'),
				'password' 		=> Yii::t('app', 'Password'),
				'rememberMe'	=> Yii::t('app', 'Remember me next time'),
		);
	}
	
}