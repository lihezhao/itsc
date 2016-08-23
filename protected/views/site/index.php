<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="card card-block">
<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'search-form',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
));?>
<?php foreach ($listDatas as $field => $listData) {?>
<div class="form-group row">
	<?php echo $form->labelEx($model, $field, array('class' => 'col-md-2 col-form-label col-form-label-sm'))?>
	<div class="col-md-10 col-form-label col-form-label-sm">
	<div class="row">
	<?php echo $form->checkBoxList($model, $field,
			$listData,
			array('template' => '<div class="col-md-2"><label class="custom-control custom-checkbox">{input}<span class="custom-control-indicator"></span><span class="custom-control-description">{labelTitle}</span></label></div>',
					'separator' => '',
					'class' => 'custom-control-input',
					'uncheckValue' => null,
					'container' => '',
			))?>
	</div>
	</div>
</div>
<?php }?>
<?php $this->endWidget() ?>
</div>
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
<input type="hidden" id="imageUrl" value="<?php echo $this->createUrl('image/thumb') ?>">

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
  	'itemView' => '_view',
  	'itemsCssClass' => 'grid',
	'pager' => array(
			'header' => '',
			'class' => 'LinkPager',
			'internalPageCssClass' => 'page-item',
			'firstPageCssClass' => 'page-item',
			'previousPageCssClass' => 'page-item',
			'nextPageCssClass' => 'page-item',
			'lastPageCssClass' => 'page-item',
			'selectedPageCssClass' => 'active',
			'htmlOptions' => array('class' => 'pagination m-x-auto'),
	),
	'pagerCssClass' => 'Page navigation',
));?>
