<?php

class ImageController extends ExifController {
	
	public function init() {
		parent::init();
		$this->menu = array(
			array('label' => Yii::t('itsc', 'Image manager'), 'url' => array('/image/index')),
			array('label' => Yii::t('itsc', 'Image upload'), 'url' => array('/image/page', 'view'=>'upload')),
			array('label' => Yii::t('itsc', 'Image storage'), 'url' => array('/image/storage')),
			array('label' => Yii::t('itsc', 'Image thumbnail'), 'url' => array('image/thumb')),
		);
	}
	
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
	
	public function actionStorage($path = '') {
		$imagePath = Yii::app()->params['imagePath'];
		if ('' != $path) {
			$imagePath .= '/' . $path;
			$find = FileHelper::findFiles($imagePath);
		} else {
			$find = FileHelper::findFiles($imagePath);
		}
//print_r($find);exit;
		$folders = array();
		$curFolder = new Folder;
		$curFolder->path = $path;
		 
		if ($find != false) {
			if (isset($find['folders'][''])) {
				foreach ($find['folders'][''] as $dir) {
					$folder = Folder::model('Folder')->find('path=:path', array(':path' => $dir));
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
		}
		if (Yii::app()->request->isAjaxRequest) {
			$folderCount = isset($find['folders']) ? count($find['folders'], COUNT_RECURSIVE) - count($find['folders']) : 0;
			$folderFileCount = isset($find['folderFiles']) ? count($find['folderFiles'], COUNT_RECURSIVE) - count($find['folderFiles']) : 0;
			$fileCount = isset($find['files']) ? count($find['files'], COUNT_RECURSIVE) : 0;
			echo CJavaScript::jsonEncode(array('folderCount' => $folderCount, 'folderFileCount' => $folderFileCount, 'fileCount' => $fileCount));	
		} else {
			Yii::app()->clientScript->registerScriptFile('assets/js/imageStorage.js', CClientScript::POS_END);
			$this->render('storage', array('curFolder' => $curFolder, 'folders' => $folders));
		}
	}
	
	public function actionDoStorage($path, $index = 0) {
		if (yii::app()->request->isAjaxRequest) {
			$imagePath = Yii::app()->params['imagePath'];
			$imagePath .= '/' . $path;
			
			$dr = new DirectoryReader();
			$count = $dr->read($imagePath, $index, 10);
			echo CJavaScript::jsonEncode(array(
					'message' => Yii::t('itsc', 'Storage the images, please wait...'),
					'pos' => ($index + $count) * 100 / $dr->getFileCount($imagePath),
					'nextIndex' => $index + $count));
		} else {
			Yii::app()->clientScript->registerScriptFile('assets/js/imageDoStorage.js', CClientScript::POS_END);
			$this->render('doStorage', array('path' => $path));
		}
	}
	
	public function actionThumb() {
		Yii::app()->clientScript->registerScriptFile('assets/js/imageThumb.js', CClientScript::POS_END);
		$thumbPath = Yii::app()->params['thumbPath'];
		$thumb = FileHelper::findFiles($thumbPath, array('level' => 0));
		$imagePath = Yii::app()->params['imagePath'];
		$image = FileHelper::findFiles($imagePath, array('level' => 0));
		
		$this->render('thumb', array('imageFolder' => $image, 'thumbnailFolder' => $thumb));
	}
	
	public function actionBuildThumb($size, $index = 0) {
		$count = ImageHelper::batchThumb($size, $index, 1);
		echo CJavaScript::jsonEncode(array(
				'message' => Yii::t('itsc', 'Build thumbnails, please wait...'),
				'pos' => ($index + $count) * 100 / ImageHelper::getFileCount(),
				'nextIndex' => $index + $count));
	}
	
	private function scan($type, $path) {
		$absPath = Yii::app()->params[$type] . '/' . $path;
		$find = FileHelper::findFiles($absPath);
		$fileCount = count($find['files'], COUNT_RECURSIVE);
		$folderCount = count($find['folders'], COUNT_RECURSIVE) - count($find['folders']);
		$folderFileCount = count($find['folderFiles'], COUNT_RECURSIVE) - count($find['folderFiles']);
		echo CJavaScript::jsonEncode(array('fileCount' => $fileCount, 'folderCount' => $folderCount, 'folderFileCount' => $folderFileCount));
	}
	
	public function actionScanImage($path = '') {
		$this->scan('imagePath', $path);
	}
	
	public function actionScanThumb($path = '') {
		$this->scan('thumbPath', $path);
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
						'actions'=>array('view', 'status', ),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update'),
						'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('admin','delete', 'status', 'index', 'page', 'storage', 'doStorage', 'thumb', 'scanImage', 'scanThumb', 'buildThumb'),
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