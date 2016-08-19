<?php
/* @var $this ImageController */
/* @var $data Image */
?>

<div class="grid-item">
	<a href="#">
		<img class="img-thumbnail" id="<?php echo $data->id ?>">
	</a>
	<div class="caption">
	<b><?php echo CHtml::encode($data->getAttributeLabel('dateTimeOriginal')); ?>:</b>
	<?php echo CHtml::encode($data->dateTimeOriginal); ?>
	<br />
	</div>
</div>