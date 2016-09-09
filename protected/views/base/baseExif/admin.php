<?php
/* @var $this BaseExifController */
/* @var $model Exif */

$this->breadcrumbs=array(
	'Exifs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Exif', 'url'=>array('index')),
	array('label'=>'Create Exif', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#exif-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Exifs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'exif-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'pathName',
		'fileName',
		'fileType',
		'mimeType',
		'fileSize',
		/*
		'fileDateTime',
		'imageDescription',
		'make',
		'model',
		'orientation',
		'xResolution',
		'yResolution',
		'resolutionUnit',
		'software',
		'dateTime',
		'artist',
		'ycbCrPositioning',
		'copyright',
		'copyrightPhotographer',
		'copyrightEditor',
		'exifVersion',
		'flashPixVersion',
		'dateTimeOriginal',
		'dateTimeDigitized',
		'height',
		'width',
		'apertureValue',
		'shutterSpeedValue',
		'apertureFNumber',
		'maxApertureValue',
		'exposureTime',
		'fNumber',
		'meteringMode',
		'lightSource',
		'flash',
		'exposureMode',
		'whiteBalance',
		'exposureProgram',
		'exposureBiasValue',
		'ISOSpeedRatings',
		'componentsConfiguration',
		'compressedBitsPerPixel',
		'focusDistance',
		'focalLength',
		'focalLengthIn35mmFilm',
		'userCommentEncoding',
		'userComment',
		'colorSpace',
		'exifImageLength',
		'exifImageWidth',
		'fileSource',
		'sceneType',
		'thumbnailFileType',
		'thumbnailMimeType',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
