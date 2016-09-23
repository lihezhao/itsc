<?php
class PostController extends BasePostController {
	public $layout='//layouts/post';
	
	public function actionIndex() {
		parent::actionAdmin();
	}
	
}