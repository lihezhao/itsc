<?php

class ImageController extends Controller
{
	private $folders = array();
	
	public function getFolders() {
		return $this->folders;
	}
	
	public function actionIndex($path = "")
	{
		$imagePath = Yii::app()->params['imagePath'];
		if (isset($path)) $imagePath .= '/' . $path;
		
		$di = new DirectoryIterator($imagePath);
		foreach ($di as $file) {
			if ($file->isDir() && !$file->isDot()) {
				$this->folders[] = $file->getFilename();
			}
		}
		$this->render('index');
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