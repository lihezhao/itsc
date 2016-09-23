<?php
/* @var $this ExifController */
/* @var $model Exif */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'exif-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pathName'); ?>
		<?php echo $form->textField($model,'pathName',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'pathName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fileName'); ?>
		<?php echo $form->textField($model,'fileName',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'fileName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fileType'); ?>
		<?php echo $form->textField($model,'fileType'); ?>
		<?php echo $form->error($model,'fileType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mimeType'); ?>
		<?php echo $form->textField($model,'mimeType',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'mimeType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fileSize'); ?>
		<?php echo $form->textField($model,'fileSize'); ?>
		<?php echo $form->error($model,'fileSize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fileDateTime'); ?>
		<?php echo $form->textField($model,'fileDateTime'); ?>
		<?php echo $form->error($model,'fileDateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imageDescription'); ?>
		<?php echo $form->textField($model,'imageDescription',array('size'=>60,'maxlength'=>1024)); ?>
		<?php echo $form->error($model,'imageDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'make'); ?>
		<?php echo $form->textField($model,'make',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'make'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orientation'); ?>
		<?php echo $form->textField($model,'orientation'); ?>
		<?php echo $form->error($model,'orientation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'xResolution'); ?>
		<?php echo $form->textField($model,'xResolution',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'xResolution'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'yResolution'); ?>
		<?php echo $form->textField($model,'yResolution',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'yResolution'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resolutionUnit'); ?>
		<?php echo $form->textField($model,'resolutionUnit'); ?>
		<?php echo $form->error($model,'resolutionUnit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'software'); ?>
		<?php echo $form->textField($model,'software',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'software'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateTime'); ?>
		<?php echo $form->textField($model,'dateTime'); ?>
		<?php echo $form->error($model,'dateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'artist'); ?>
		<?php echo $form->textField($model,'artist',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'artist'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ycbCrPositioning'); ?>
		<?php echo $form->textField($model,'ycbCrPositioning'); ?>
		<?php echo $form->error($model,'ycbCrPositioning'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'copyright'); ?>
		<?php echo $form->textField($model,'copyright',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'copyright'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'copyrightPhotographer'); ?>
		<?php echo $form->textField($model,'copyrightPhotographer',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'copyrightPhotographer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'copyrightEditor'); ?>
		<?php echo $form->textField($model,'copyrightEditor',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'copyrightEditor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'exifVersion'); ?>
		<?php echo $form->textField($model,'exifVersion',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'exifVersion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flashPixVersion'); ?>
		<?php echo $form->textField($model,'flashPixVersion'); ?>
		<?php echo $form->error($model,'flashPixVersion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateTimeOriginal'); ?>
		<?php echo $form->textField($model,'dateTimeOriginal'); ?>
		<?php echo $form->error($model,'dateTimeOriginal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateTimeDigitized'); ?>
		<?php echo $form->textField($model,'dateTimeDigitized'); ?>
		<?php echo $form->error($model,'dateTimeDigitized'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'height'); ?>
		<?php echo $form->textField($model,'height'); ?>
		<?php echo $form->error($model,'height'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'width'); ?>
		<?php echo $form->textField($model,'width'); ?>
		<?php echo $form->error($model,'width'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apertureValue'); ?>
		<?php echo $form->textField($model,'apertureValue'); ?>
		<?php echo $form->error($model,'apertureValue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shutterSpeedValue'); ?>
		<?php echo $form->textField($model,'shutterSpeedValue'); ?>
		<?php echo $form->error($model,'shutterSpeedValue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apertureFNumber'); ?>
		<?php echo $form->textField($model,'apertureFNumber',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'apertureFNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'maxApertureValue'); ?>
		<?php echo $form->textField($model,'maxApertureValue'); ?>
		<?php echo $form->error($model,'maxApertureValue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'exposureTime'); ?>
		<?php echo $form->textField($model,'exposureTime',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'exposureTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fNumber'); ?>
		<?php echo $form->textField($model,'fNumber'); ?>
		<?php echo $form->error($model,'fNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meteringMode'); ?>
		<?php echo $form->textField($model,'meteringMode'); ?>
		<?php echo $form->error($model,'meteringMode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lightSource'); ?>
		<?php echo $form->textField($model,'lightSource'); ?>
		<?php echo $form->error($model,'lightSource'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flash'); ?>
		<?php echo $form->textField($model,'flash'); ?>
		<?php echo $form->error($model,'flash'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'exposureMode'); ?>
		<?php echo $form->textField($model,'exposureMode'); ?>
		<?php echo $form->error($model,'exposureMode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'whiteBalance'); ?>
		<?php echo $form->textField($model,'whiteBalance'); ?>
		<?php echo $form->error($model,'whiteBalance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'exposureProgram'); ?>
		<?php echo $form->textField($model,'exposureProgram'); ?>
		<?php echo $form->error($model,'exposureProgram'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'exposureBiasValue'); ?>
		<?php echo $form->textField($model,'exposureBiasValue'); ?>
		<?php echo $form->error($model,'exposureBiasValue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ISOSpeedRatings'); ?>
		<?php echo $form->textField($model,'ISOSpeedRatings'); ?>
		<?php echo $form->error($model,'ISOSpeedRatings'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'componentsConfiguration'); ?>
		<?php echo $form->textField($model,'componentsConfiguration'); ?>
		<?php echo $form->error($model,'componentsConfiguration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'compressedBitsPerPixel'); ?>
		<?php echo $form->textField($model,'compressedBitsPerPixel'); ?>
		<?php echo $form->error($model,'compressedBitsPerPixel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'focusDistance'); ?>
		<?php echo $form->textField($model,'focusDistance'); ?>
		<?php echo $form->error($model,'focusDistance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'focalLength'); ?>
		<?php echo $form->textField($model,'focalLength'); ?>
		<?php echo $form->error($model,'focalLength'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'focalLengthIn35mmFilm'); ?>
		<?php echo $form->textField($model,'focalLengthIn35mmFilm'); ?>
		<?php echo $form->error($model,'focalLengthIn35mmFilm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userCommentEncoding'); ?>
		<?php echo $form->textField($model,'userCommentEncoding'); ?>
		<?php echo $form->error($model,'userCommentEncoding'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userComment'); ?>
		<?php echo $form->textField($model,'userComment',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'userComment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'colorSpace'); ?>
		<?php echo $form->textField($model,'colorSpace'); ?>
		<?php echo $form->error($model,'colorSpace'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'exifImageLength'); ?>
		<?php echo $form->textField($model,'exifImageLength'); ?>
		<?php echo $form->error($model,'exifImageLength'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'exifImageWidth'); ?>
		<?php echo $form->textField($model,'exifImageWidth'); ?>
		<?php echo $form->error($model,'exifImageWidth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fileSource'); ?>
		<?php echo $form->textField($model,'fileSource'); ?>
		<?php echo $form->error($model,'fileSource'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sceneType'); ?>
		<?php echo $form->textField($model,'sceneType'); ?>
		<?php echo $form->error($model,'sceneType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnailFileType'); ?>
		<?php echo $form->textField($model,'thumbnailFileType'); ?>
		<?php echo $form->error($model,'thumbnailFileType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnailMimeType'); ?>
		<?php echo $form->textField($model,'thumbnailMimeType'); ?>
		<?php echo $form->error($model,'thumbnailMimeType'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->