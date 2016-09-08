<?php
/* @var $this BaseImageController */
/* @var $model ImageFile */

$this->breadcrumbs=array(
	'Image'=>array('index'),
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

<h1><?php echo Yii::t('itsc', 'Manage Images')?></h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<input type="hidden" id="imageUrl" value="<?php echo $this->createUrl('image/thumb') ?>">
<?php $this->widget('zii.widgets.CListView', array(
	'cssFile' => false,
	'id'=>'image-file-grid',
	'itemsTagName' => 'ul',
	'itemsCssClass' => 'media-list',
	'dataProvider'=>$model->search(),
	'itemView' => '_view',
	'pager' => array(
			'class' => 'LinkPager',
	),
	'pagerCssClass' => 'Page navigation',
	
)); ?>
