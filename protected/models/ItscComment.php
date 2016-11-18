<?php
class ItscComment extends Comment {
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
				'id' => 'Id',
				'content' => Yii::t('app', 'Comment'),
				'status' => 'Status',
				'create_time' => 'Create Time',
				'author' => Yii::t('app', 'Name'),
				'email' => Yii::t('app', 'Email'),
				'url' => Yii::t('app', 'Website'),
				'post_id' => 'Post',
		);
		
	}
}