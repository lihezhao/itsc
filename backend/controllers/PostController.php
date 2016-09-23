<?php
class PostController extends BasePostController {
	public $layout='//layouts/dashboard/post';
	
	public function actionIndex() {
		parent::actionAdmin();
	}
	
}