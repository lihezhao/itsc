<?php
class ImageThumbForm extends CFormModel {
	public $size;
	public function rules() {
		return array(
			array('size', 'required'),
			array('size', 'numerical'),
		);
	}
	
	public function attributeLabels() {
		return array(
			'size' => Yii::t('app', 'Size'),
		);
	}
}