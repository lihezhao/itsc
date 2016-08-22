<?php
class ExposureTime extends BaseExposureTime {
	public static function listData() {
		$exposureTimes = parent::model(__CLASS__)->findAll();
		$result = array();
		foreach ($exposureTimes as $exposureTime) {
			$result[$exposureTime->exposureTime] = $exposureTime->exposureTime . '(' . $exposureTime->count . ')';
		}
		return $result;
	}
	
}