<?php
class TagEx extends Tag {
	public function behaviors() {
		return array(
			'MTRandIDBehavior' => array(
				'class' => 'common.behaviors.MTRandIDBehavior',
			),
		);
	}
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function addTags($tags)
	{
		$criteria=new CDbCriteria;
		$criteria->addInCondition('name',$tags);
		$this->updateCounters(array('frequency'=>1),$criteria);
		foreach($tags as $name)
		{
			if(!$this->exists('name=:name',array(':name'=>$name)))
			{
				$tag=new TagEx;
				$tag->name=$name;
				$tag->frequency=1;
				$tag->save();
			}
		}
	}
}