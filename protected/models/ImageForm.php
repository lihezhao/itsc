<?php
class ImageForm extends CFormModel {
	public $isoSpeedRatings;
	public $make;
	public $flash;
	public $focalLength;
	public $exposureTime;
	public $apertureFNumber;
	public $model;
	public $exposureBiasValue;
	public $meteringMode;
	public $lightSource;
	public function attributeLabels() {
		return array(
			'isoSpeedRatings' => Yii::t('app', 'ISOSpeedRatings'),
			'make' => Yii::t('app', 'Make'),
			'flash' => Yii::t('app', 'Flash'),
			'focalLength' => Yii::t('app', 'Focal Length (mm)'),
			'exposureTime' => Yii::t('app', 'Exposure Time (s)'),
			'apertureFNumber' => Yii::t('app', 'Aperture FNumber'),
			'model' => Yii::t('app', 'Model'),
			'exposureBiasValue' => Yii::t('app', 'Exposure Bias Value'),
			'meteringMode' => Yii::t('app', 'Metering Mode'),
			'lightSource' => Yii::t('app', 'Light Source'),
		);
	}
}