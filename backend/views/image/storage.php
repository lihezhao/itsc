<?php
/* @var $this ImageController */

$this->breadcrumbs=array(
	Yii::t('itsc', 'Image manager') => array('image/index'),
	Yii::t('itsc', 'Image storage')
);
?>
<h1><?php echo Yii::t('itsc', 'Image storage'); ?></h1>
<p><?php echo Yii::t('itsc', 'Scan images uploaded previously.')?></p>


<div class="row">
	<div class="col-md-8">
		<div class="row">
			<?php echo CHtml::hiddenField('scanUrl', CHtml::normalizeUrl(array('image/storage')))?>
			<?php foreach ($folders as $path => $folder) {?>
			<div class="col-md-4">
				<div class="card">
					<div class="card-block">
						<?php echo CHtml::hiddenField('path', basename($path), array('class' => 'path'))?>
						<h4 class="card-title"><?php echo Yii::t('itsc', 'Folder') . ' ' . basename($folder->path) ; ?></h4>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'File count:')?> <span class="fileCount"></span></small></p>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'Subdir count:')?> <span class="subdirCount"></span></small></p>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'Subdir file count:')?> <span class="subdirfileCount"></span></small></p>
						<p>
							<a href="<?php echo $this->createUrl('image/build', array('path' => $path)); ?>" class="btn btn-primary" role="button"><?php echo Yii::t('itsc', 'Build');?></a>
							<a href="<?php echo $this->createUrl('image/storage', array('path' => basename($path))); ?>" class="btn btn-success" role="button"><?php echo Yii::t('itsc', 'Open');?></a>
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

