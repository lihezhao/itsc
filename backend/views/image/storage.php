<?php
/* @var $this ImageController */

$this->breadcrumbs=array(
	Yii::t('app', 'Image manager') => array('image/index'),
	
);

$relativePath = FolderService::getRelativePath($curFolder);
if ($relativePath == '') {
	$this->breadcrumbs[] = Yii::t('app', 'Image storage');
} else {
	$this->breadcrumbs[Yii::t('app', 'Image storage')] = array('image/storage');
}

$subpaths = explode('/', $relativePath);
$path = '';
$index = 0;
foreach ($subpaths as $subpath) {
	$index++;
	if ($subpath == '') continue;
	$path .= '/' . $subpath;
	if ($index == count($subpaths)) {
		$this->breadcrumbs[] = $subpath;
	} else {
		$this->breadcrumbs[$subpath] = array('image/storage', 'path' => $path);
	}
}
?>
<h1><?php echo Yii::t('app', 'Image storage'); ?></h1>
<p><?php echo Yii::t('app', 'Scan images uploaded previously.')?></p>


<div class="row">
	<div class="col-md-8">
		<h2><?php echo Yii::t('app', 'The current folder')?></h2>
		<div class="row">
			<div class="col-md-4">
				<div class="card card-outline-primary">
					<div class="card-block">
						<?php echo CHtml::hiddenField('path', FolderService::getRelativePath($curFolder), array('class' => 'path'))?>
						<h4 class="card-title"><?php echo Yii::t('app', 'Folder') . ' ' . basename($curFolder->path) ; ?></h4>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('app', 'File count:')?> <span class="fileCount"></span></small></p>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('app', 'Subfolders count:')?> <span class="folderCount"></span></small></p>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('app', 'Subfolders file count:')?> <span class="folderFileCount"></span></small></p>
						<p>
							<a href="<?php echo $this->createUrl('image/doStorage', array('path' => $curFolder->path)); ?>" class="btn btn-primary" role="button"><?php echo Yii::t('app', 'Storage');?></a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<h2><?php echo Yii::t('app', 'Subfolders')?></h2>
		<div class="row">
			<?php echo CHtml::hiddenField('scanUrl', CHtml::normalizeUrl(array('image/storage')))?>
			<?php foreach ($folders as $path => $folder) {?>
			<div class="col-md-4">
				<div class="card card-outline-info">
					<div class="card-block">
						<?php echo CHtml::hiddenField('path', FolderService::getRelativePath($folder), array('class' => 'path'))?>
						<h4 class="card-title"><?php echo Yii::t('app', 'Folder') . ' ' . basename($folder->path) ; ?></h4>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('app', 'File count:')?> <span class="fileCount"></span></small></p>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('app', 'Subfolders count:')?> <span class="folderCount"></span></small></p>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('app', 'Subfolders file count:')?> <span class="folderFileCount"></span></small></p>
						<p>
							<a href="<?php echo $this->createUrl('image/doStorage', array('path' => $path)); ?>" class="btn btn-primary" role="button"><?php echo Yii::t('app', 'Storage');?></a>
							<a href="<?php echo $this->createUrl('image/storage', array('path' => FolderService::getRelativePath($folder))); ?>" class="btn btn-success" role="button"><?php echo Yii::t('app', 'Open');?></a>
						</p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="col-md-4">
	</div>
	
</div>
