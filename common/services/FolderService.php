<?php
class FolderService {
	public static function getRelativePath($folder) {
		return str_replace(Yii::app()->params['imagePath'] . '/', '', $folder->path);
	}
}