<?php
/* @var $this HomeController */

$this->breadcrumbs=array(
	Yii::t('app', 'Dashboard'),
);
?>
<div class="page-header">
	<h1><?php echo Yii::t('app', 'Overview') ?></h1>
</div>

<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<div class="caption">
				<h3><?php echo Yii::t('app', 'Image Manager'); ?></h3>
				<p><a href="<?php echo $this->createUrl('dashboard/image'); ?>" class="btn btn-primary" role="button"><?php echo Yii::t('app', 'Open');?></a></p>
			</div>
		</div>
	</div>
</div>