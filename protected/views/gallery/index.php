<?php
/* @var $this GalleryController */

$this->pageTitle=Yii::app()->name;

$this->breadcrumbs = array(
	Yii::t('app', 'Gallery'));

?>
<div class="search-form">
<?php $this->renderPartial('common.views.image._search',array(
	'model'=>$model,
	'front' => true,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.CMenu', array(
	'htmlOptions' => array('class' => 'nav nav-tabs'),
	'items' => array(
		array('label' => Yii::t('app', 'Latest'), 'url' => array('/site/index'), 
				'linkOptions' => $this->action->id == 'index' ? array('class' => 'nav-link active') : array('class' => 'nav-link')),
		array('label' => Yii::t('app', 'Popular'), 'url' => array('/site/popular'),
				'linkOptions' => $this->action->id == 'popular' ? array('class' => 'nav-link active') : array('class' => 'nav-link')),
	),
	'itemCssClass' => 'nav-item',
));
?>
<div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
<?php $this->widget('zii.widgets.CListView', array(
	'id'=>'image-list',
	'dataProvider'=>ImageService::search($model),
  	'itemView' => '_view',
  	'itemsCssClass' => 'gallery',
	'pager' => array(
			'class' => 'LinkPager',	
	),
	'pagerCssClass' => 'Page navigation',
	'afterAjaxUpdate' => 'loadImages',
));?>
</div>
<?php $this->renderPartial('common.views.image.photoswipe')?>