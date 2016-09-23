<?php
/* @var $this BaseImageController */
/* @var $model ImageFile */
/* @var $form CActiveForm */
?>
<?php
$filterGroups = array(
	'Basic' => array(
		'make' => Exif::listData('make', $front),
		'model' => Exif::listData('model', $front),
	),
	'Advanced' => array(
		'flash' => Exif::listData('flash', $front),
		'focalLength' => Exif::listData('focalLength', $front),
		'exposureTime' => Exif::listData('exposureTime', $front),
		'ISOSpeedRatings' => Exif::listData('ISOSpeedRatings', $front),
		'apertureFNumber' => Exif::listData('apertureFNumber', $front),
		'exposureBiasValue' => Exif::listData('exposureBiasValue', $front),
		'meteringMode' => Exif::listData('meteringMode', $front),
		'lightSource' => Exif::listData('lightSource', $front),
	),
);
?>

<div class="card">
	<div class="card-block">
<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'search-form',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
));?>
<input type="hidden" name="Exif[pathName]" id="folders" value="" />
<div class="row">
	<a class="btn-sm" data-toggle="collapse" href="#folder" aria-expanded="true" aria-controls="folder">
		<?php echo Yii::t('itsc', 'Folder')?>
	</a>
</div>
<div class="collapse in" id="folder">
<?php $this->widget('JsTree', array(
	'id' => 'folder-tree',
	'core' => array(
		'data' => array(
			'url' => '/itsc/folder/loadFolder',
			'data' => new CJavaScriptExpression("function(node) {return {'id': node.id};}"),
			'dataType' => 'json',
		),
	),
	'plugins' => array(
		'checkbox',
	),

))?>
</div>
<?php foreach ($filterGroups as $group => $listDatas) {?>
<div class="row">
	<a class="btn-sm" data-toggle="collapse" href="#<?php echo $group ?>" aria-expanded=<?php echo $group == 'Basic' ? '"true"' : '"false"' ?> aria-controls="<?php echo $group ?>">
   		<?php echo Yii::t('itsc', $group) ?>
	</a>
</div>
<div class="collapse<?php echo $group == 'Basic' ? ' in' : ''?>" id="<?php echo $group ?>">
<?php foreach ($listDatas as $field => $listData) {?>
<div class="form-group row">
	<?php echo $form->labelEx($model, $field, array('class' => 'col-md-2 col-form-label col-form-label-sm'))?>
	<div class="col-md-10 col-form-label col-form-label-sm">
	<div class="row">
	<?php echo $form->checkBoxList($model, $field,
			$listData,
			array('template' => '<div class="col-md-3"><label class="custom-control custom-checkbox">{input}<span class="custom-control-indicator"></span><span class="custom-control-description">{labelTitle}</span></label></div>',
					'separator' => '',
					'class' => 'custom-control-input',
					'uncheckValue' => null,
					'container' => 'div',
			))?>
	</div>
	</div>
</div>
<?php }?>
</div>
<?php }?>
<div class="row">
<?php echo CHtml::submitButton(Yii::t('itsc', 'OK'), array('class' => 'btn btn-outline-success btn-sm')); ?>
</div>
<?php $this->endWidget() ?>
<?php 
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	var folders = $('#folder-tree').jstree().get_checked();
	$('#folders').val(folders);
	var data = $(this).serialize();
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
</div>
</div>