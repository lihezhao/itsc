<?php
class FileHelper {
	public static function findFiles($dir, $options = array()) {
		if (is_dir($dir)) {
			$level = -1;
			extract($options);
			$dirs[] = array('level' => 0, 'path' => '');
			$folders = array('' => array());
			$files = array();
			$folderFiles = array();
			while (list($k, $path) = each($dirs)) {
				if ($level != -1 && $path['level'] > $level)
					break;
					$curPath = $path['path'];
					$absDirPath = "$dir/$curPath";
					$handle = opendir($absDirPath);
					readdir($handle);readdir($handle);
					while (false !== $item = readdir($handle)) {
						if ($curPath == '')
							$relPath = $item;
						else
							$relPath = "$curPath/$item";
						
						$absPath = "$dir/$relPath";
						if (is_dir($absPath)) {
							$dirs[] = array('level' => $path['level'] + 1, 'path' => $relPath);
							$folders[$curPath][] = $absPath;
						} else {
							if ($path['level'] == 0)
								$files[] = $absPath;
								else
									$folderFiles[$curPath][] = $absPath;
						}
					}
					closedir($handle);
			}
			$result = array('folders' => $folders, 'folderFiles' => $folderFiles, 'files' => $files);
		} else {
			$result = false;
		}
		return $result;
	}
	
	public static function getFileCount($path) {
		$count = Yii::app()->cache->get($path . 'Count');
		if ($count == false) {
			self::getFiles($path);
			$count = Yii::app()->cache->get($path . 'Count');
		}
		return $count;
	}
	
	public static function getFiles($path) {
		$result = Yii::app()->cache->get($path);
		if ($result === false) {
			$find = FileHelper::findFiles($path);
			$result = array();
			foreach ($find['files'] as $filename) {
				$result[] = $filename;
			}
			foreach ($find['folderFiles'] as $folder => $files) {
				foreach($files as $filename) {
					$result[] = $filename;
				}
			}
			Yii::app()->cache->set($path, $result);
			Yii::app()->cache->set($path . 'Count', sizeof($result));
		}
		return $result;
	}
		
}