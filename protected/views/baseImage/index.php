<?php
/* @var $this BaseImageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Image Files',
);

$this->menu=array(
	array('label'=>'Create ImageFile', 'url'=>array('create')),
	array('label'=>'Manage ImageFile', 'url'=>array('admin')),
);
?>

<h1>Image Files</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
