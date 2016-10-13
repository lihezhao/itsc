<?php
class FileHelper {
	public static function findFiles($dir, $options = array()) {
		if (is_dir($dir)) {
			$level = -1;
			extract($options);
			$dirs[] = array('level' => 0, 'path' => '');
			$subfolders = array();
			$files = array();
			$subfoldersfiles = array();
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
							$subfolders[$curPath][] = $absPath;
						} else {
							if ($path['level'] == 0)
								$files[] = $absPath;
								else
									$subfoldersfiles[$curPath][] = $absPath;
						}
					}
					closedir($handle);
			}
			$result = array('subfolders' => $subfolders, 'subfoldersfiles' => $subfoldersfiles, 'files' => $files);
		} else {
			$result = false;
		}
		return $result;
	}
	
}