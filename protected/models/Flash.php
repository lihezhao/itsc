<?php
class Flash extends BaseFlash {
	public static function listData() {
		$flashs = parent::model(__CLASS__)->findAll();
		$result = array();
		foreach ($flashs as $flash) {
			$result[$flash->flash] = $flash->flash . '(' . $flash->count . ')';
		}
		return $result;
	}
}