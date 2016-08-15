<?php
/* @var $this ImageController */

$this->breadcrumbs=array(
	Yii::t('itsc', 'Image Manager'),
);
?>
<div class="page-header">
	<h1><?php echo Yii::t('itsc', 'Image Manager'); ?></h1>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="row">
			<?php foreach ($folders as $folder) {?>
			<div class="col-md-4">
				<div class="thumbnail">
					<div class="caption">
						<h3><?php echo $folder; ?></h3>
						<p>
							<a href="<?php echo $this->createUrl('dashboard/image/build', array('path' => $folder)); ?>" class="btn btn-primary" role="button"><?php echo Yii::t('itsc', 'Build');?></a>
							<a href="<?php echo $this->createUrl('dashboard/image', array('path' => $folder)); ?>" class="btn btn-success" role="button"><?php echo Yii::t('itsc', 'Open');?></a>
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

