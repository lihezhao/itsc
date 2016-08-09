<?php
/* @var $this HomeController */

$this->breadcrumbs=array(
	Yii::t('itsc', 'Dashboard'),
);
?>
<div class="page-header">
	<h1><?php echo Yii::t('itsc', 'Dashboard') ?></h1>
</div>

<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<div class="caption">
				<h3><?php echo Yii::t('itsc', 'Image manager'); ?></h3>
				<p><a href="<?php echo $this->createUrl('dashboard/image'); ?>" class="btn btn-primary" role="button"><?php echo Yii::t('itsc', 'Open');?></a></p>
			</div>
		</div>
	</div>
</div>