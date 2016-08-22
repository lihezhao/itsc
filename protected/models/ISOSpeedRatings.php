<?php
class ISOSpeedRatings extends BaseISOSpeedRatings {
	public static function listData() {
		$isoSpeedRatings = parent::model(__CLASS__)->findAll();
		$result = array();
		foreach ($isoSpeedRatings as $isoSpeedRating) {
			$result[$isoSpeedRating->ISOSpeedRatings] = $isoSpeedRating->ISOSpeedRatings . '(' . $isoSpeedRating->count . ')';
		}
		return $result;
	}
}