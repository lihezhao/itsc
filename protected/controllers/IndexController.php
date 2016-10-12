<?php

class IndexController extends SiteController
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$cs = Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->baseUrl . '/assets/js/images.js', CClientScript::POS_END);
		$cs->registerCoreScript('masonry');
		$cs->registerCoreScript('photoswipe');
		$cs->registerCoreScript('lazyload');
		$cs->registerScriptFile(Yii::app()->baseUrl . '/assets/js/photoswipe.js', CClientScript::POS_END);
		$model = new Exif('search');
				
		$this->render('index', array('model' => $model));
	}

	public function actionSignup() {
		$model = new SignupForm;
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'signup-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if (isset($_POST['SignupForm'])) {
			$model->attributes = $_POST['SignupForm'];
			if ($model->validate() && $model->signup()) {
				$_POST['LoginForm'] = $_POST['SignupForm'];
				$this->actionLogin();
			}
		}
		$this->render('signup', array('model' => $model));
	}
}