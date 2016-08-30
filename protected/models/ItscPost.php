<?php

class ItscPost extends Post {
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
				'id' => 'Id',
				'title' => Yii::t('itsc', 'Title'),
				'content' => Yii::t('itsc', 'Content'),
				'tags' => Yii::t('itsc', 'Tags'),
				'status' => 'Status',
				'create_time' => 'Create Time',
				'update_time' => 'Update Time',
				'author_id' => 'Author',
		);
	}
	
	/**
	 * @return string the URL that shows the detail of the post
	 */
	public function getUrl()
	{
		return Yii::app()->createUrl('itscpost/view', array(
			'id'=>$this->id,
			'title'=>$this->title,
		));
	}

	/**
	 * @return array a list of links that point to the post list filtered by every tag of this post
	 */
	public function getTagLinks() {
		$links=array();
		foreach(Tag::string2array($this->tags) as $tag)
			$links[]=CHtml::link(CHtml::encode($tag), array('itscpost/index', 'tag'=>$tag), array('class' => 'tag tag-info'));
		return $links;
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
}