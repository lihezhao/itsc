<?php
class Model extends BaseModel {
	public static function listData() {
		$models = parent::model(__CLASS__)->findAll();
		$result = array();
		foreach ($models as $model) {
			$result[$model->model] = $model->model . '(' . $model->count . ')';
		}
		return $result;
	}
	
}