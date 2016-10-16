<?php
class ContactFormEx extends ContactForm {
	public function attributeLabels()
	{
		return array(
				'name' => Yii::t('itsc', 'Name'),
				'email' => Yii::t('itsc', 'Email'),
				'subject' => Yii::t('itsc', 'Subject'),
				'body' => Yii::t('itsc', 'Body'),
				'verifyCode' => Yii::t('itsc', 'Verification Code'),
		);
	}
}