<?php

class ImageController extends ExifController {
	public $layout='/layouts/image';
	
	
	public function actions() {
		return array(
			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}
	
	public function actionIndex() {
		Yii::app()->clientScript->registerScriptFile('assets/js/images.js', CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile('assets/js/imageAdmin.js', CClientScript::POS_END);
		Yii::app()->clientScript->registerCoreScript('lazyload');
		parent::actionAdmin();
	}
	
	public function actionScan($path = '') {
		$imagePath = Yii::app()->params['imagePath'];
		if ('' != $path) $imagePath .= '/' . $path;
		
		$find = Folder::findFiles($imagePath, array('level' => 0));

		if ($find != false) {
			$folders = array();
			foreach ($find['dirs'][''] as $dir) {
				$folder = Folder::model()->find('path=:path', array(':path' => $dir));
					if ($folder) {
					} else {
						$folder = new Folder();
						$folder->path = $dir;
						if (!$folder->save()) {
							print_r($folder->getErrors());exit;
						}
					}
					$folders[str_replace(Yii::app()->params['imagePath'] . '\\', '', $folder->path)] = $folder;
			}
		}
		
		$this->render('scan', array('folders' => $folders));
	}
	
	public function actionBuild($path) {
		error_reporting(E_ALL^E_NOTICE^E_WARNING);
		$imagePath = Yii::app()->params['imagePath'];
		$imagePath .= '/' . $path;
		
		$dr = new DirectoryReader();
		$dr->read($imagePath);
		$this->render('index');
	}
	
	public function actionStatus($id, $status) {
		if (Yii::app()->request->isPostRequest) {
			$image = Image::model()->findByPk($id);
			$image->status = $status;				
			$image->save();
			
			switch ($status) {
				case Image::STATUS_HIDE:
					$result = array('status' => Yii::t('itsc', 'Hide'));
					break;
				case Image::STATUS_SHOW:
					$result = array('status' => Yii::t('itsc', 'Show'));
					break;
				case Image::STATUS_HOMEPAGE:
					$result = array('status' => Yii::t('itsc', 'Show and Home'));
					break;
			}
			echo CJavaScript::jsonEncode($result);
		}
	}
	
	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('index','view', 'status', 'page', 'scan'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update'),
						'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('admin','delete', 'status'),
						'users'=>array('admin'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}