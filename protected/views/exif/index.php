<?php
/* @var $this ExifController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Exifs',
);

$this->menu=array(
	array('label'=>'Create Exif', 'url'=>array('create')),
	array('label'=>'Manage Exif', 'url'=>array('admin')),
);
?>

<h1>Exifs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
