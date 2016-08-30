<?php
class ItscComment extends Comment {
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
				'id' => 'Id',
				'content' => Yii::t('itsc', 'Comment'),
				'status' => 'Status',
				'create_time' => 'Create Time',
				'author' => Yii::t('itsc', 'Name'),
				'email' => Yii::t('itsc', 'Email'),
				'url' => Yii::t('itsc', 'Website'),
				'post_id' => 'Post',
		);
		
	}
}