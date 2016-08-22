<?php
class Make extends BaseMake {
	public static function listData() {
		$makes = parent::model(__CLASS__)->findAll();
		$result = array();
		foreach ($makes as $make) {
			$result[$make->make] = $make->make . '(' . $make->count . ')';
		}
		return $result;
	}
}