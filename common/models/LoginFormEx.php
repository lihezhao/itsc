<?php
class LoginFormEx extends LoginForm {
	public function attributeLabels()
	{
		return array(
				'username' 		=> Yii::t('itsc', 'Username'),
				'password' 		=> Yii::t('itsc', 'Password'),
				'rememberMe'	=> Yii::t('itsc', 'Remember me next time'),
		);
	}
	
}