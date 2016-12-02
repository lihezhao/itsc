<?php
class PostEx extends Post {
	private $_oldTags;

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
	
	public function getAttributeLabel($attribute) {
		return Yii::t('app', parent::getAttributeLabel($attribute));
	}
	
	protected function afterFind()
	{
		parent::afterFind();
		$this->_oldTags=$this->tags;
	}	

	protected function afterSave() {
		CActiveRecord::afterSave();
		TagEx::model()->updateFrequency($this->_oldTags, $this->tags);
		if ($this->isNewRecord) {
			$post = self::model()->find('title=:title and create_time=:create_time and author_id=:author_id',
					array(':title' => $this->title, ':create_time' => $this->create_time, ':author_id' => $this->author_id));
			$this->id = $post->id;
		}
	}
	
	protected function afterDelete() {
		$this->id = '\'' . $this->id . '\''; 
		parent::afterDelete();	
	}
}