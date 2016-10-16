<?php
class ActiveForm extends CActiveForm {
	public function textField($model, $attribute, $htmlOptions = array()) {
		$htmlOptions['class'] = 'form-control';
		$htmlOptions['placeholder'] = $model->getAttributeLabel($attribute);
		return CHtml::activeTextField($model, $attribute, $htmlOptions);
	}
	
	public function textArea($model, $attribute, $htmlOptions=array()) {
		$htmlOptions['class'] = 'form-control';
		$htmlOptions['placeholder'] = $model->getAttributeLabel($attribute);
		return CHtml::activeTextArea($model,$attribute,$htmlOptions);
	}
}