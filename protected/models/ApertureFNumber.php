<?php
class ApertureFNumber extends BaseApertureFNumber {
	public static function listData() {
		$apertureFNumbers = parent::model(__CLASS__)->findAll();
		$result = array();
		foreach ($apertureFNumbers as $apertureFNumber) {
			$result[$apertureFNumber->apertureFNumber] = $apertureFNumber->apertureFNumber . '(' . $apertureFNumber->count . ')';
		}
		return $result;
	}
	
}