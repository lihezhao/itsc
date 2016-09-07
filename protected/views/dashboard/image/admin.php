<?php
/* @var $this BaseImageController */
/* @var $model ImageFile */

$this->breadcrumbs=array(
	'Image Files'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ImageFile', 'url'=>array('index')),
	array('label'=>'Create ImageFile', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#image-file-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Image Files</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'cssFile' => false,
	'id'=>'image-file-grid',
	'itemsCssClass' => 'table table-striped table-hover',		
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'path',
			'class' => 'CBootstrapDataColumn',
		),
		array(
			'name' => 'created_at',
			'class' => 'CBootstrapDataColumn',
		),
		array(
			'name' => 'tags',
			'class' => 'CBootstrapDataColumn',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
	'pager' => array(
			'class' => 'LinkPager',
	),
	'pagerCssClass' => 'Page navigation',
	
)); ?>
