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
$('.search-form form').submit(function(){
	$('#image-list').yiiListView.update('image-list',
		{
		data: $(this).serialize(),
		url: $(this).attr('action')
		}	
	);
	return false;
});
");
?>

<h1><?php echo Yii::t('itsc', 'Manage Images')?></h1>


<div class="search-form">
<?php $this->renderPartial('/image/_search',array(
	'model'=>$model,
	'front' => false,
)); ?>
</div><!-- search-form -->
<input type="hidden" id="imageUrl" value="<?php echo $this->createUrl('image/thumb') ?>">
<?php $this->widget('zii.widgets.CListView', array(
	'cssFile' => false,
	'id'=>'image-list',
	'itemsTagName' => 'ul',
	'itemsCssClass' => 'media-list',
	'dataProvider'=>$model->search(false),
	'itemView' => '_view',
	'pager' => array(
		'class' => 'LinkPager',
	),
	'pagerCssClass' => 'Page navigation',
	'afterAjaxUpdate' => 'loadImages',
)); ?>
