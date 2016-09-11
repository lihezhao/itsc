<?php
class FolderController extends Controller {
	public function actionLoadFolder() {
		if (Yii::app()->request->isAjaxRequest) {
			$parent = '';
			if (isset($_GET['root']) and $_GET['root'] != 'source') {
				$parent = $_GET['root'];
			}
			$criteria = new CDbCriteria();
			$criteria->addCondition('path like "' . Yii::app()->params['imagePath'] . $parent . '"');
			$folders = Folder::model()->findAll($criteria);
			
			
		}
	}
}