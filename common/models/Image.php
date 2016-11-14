<?php

class Image extends BaseImage {
	const STATUS_HIDE = 0;
	const STATUS_SHOW = 1;
	const STATUS_HOMEPAGE = 2;
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
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getStatus() {
		switch ($this->status) {
			case self::STATUS_HIDE:
				$result = 'Hide';
				break;
			case self::STATUS_SHOW:
				$result = 'Show';
				break;
			case self::STATUS_HOMEPAGE:
				$result = 'Show and Home';
		}
		return $result;
	}
	
	public function getAverageRating() {
		$result = 0;
		$count = sizeof($this->ratings);
		if ($count > 0) {
			$sum = 0;
			foreach ($this->ratings as $rating) {
				$sum += $rating->value;
			}
			$result = $sum / $count;
		}
		return $result;
	}
	
	public function getTagLinks() {
		$links = array();
		foreach (Tag::string2array($this->tags) as $tag)
			$links[] = CHtml::link(CHtml::encode($tag), array('gallery/index', 'tag' => $tag));
		return $links;
	}
	
}