<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'image-search-form',
	'method' => 'get',
));?>
<div class="form-group"></div>
<?php $this->endWidget() ?>

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
	'dataProvider' => $dataProvider,
  	'itemView' => '_view',
  	'itemsCssClass' => 'grid',
));?>

