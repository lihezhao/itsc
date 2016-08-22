<?php
class FocalLength extends BaseFocalLength {
	public static function listData() {
		$focalLengths = parent::model(__CLASS__)->findAll();
		$result = array();
		foreach ($focalLengths as $focalLength) {
			$result[$focalLength->focalLength] = $focalLength->focalLength . '(' . $focalLength->count . ')';
		}
		return $result;
	}
	
}