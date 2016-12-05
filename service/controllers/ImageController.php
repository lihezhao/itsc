<?php
class ImageController {
	public function actionCountGroupBy($field, $front = true) {
		echo CJSON::encode(Exif::listData($field, $front));
	}
}