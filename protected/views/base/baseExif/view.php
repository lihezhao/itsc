<?php
/* @var $this BaseExifController */
/* @var $model Exif */

$this->breadcrumbs=array(
	'Exifs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Exif', 'url'=>array('index')),
	array('label'=>'Create Exif', 'url'=>array('create')),
	array('label'=>'Update Exif', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Exif', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Exif', 'url'=>array('admin')),
);
?>

<h1>View Exif #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pathName',
		'fileName',
		'fileType',
		'mimeType',
		'fileSize',
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
	),
)); ?>
