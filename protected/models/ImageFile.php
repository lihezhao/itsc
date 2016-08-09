<?php

class ImageFile extends BaseImage {
	public function insert($attributes = null) {
		$attributes = $this->getAttributes($attributes);
		$create_at = date('Y-m-d h:i:s');
		$sql = "INSERT INTO t_image (id, path, create_at) VALUES(replace(uuid(), '-', ''), :path, :create_at)";
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$command->bindParam(":path", $attributes['path'], PDO::PARAM_STR);
		$command->bindParam(":create_at", $create_at, PDO::PARAM_STR);
		$command->execute();
		
		$image = ImageFile::model(__CLASS__)->findByAttributes(array('path' => $attributes['path'], 'create_at' => $create_at));
		$this->id = $image->id;
		return true;
	}
}