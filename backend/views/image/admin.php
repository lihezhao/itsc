<?php
/* @var $this ImageController */
/* @var $model Exif */

$this->breadcrumbs=array(
	Yii::t('itsc', 'Image manager'),
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
