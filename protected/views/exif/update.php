<?php
/* @var $this ExifController */
/* @var $model Exif */

$this->breadcrumbs=array(
	'Exifs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Exif', 'url'=>array('index')),
	array('label'=>'Create Exif', 'url'=>array('create')),
	array('label'=>'View Exif', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Exif', 'url'=>array('admin')),
);
?>

<h1>Update Exif <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>