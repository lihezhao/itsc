<?php
/* @var $this ImageController */

$this->breadcrumbs = array(
	Yii::t('itsc', 'Image manager') => array('image/index'),
	Yii::t('itsc', 'Image thumbnail'),
);
?>
<h1><?php echo Yii::t('itsc', 'Image thumbnail')?></h1>

<div class="row">
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-4">
				<div class="card card-outline-primary">
					<div class="card-block">
						<h4 class="card-title"><?php echo Yii::t('itsc', 'Folder')?></h4>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'File count:')?> <span class="fileCount"></span></small></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($thumbnailFolder['subfolders'][''] as $folder) {?>
			<div class="col-md-4">
				<div class="card card-outline-info">
					<div class="card-block">
						<h4 class="card-title"><?php echo Yii::t('itsc', 'Thumbnail' . ' ' . basename($folder))?></h4>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'File count:')?> <span class="fileCount"></span></small></p>
						<p>
							<a href="<?php echo $this->createUrl('image/doThumb', array('size' => basename($folder))); ?>" class="btn btn-primary" role="button"><?php echo Yii::t('itsc', 'Thumb');?></a>
						</p>
					</div>
				</div>
				
			</div>
			<?php }?>
		</div>
	</div>
</div>