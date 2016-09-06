<?php
/* @var $this BaseImageController */
/* @var $model ImageFile */

$this->breadcrumbs=array(
	'Image Files'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ImageFile', 'url'=>array('index')),
	array('label'=>'Create ImageFile', 'url'=>array('create')),
	array('label'=>'View ImageFile', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ImageFile', 'url'=>array('admin')),
);
?>

<h1>Update ImageFile <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>