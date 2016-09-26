<?php

class Folder extends BaseFolder {
	protected function beforeSave() {
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->created_at = date('Y-m-d h:i:s');
			} else {
				$this->updated_at = date('Y-m-d h:i:s');
			}
			return true;
		} else {
			return false;
		}
	}
	
	public static function findFiles($dir, $options = array()) {
		if (is_dir($dir)) {
			$level = -1;
			extract($options);
			$dirs[] = array('level' => 0, 'path' => '');
			$dirs2 = array();
			$files = array();
			while (list($k, $path) = each($dirs)) {
				if ($level != -1 && $path['level'] > $level)
					break;
				$curPath = $path['path'];
				$absDirPath = "$dir/$curPath";
				$handle = opendir($absDirPath);
				readdir($handle);readdir($handle);
				while (false !== $item = readdir($handle)) {
					$relPath = "$curPath/$item";
					$absPath = "$dir/$relPath";
					if (is_dir($absPath)) {
						$dirs[] = array('level' => $path['level'] + 1, 'path' => $relPath);
						$dirs2[$curPath][] = $absPath;
					}
					else
						$files[$curPath][] = $relPath;
				}
				closedir($handle);
			}
			$result = array('dirs' => $dirs2, 'files' => $files);
		} else {
			$result = false;
		}
		return $result;
	}
}