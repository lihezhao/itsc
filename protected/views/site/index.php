<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'search-form',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
));?>
<div class="form-group">
	<?php echo $form->labelEx($model, 'make')?>
	<?php echo $form->checkBoxList($model, 'make',
			$makeData,
			array('template' => '<label class="custom-control custom-checkbox">{input}<span class="custom-control-indicator"></span><span class="custom-control-description">{labelTitle}</span></label>',
					'separator' => '',
					'class' => 'custom-control-input',
					'uncheckValue' => null,
					'container' => '',
			))?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'isoSpeedRatings')?>
	<?php echo $form->checkBoxList($model, 'isoSpeedRatings',
			$isoSpeedRatingsData,
			array('template' => '<label class="custom-control custom-checkbox">{input}<span class="custom-control-indicator"></span><span class="custom-control-description">{labelTitle}</span></label>',
				  'separator' => '',
				  'class' => 'custom-control-input',
				  'uncheckValue' => null,
				  'container' => '',
			))?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'flash')?>
	<?php echo $form->checkBoxList($model, 'flash',
			$flashData,
			array('template' => '<label class="custom-control custom-checkbox">{input}<span class="custom-control-indicator"></span><span class="custom-control-description">{labelTitle}</span></label>',
				  'separator' => '',
				  'class' => 'custom-control-input',
				  'uncheckValue' => null,
				  'container' => '',
			))?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'focalLength')?>
	<?php echo $form->checkBoxList($model, 'focalLength',
			$focalLengthData,
			array('template' => '<label class="custom-control custom-checkbox">{input}<span class="custom-control-indicator"></span><span class="custom-control-description">{labelTitle}</span></label>',
				  'separator' => '',
				  'class' => 'custom-control-input',
				  'uncheckValue' => null,
				  'container' => '',
			))?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'exposureTime')?>
	<?php echo $form->checkBoxList($model, 'exposureTime',
			$exposureTimeData,
			array('template' => '<label class="custom-control custom-checkbox">{input}<span class="custom-control-indicator"></span><span class="custom-control-description">{labelTitle}</span></label>',
				  'separator' => '',
				  'class' => 'custom-control-input',
				  'uncheckValue' => null,
				  'container' => '',
			))?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'apertureFNumber')?>
	<?php echo $form->checkBoxList($model, 'apertureFNumber',
			$apertureFNumberData,
			array('template' => '<label class="custom-control custom-checkbox">{input}<span class="custom-control-indicator"></span><span class="custom-control-description">{labelTitle}</span></label>',
				  'separator' => '',
				  'class' => 'custom-control-input',
				  'uncheckValue' => null,
				  'container' => '',
			))?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'model')?>
	<?php echo $form->checkBoxList($model, 'model',
			$modelData,
			array('template' => '<label class="custom-control custom-checkbox">{input}<span class="custom-control-indicator"></span><span class="custom-control-description">{labelTitle}</span></label>',
				  'separator' => '',
				  'class' => 'custom-control-input',
				  'uncheckValue' => null,
				  'container' => '',
			))?>
</div>

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
