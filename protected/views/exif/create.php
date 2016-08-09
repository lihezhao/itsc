<?php
/* @var $this ExifController */
/* @var $model Exif */

$this->breadcrumbs=array(
	'Exifs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Exif', 'url'=>array('index')),
	array('label'=>'Manage Exif', 'url'=>array('admin')),
);
?>

<h1>Create Exif</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>