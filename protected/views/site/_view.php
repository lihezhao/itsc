<?php
/* @var $this ImageController */
/* @var $data Image */
?>

<figure class="grid-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
	<?php $thumbFile = $data->thumbFile(1200, 1200);?>
	<a href="<?php echo $thumbFile == false ? '' : $thumbFile ?>" itemprop="contentUrl" data-size="<?php echo $data->getDataSize(1200)?>">
		<?php $thumbFile = $data->thumbFile(256, 256);?>
		<img class="img-thumbnail" data-original="<?php echo $thumbFile == false ? 'images/loading.jpg' : $thumbFile ?>" itemprop="thumbnail" alt="<?php echo $data['fileName'] ?>" id="<?php echo $data['id'] ?>">
	</a>
	<figcaption itemprop="caption description">Image caption</figcaption>
	<div class="caption">
	<b><?php echo Yii::t('itsc', 'Date Time Original'); ?>:</b>
	<?php echo CHtml::encode($data['dateTimeOriginal']); ?>
	<br />
	</div>
</figure>