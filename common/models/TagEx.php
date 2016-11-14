<?php
class TagEx extends Tag {
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	protected function beforeSave() {
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->id = new CDbExpression("replace(uuid(), '-', '')");
			}
			return true;
		} else
			return false;
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