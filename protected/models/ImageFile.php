<?php

class ImageFile extends BaseImage {
/*	public function insert($attributes = null) {
		$attributes = $this->getAttributes($attributes);
		$created_at = date('Y-m-d h:i:s');
		$sql = "INSERT INTO t_image (id, path, created_at) VALUES(replace(uuid(), '-', ''), :path, :created_at)";
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$command->bindParam(":path", $attributes['path'], PDO::PARAM_STR);
		$command->bindParam(":created_at", $created_at, PDO::PARAM_STR);
		$command->execute();
		
		$image = ImageFile::model(__CLASS__)->findByAttributes(array('path' => $attributes['path'], 'created_at' => $created_at));
		$this->id = $image->id;
		return true;
	}
*/	
	protected function beforeSave() {
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->id = new CDbExpression("replace(uuid(), '-', '')");
				$this->created_at = date('Y-m-d h:i:s');
			}
			return true;
		} else {
			return false;
		}
	}
}