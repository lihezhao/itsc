<?php

class ImageController extends BaseImageController {
	public $layout='//layouts/dashboard/image';
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('index','view'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update'),
						'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('admin','delete', 'show'),
						'users'=>array('admin'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}
	
	
	public function actionIndex($path = '') {
		$imagePath = Yii::app()->params['imagePath'];
		if ('' != $path) $imagePath .= '/' . $path;
		$di = new DirectoryIterator($imagePath);
		$folders = array();
		foreach ($di as $file) {
			if ($file->isDir() && !$file->isDot()) {
				$folder = Folder::model()->find('path=:path', array(':path' => $file->getPathname()));
				if ($folder) {
				} else {
					$folder = new Folder();
					$folder->path = $file->getPathname();
					if (!$folder->save()) {
						print_r($folder->getErrors());exit;
					}
				}
				$folders[str_replace(Yii::app()->params['imagePath'] . '\\', '', $folder->path)] = $folder;
			}
		}
		$this->render('index', array('folders' => $folders));
	}
	
	public function actionBuild($path) {
		error_reporting(E_ALL^E_NOTICE^E_WARNING);
		$imagePath = Yii::app()->params['imagePath'];
		$imagePath .= '/' . $path;
		
		$dr = new DirectoryReader();
		$dr->read($imagePath);
		$this->render('index');
	}
	
	public function actionAdmin() {
		Yii::app()->clientScript->registerScriptFile('assets/js/images.js', CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile('assets/js/imageAdmin.js', CClientScript::POS_END);
		parent::actionAdmin();
	}
	
	public function actionShow($id) {
		if (Yii::app()->request->isPostRequest) {
			$image = $this->loadModel($id);
			if ($image->status == ImageFile::STATUS_HIDE) {
				$image->status = ImageFile::STATUS_SHOW;
				$result = Yii::t('itsc', 'Hide');
			} else {
				$image->status = ImageFile::STATUS_HIDE;
				$result = Yii::t('itsc', 'Show');
			}
			$image->save();
			echo $result;
		}
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