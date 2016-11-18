<?php
class PostExController extends PostController {
	
	public function init() {
		parent::init();
		$this->menu = array(
				array('label' => Yii::t('app', 'Post Manager'), 'url' => array('/post/admin')),
				array('label' => Yii::t('app', 'Create Post'), 'url' => array('/post/create')),
		);
	}
	
	public function actionIndex() {
		parent::actionAdmin();
	}
	
	public function actionCreate()
	{
		$model=new PostEx;
		if(isset($_POST['PostEx']))
		{
			$model->attributes=$_POST['PostEx'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
	
		$this->render('create',array(
				'model'=>$model,
		));
	}
	
	
}