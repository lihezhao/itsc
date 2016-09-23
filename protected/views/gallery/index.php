<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$this->breadcrumbs = array(
	Yii::t('itsc', 'Gallery'));

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
		array('label' => Yii::t('itsc', 'Latest'), 'url' => array('/site/index'), 
				'linkOptions' => $this->action->id == 'index' ? array('class' => 'nav-link active') : array('class' => 'nav-link')),
		array('label' => Yii::t('itsc', 'Popular'), 'url' => array('/site/popular'),
				'linkOptions' => $this->action->id == 'popular' ? array('class' => 'nav-link active') : array('class' => 'nav-link')),
	),
	'itemCssClass' => 'nav-item',
));
?>

<?php $this->widget('zii.widgets.CListView', array(
	'id'=>'image-list',
	'dataProvider'=>$model->search(),
  	'itemView' => '_view',
  	'itemsCssClass' => 'grid',
	'pager' => array(
			'class' => 'LinkPager',	
	),
	'pagerCssClass' => 'Page navigation',
	'afterAjaxUpdate' => 'loadImages',
));?>
