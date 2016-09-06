<?php
/* @var $this BaseImageController */
/* @var $model ImageFile */

$this->breadcrumbs=array(
	'Image Files'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ImageFile', 'url'=>array('index')),
	array('label'=>'Manage ImageFile', 'url'=>array('admin')),
);
?>

<h1>Create ImageFile</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>