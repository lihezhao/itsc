<?php
/* @var $this BaseImageController */
/* @var $model ImageFile */

$this->breadcrumbs=array(
	'Image Files'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ImageFile', 'url'=>array('index')),
	array('label'=>'Create ImageFile', 'url'=>array('create')),
	array('label'=>'Update ImageFile', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ImageFile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ImageFile', 'url'=>array('admin')),
);
?>

<h1>View ImageFile #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'path',
		'created_at',
	),
)); ?>
