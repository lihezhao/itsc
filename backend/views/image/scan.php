<?php
/* @var $this ImageController */

$this->breadcrumbs=array(
	Yii::t('itsc', 'Image manager') => array('image/index'),
	Yii::t('itsc', 'Image scan')
);
?>
<h1><?php echo Yii::t('itsc', 'Image scan'); ?></h1>
<p><?php echo Yii::t('itsc', 'Scan images uploaded previously.')?></p>


<div class="row">
	<div class="col-md-8">
		<div class="row">
			<?php foreach ($folders as $path => $folder) {?>
			<div class="col-md-4">
				<div class="card">
					<div class="card-block">
						<h4 class="card-title"><?php echo Yii::t('itsc', 'Folder') . ' ' . basename($folder->path) ; ?></h4>
						<p>
							<a href="<?php echo $this->createUrl('image/build', array('path' => $path)); ?>" class="btn btn-primary" role="button"><?php echo Yii::t('itsc', 'Build');?></a>
							<a href="<?php echo $this->createUrl('image/scan', array('path' => $path)); ?>" class="btn btn-success" role="button"><?php echo Yii::t('itsc', 'Open');?></a>
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

