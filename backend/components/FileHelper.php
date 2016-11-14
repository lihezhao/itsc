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
	
}