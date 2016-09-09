<?php
/* @var $this BaseExifController */
/* @var $data Exif */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pathName')); ?>:</b>
	<?php echo CHtml::encode($data->pathName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fileName')); ?>:</b>
	<?php echo CHtml::encode($data->fileName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fileType')); ?>:</b>
	<?php echo CHtml::encode($data->fileType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mimeType')); ?>:</b>
	<?php echo CHtml::encode($data->mimeType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fileSize')); ?>:</b>
	<?php echo CHtml::encode($data->fileSize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fileDateTime')); ?>:</b>
	<?php echo CHtml::encode($data->fileDateTime); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('imageDescription')); ?>:</b>
	<?php echo CHtml::encode($data->imageDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('make')); ?>:</b>
	<?php echo CHtml::encode($data->make); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
	<?php echo CHtml::encode($data->model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orientation')); ?>:</b>
	<?php echo CHtml::encode($data->orientation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('xResolution')); ?>:</b>
	<?php echo CHtml::encode($data->xResolution); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('yResolution')); ?>:</b>
	<?php echo CHtml::encode($data->yResolution); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resolutionUnit')); ?>:</b>
	<?php echo CHtml::encode($data->resolutionUnit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('software')); ?>:</b>
	<?php echo CHtml::encode($data->software); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateTime')); ?>:</b>
	<?php echo CHtml::encode($data->dateTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('artist')); ?>:</b>
	<?php echo CHtml::encode($data->artist); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ycbCrPositioning')); ?>:</b>
	<?php echo CHtml::encode($data->ycbCrPositioning); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('copyright')); ?>:</b>
	<?php echo CHtml::encode($data->copyright); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('copyrightPhotographer')); ?>:</b>
	<?php echo CHtml::encode($data->copyrightPhotographer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('copyrightEditor')); ?>:</b>
	<?php echo CHtml::encode($data->copyrightEditor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exifVersion')); ?>:</b>
	<?php echo CHtml::encode($data->exifVersion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flashPixVersion')); ?>:</b>
	<?php echo CHtml::encode($data->flashPixVersion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateTimeOriginal')); ?>:</b>
	<?php echo CHtml::encode($data->dateTimeOriginal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateTimeDigitized')); ?>:</b>
	<?php echo CHtml::encode($data->dateTimeDigitized); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('width')); ?>:</b>
	<?php echo CHtml::encode($data->width); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apertureValue')); ?>:</b>
	<?php echo CHtml::encode($data->apertureValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shutterSpeedValue')); ?>:</b>
	<?php echo CHtml::encode($data->shutterSpeedValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apertureFNumber')); ?>:</b>
	<?php echo CHtml::encode($data->apertureFNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maxApertureValue')); ?>:</b>
	<?php echo CHtml::encode($data->maxApertureValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exposureTime')); ?>:</b>
	<?php echo CHtml::encode($data->exposureTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fNumber')); ?>:</b>
	<?php echo CHtml::encode($data->fNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meteringMode')); ?>:</b>
	<?php echo CHtml::encode($data->meteringMode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lightSource')); ?>:</b>
	<?php echo CHtml::encode($data->lightSource); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flash')); ?>:</b>
	<?php echo CHtml::encode($data->flash); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exposureMode')); ?>:</b>
	<?php echo CHtml::encode($data->exposureMode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('whiteBalance')); ?>:</b>
	<?php echo CHtml::encode($data->whiteBalance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exposureProgram')); ?>:</b>
	<?php echo CHtml::encode($data->exposureProgram); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exposureBiasValue')); ?>:</b>
	<?php echo CHtml::encode($data->exposureBiasValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ISOSpeedRatings')); ?>:</b>
	<?php echo CHtml::encode($data->ISOSpeedRatings); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('componentsConfiguration')); ?>:</b>
	<?php echo CHtml::encode($data->componentsConfiguration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('compressedBitsPerPixel')); ?>:</b>
	<?php echo CHtml::encode($data->compressedBitsPerPixel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('focusDistance')); ?>:</b>
	<?php echo CHtml::encode($data->focusDistance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('focalLength')); ?>:</b>
	<?php echo CHtml::encode($data->focalLength); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('focalLengthIn35mmFilm')); ?>:</b>
	<?php echo CHtml::encode($data->focalLengthIn35mmFilm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userCommentEncoding')); ?>:</b>
	<?php echo CHtml::encode($data->userCommentEncoding); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userComment')); ?>:</b>
	<?php echo CHtml::encode($data->userComment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('colorSpace')); ?>:</b>
	<?php echo CHtml::encode($data->colorSpace); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exifImageLength')); ?>:</b>
	<?php echo CHtml::encode($data->exifImageLength); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exifImageWidth')); ?>:</b>
	<?php echo CHtml::encode($data->exifImageWidth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fileSource')); ?>:</b>
	<?php echo CHtml::encode($data->fileSource); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sceneType')); ?>:</b>
	<?php echo CHtml::encode($data->sceneType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thumbnailFileType')); ?>:</b>
	<?php echo CHtml::encode($data->thumbnailFileType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thumbnailMimeType')); ?>:</b>
	<?php echo CHtml::encode($data->thumbnailMimeType); ?>
	<br />

	*/ ?>

</div>