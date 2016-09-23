<?php
/* @var $this ExifController */
/* @var $model Exif */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pathName'); ?>
		<?php echo $form->textField($model,'pathName',array('size'=>60,'maxlength'=>512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fileName'); ?>
		<?php echo $form->textField($model,'fileName',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fileType'); ?>
		<?php echo $form->textField($model,'fileType'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mimeType'); ?>
		<?php echo $form->textField($model,'mimeType',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fileSize'); ?>
		<?php echo $form->textField($model,'fileSize'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fileDateTime'); ?>
		<?php echo $form->textField($model,'fileDateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'imageDescription'); ?>
		<?php echo $form->textField($model,'imageDescription',array('size'=>60,'maxlength'=>1024)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'make'); ?>
		<?php echo $form->textField($model,'make',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'orientation'); ?>
		<?php echo $form->textField($model,'orientation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'xResolution'); ?>
		<?php echo $form->textField($model,'xResolution',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'yResolution'); ?>
		<?php echo $form->textField($model,'yResolution',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resolutionUnit'); ?>
		<?php echo $form->textField($model,'resolutionUnit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'software'); ?>
		<?php echo $form->textField($model,'software',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateTime'); ?>
		<?php echo $form->textField($model,'dateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'artist'); ?>
		<?php echo $form->textField($model,'artist',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ycbCrPositioning'); ?>
		<?php echo $form->textField($model,'ycbCrPositioning'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'copyright'); ?>
		<?php echo $form->textField($model,'copyright',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'copyrightPhotographer'); ?>
		<?php echo $form->textField($model,'copyrightPhotographer',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'copyrightEditor'); ?>
		<?php echo $form->textField($model,'copyrightEditor',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exifVersion'); ?>
		<?php echo $form->textField($model,'exifVersion',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'flashPixVersion'); ?>
		<?php echo $form->textField($model,'flashPixVersion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateTimeOriginal'); ?>
		<?php echo $form->textField($model,'dateTimeOriginal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateTimeDigitized'); ?>
		<?php echo $form->textField($model,'dateTimeDigitized'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'height'); ?>
		<?php echo $form->textField($model,'height'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'width'); ?>
		<?php echo $form->textField($model,'width'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apertureValue'); ?>
		<?php echo $form->textField($model,'apertureValue'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shutterSpeedValue'); ?>
		<?php echo $form->textField($model,'shutterSpeedValue'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apertureFNumber'); ?>
		<?php echo $form->textField($model,'apertureFNumber',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maxApertureValue'); ?>
		<?php echo $form->textField($model,'maxApertureValue'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exposureTime'); ?>
		<?php echo $form->textField($model,'exposureTime',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fNumber'); ?>
		<?php echo $form->textField($model,'fNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meteringMode'); ?>
		<?php echo $form->textField($model,'meteringMode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lightSource'); ?>
		<?php echo $form->textField($model,'lightSource'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'flash'); ?>
		<?php echo $form->textField($model,'flash'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exposureMode'); ?>
		<?php echo $form->textField($model,'exposureMode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'whiteBalance'); ?>
		<?php echo $form->textField($model,'whiteBalance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exposureProgram'); ?>
		<?php echo $form->textField($model,'exposureProgram'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exposureBiasValue'); ?>
		<?php echo $form->textField($model,'exposureBiasValue'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ISOSpeedRatings'); ?>
		<?php echo $form->textField($model,'ISOSpeedRatings'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'componentsConfiguration'); ?>
		<?php echo $form->textField($model,'componentsConfiguration'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'compressedBitsPerPixel'); ?>
		<?php echo $form->textField($model,'compressedBitsPerPixel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'focusDistance'); ?>
		<?php echo $form->textField($model,'focusDistance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'focalLength'); ?>
		<?php echo $form->textField($model,'focalLength'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'focalLengthIn35mmFilm'); ?>
		<?php echo $form->textField($model,'focalLengthIn35mmFilm'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userCommentEncoding'); ?>
		<?php echo $form->textField($model,'userCommentEncoding'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userComment'); ?>
		<?php echo $form->textField($model,'userComment',array('size'=>60,'maxlength'=>512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'colorSpace'); ?>
		<?php echo $form->textField($model,'colorSpace'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exifImageLength'); ?>
		<?php echo $form->textField($model,'exifImageLength'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exifImageWidth'); ?>
		<?php echo $form->textField($model,'exifImageWidth'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fileSource'); ?>
		<?php echo $form->textField($model,'fileSource'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sceneType'); ?>
		<?php echo $form->textField($model,'sceneType'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thumbnailFileType'); ?>
		<?php echo $form->textField($model,'thumbnailFileType'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thumbnailMimeType'); ?>
		<?php echo $form->textField($model,'thumbnailMimeType'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->