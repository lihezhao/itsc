<?php
/* @var $this ImageController */
/* @var $model Exif */

$this->breadcrumbs=array(
	Yii::t('itsc', 'Image manager'),
);

$this->menu = array(
	array('label' => Yii::t('itsc', 'Image manager'), 'url' => array('/image/index')),
	array('label' => Yii::t('itsc', 'Image upload'), 'url' => array('/image/page', 'view'=>'upload')),
	array('label' => Yii::t('itsc', 'Image storage'), 'url' => array('/image/storage')),
);

?>

<h1><?php echo Yii::t('itsc', 'Manage Images')?></h1>


<div class="search-form">
<?php $this->renderPartial('common.views.image._search',array(
	'model'=>$model,
	'front' => false,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.CListView', array(
	'cssFile' => false,
	'id'=>'image-list',
	'itemsTagName' => 'ul',
	'itemsCssClass' => 'media-list',
	'dataProvider'=>$model->search('backend'),
	'itemView' => '_view',
	'pager' => array(
		'class' => 'LinkPager',
	),
	'pagerCssClass' => 'Page navigation',
	'afterAjaxUpdate' => 'adminLoadImages',
)); ?>
<?php
	echo CHtml::tag('label', array('class' => 'custom-control custom-checkbox'),
			CHtml::checkBox('selectAll', false, array('class' => 'custom-control-input')) .
			CHtml::tag('span', array('class' => 'custom-control-indicator'), '') .
			CHtml::tag('span', array('class' => 'custom-control-description'), Yii::t('itsc', 'Select all')));
	
?>