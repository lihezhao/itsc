<?php
/* @var $this BaseImageController */
/* @var $model ImageFile */
/* @var $form CActiveForm */
?>
<?php
if (!$front) {
	$filterGroups['Basic'] = array(
		'status' => array(),
	); 
}
$filterGroups['Advanced'] = array(
				'make' => array(),
				'model' => array(),
				'flash' => array(),
				'focalLength' => array(),
				'exposureTime' => array(),
				'ISOSpeedRatings' => array(),
				'apertureFNumber' => array(),
				'exposureBiasValue' => array(),
				'meteringMode' => array(),
				'lightSource' => array(),
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
<?php if (isset($_GET['tag'])) { ?>
	<input type="hidden" name="tag" id="tag" value="<?php echo $_GET['tag']?>"/>
<?php } ?>
<div class="row">
	<a class="btn-sm" data-toggle="collapse" href="#folder" aria-expanded="true" aria-controls="folder">
		<?php echo Yii::t('app', 'Folder')?>
	</a>
</div>
<div class="collapse in" id="folder">
<?php $this->widget('JsTree', array(
	'id' => 'folder-tree',
	'core' => array(
		'data' => array(
			'url' => '/folder/loadFolder',
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
   		<?php echo Yii::t('app', $group) ?>
	</a>
</div>
<div class="collapse<?php echo $group == 'Basic' ? ' in' : ''?>" id="<?php echo $group ?>">
<?php foreach ($listDatas as $field => $listData) {?>
<?php
if ($model->hasAttribute($field)) {
	$object = $model;
} else {
	$model->id0 = new Image('search');
	$object = $model->id0;
}
?>
<div class="form-group row">
	<?php echo $form->labelEx($object, $field, array('class' => 'col-md-2 col-form-label col-form-label-sm'))?>
	<div class="col-md-10 col-form-label col-form-label-sm">
	<div class="row">
	<?php echo $form->checkBoxList($object, $field,
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
<?php echo CHtml::submitButton(Yii::t('app', 'OK'), array('class' => 'btn btn-outline-success btn-sm')); ?>
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
$('.search-form form').searchForm({
	url: '/service.php/image/countGroupBy',
	front: '$front'
});
");
?>
<?php 
Yii::app()->clientScript->registerScriptFile('/assets/js/search.js', CClientScript::POS_END);
?>

</div>
</div>