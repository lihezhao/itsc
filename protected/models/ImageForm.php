<?php
class ImageForm extends CFormModel {
	public $isoSpeedRatings;
	public $make;
	public function attributeLabels() {
		return array(
			'isoSpeedRatings' => Yii::t('itsc', 'ISOSpeedRatings'),
			'make' => Yii::t('itsc', 'Make'),
		);
	}
}