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
	
	public function actionRating($id, $value) {
		if (Yii::app()->user->isGuest) {
			$result = Yii::t('itsc', 'Please login');
		} else {
			$rating = Rating::model()->find('uid=:uid and pid=:pid', array(
					':uid' => Yii::app()->user->getId(),
					':pid' => $id));
			if ($rating == null) {
				$rating = new Rating();
				$rating->uid = Yii::app()->user->getId();
				$rating->pid = $id;
				$rating->value = $value;
				$rating->save();
				$result = Yii::t('itsc', 'Your rating is') . ' ' . $value;
			} else {
				$result = Yii::t('itsc', 'You have already rated.');
			}
		}
		echo $result;
	}
}