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
			'isoSpeedRatings' => Yii::t('itsc', 'ISOSpeedRatings'),
			'make' => Yii::t('itsc', 'Make'),
			'flash' => Yii::t('itsc', 'Flash'),
			'focalLength' => Yii::t('itsc', 'Focal Length (mm)'),
			'exposureTime' => Yii::t('itsc', 'Exposure Time (s)'),
			'apertureFNumber' => Yii::t('itsc', 'Aperture FNumber'),
			'model' => Yii::t('itsc', 'Model'),
			'exposureBiasValue' => Yii::t('itsc', 'Exposure Bias Value'),
			'meteringMode' => Yii::t('itsc', 'Metering Mode'),
			'lightSource' => Yii::t('itsc', 'Light Source'),
		);
	}
}