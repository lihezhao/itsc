<?php
/* @var $this ImageController */
/* @var $data Image */
?>

<div class="grid-item">
	<a href="#">
		<img class="img-thumbnail" src="images/loading.jpg" alt="<?php echo $data['fileName'] ?>" id="<?php echo $data['id'] ?>">
	</a>
	<div class="caption">
	<b><?php echo Yii::t('itsc', 'Date Time Original'); ?>:</b>
	<?php echo CHtml::encode($data['dateTimeOriginal']); ?>
	<br />
	</div>
</div>