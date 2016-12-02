<?php

class Folder extends BaseFolder {
	public function behaviors() {
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'created_at',
				'updateAttribute' => 'updated_at',
			),
		);
	}
	
	public function getRelativePath() {
		return str_replace(Yii::app()->params['imagePath'] . '/', '', $this->path);
	}
}