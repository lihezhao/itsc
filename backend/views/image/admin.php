<?php if (!Yii::app()->request->isAjaxRequest) { ?>
<?php
/* @var $this ImageController */
/* @var $model Exif */

$this->breadcrumbs=array(
	Yii::t('app', 'Image manager'),
);

?>

<h1><?php echo Yii::t('app', 'Manage Images')?></h1>

<div class="search-form">
<?php $this->renderPartial('common.views.image._search',array(
	'model'=>$model,
	'front' => false,
)); ?>
</div><!-- search-form -->
<?php }?>
<div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
<?php $this->widget('zii.widgets.CListView', array(
	'cssFile' => false,
	'id'=>'image-list',
	'itemsTagName' => 'ul',
	'itemsCssClass' => 'media-list',
	'dataProvider' => ImageService::search($model, 'backend'),
	'itemView' => '_view',
	'pager' => array(
		'class' => 'LinkPager',
	),
	'pagerCssClass' => 'Page navigation',
	'afterAjaxUpdate' => 'adminLoadImages',
)); ?>
</div>
<?php
	echo CHtml::tag('label', array('class' => 'custom-control custom-checkbox'),
			CHtml::checkBox('selectAll', false, array('class' => 'custom-control-input')) .
			CHtml::tag('span', array('class' => 'custom-control-indicator'), '') .
			CHtml::tag('span', array('class' => 'custom-control-description'), Yii::t('app', 'Select all')));
	
?>
<?php $this->renderPartial('common.views.image.photoswipe')?>