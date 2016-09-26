<?php
class GalleryController extends Controller {
	public function actionIndex() {
		$model=new Exif('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Exif']))
			$model->attributes=$_GET['Exif'];
		$cs = Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->baseUrl . '/assets/js/images.js', CClientScript::POS_END);
		$cs->registerCoreScript('masonry');
		$cs->registerCoreScript('photoswipe');
		$cs->registerCoreScript('lazyload');
		$cs->registerScriptFile(Yii::app()->baseUrl . '/assets/js/photoswipe.js', CClientScript::POS_END);
				
		$this->render('index', array('model' => $model,));
	}
}