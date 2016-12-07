<?php
class ImageController extends CController {
	public function actionCountGroupBy($field, $front = true) {
		echo CJSON::encode(ImageService::countGroupBy($field, $front));
	}
}