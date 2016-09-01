<?php
class Translator {
	public static function translateArray($source) {
		$result = array();
		foreach ($source as $k => $v) {
			$result[$k] = Yii::t('itsc', $v);
		}
		return $result;
	}
	
	public static function translateSubString($source, $string) {
		return str_replace($source, Yii::t('itsc', $source), $string);
	}
}