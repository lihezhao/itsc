<?php
class ContactFormEx extends ContactForm {
	public function attributeLabels()
	{
		return array(
				'name' => Yii::t('app', 'Name'),
				'email' => Yii::t('app', 'Email'),
				'subject' => Yii::t('app', 'Subject'),
				'body' => Yii::t('app', 'Body'),
				'verifyCode' => Yii::t('app', 'Verification Code'),
		);
	}
}