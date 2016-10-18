<?php
class FolderController extends Controller {	
	public function actionLoadFolder() {
		if (true or Yii::app()->request->isAjaxRequest) {
			$parent = Yii::app()->params['imagePath'];
			if (isset($_GET['node']) and $_GET['node'] != '#') {
				$parent .= $_GET['node'];
				$type = '';
			} else {
				$type = 'root';
			}
			 
			$criteria = new CDbCriteria();
			$criteria->addCondition('path like "' . $parent . '%"');
			$folders = Folder::model()->findAll($criteria);
			$children = array();
			$grandson = array();
			foreach ($folders as $folder) {
				$text = substr($folder->path, strlen($parent) + 1);
				if (strlen($text) > 0) {
					switch (substr_count($text, '/')) {
						case 0:
							$children[] = array('text' => $text, 'id' => $text, 'type' => $type);
							break;
						case 1:
							$text = substr($text, 0, strpos($text, '/'));
							$grandson[$text] = true;
							break;
					}
				}
			}
			foreach ($children as &$child) {
				$child['hasChildren'] = array_key_exists($child['text'], $grandson);
			}
			echo CTreeView::saveDataAsJson($children);
		}
	}
}