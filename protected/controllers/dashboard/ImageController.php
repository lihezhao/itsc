<?php

class ImageController extends Controller {
	public $layout='//layouts/dashboard/image';
	
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