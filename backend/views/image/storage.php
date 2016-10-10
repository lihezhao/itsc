<?php
/* @var $this ImageController */

$this->breadcrumbs=array(
	Yii::t('itsc', 'Image manager') => array('image/index'),
	
);

$relativePath = $curFolder->getRelativePath();
if ($relativePath == '') {
	$this->breadcrumbs[] = Yii::t('itsc', 'Image storage');
} else {
	$this->breadcrumbs[Yii::t('itsc', 'Image storage')] = array('image/storage');
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
<h1><?php echo Yii::t('itsc', 'Image storage'); ?></h1>
<p><?php echo Yii::t('itsc', 'Scan images uploaded previously.')?></p>


<div class="row">
	<div class="col-md-8">
		<h2><?php echo Yii::t('itsc', 'The current folder')?></h2>
		<div class="row">
			<div class="col-md-4">
				<div class="card card-outline-primary">
					<div class="card-block">
						<?php echo CHtml::hiddenField('path', $curFolder->getRelativePath(), array('class' => 'path'))?>
						<h4 class="card-title"><?php echo Yii::t('itsc', 'Folder') . ' ' . basename($curFolder->path) ; ?></h4>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'File count:')?> <span class="fileCount"></span></small></p>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'Subfolders count:')?> <span class="subfoldersCount"></span></small></p>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'Subfolders file count:')?> <span class="subfoldersfileCount"></span></small></p>
						<p>
							<a href="<?php echo $this->createUrl('image/doStorage', array('path' => $curFolder->path)); ?>" class="btn btn-primary" role="button"><?php echo Yii::t('itsc', 'Storage');?></a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<h2><?php echo Yii::t('itsc', 'Subfolders')?></h2>
		<div class="row">
			<?php echo CHtml::hiddenField('scanUrl', CHtml::normalizeUrl(array('image/storage')))?>
			<?php foreach ($folders as $path => $folder) {?>
			<div class="col-md-4">
				<div class="card card-outline-info">
					<div class="card-block">
						<?php echo CHtml::hiddenField('path', $folder->getRelativePath(), array('class' => 'path'))?>
						<h4 class="card-title"><?php echo Yii::t('itsc', 'Folder') . ' ' . basename($folder->path) ; ?></h4>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'File count:')?> <span class="fileCount"></span></small></p>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'Subfolders count:')?> <span class="subfoldersCount"></span></small></p>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'Subfolders file count:')?> <span class="subfoldersfileCount"></span></small></p>
						<p>
							<a href="<?php echo $this->createUrl('image/doStorage', array('path' => $path)); ?>" class="btn btn-primary" role="button"><?php echo Yii::t('itsc', 'Storage');?></a>
							<a href="<?php echo $this->createUrl('image/storage', array('path' => $folder->getRelativePath())); ?>" class="btn btn-success" role="button"><?php echo Yii::t('itsc', 'Open');?></a>
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

