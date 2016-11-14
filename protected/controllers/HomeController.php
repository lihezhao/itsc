<?php

class HomeController extends SiteController
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
	
	public function actionContact()
	{
		$model = new ContactFormEx;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
						"Reply-To: {$model->email}\r\n".
						"MIME-Version: 1.0\r\n".
						"Content-Type: text/plain; charset=UTF-8";
	
				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	
	public function actionLogin() {
		$model = new LoginFormEx;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginFormEx']))
		{
			$model->attributes=$_POST['LoginFormEx'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
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