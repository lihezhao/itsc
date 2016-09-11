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

<div class="row">
	<a class="btn-sm" data-toggle="collapse" href="#folder" aria-expanded="true" aria-controls="folder">
		<?php echo Yii::t('itsc', 'Folder')?>
	</a>
</div>
<div class="collapse in" id="folder">
<?php $this->widget('CTreeView', array(
	'url' => array('folder/loadFolder'),
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
</div>
</div>