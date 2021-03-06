<?php
/* @var $this ImageController */
/* @var $data Exif */
?>

<figure class="grid-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
	<a href="<?php echo CHtml::normalizeUrl(array('thumbs/1200/' . ImageService::getRelativePath($data))) ?>" itemprop="contentUrl" data-size="<?php echo ImageService::getDataSize($data, 1200)?>">
		<img class="img-thumbnail" data-original="<?php echo CHtml::normalizeUrl(array('thumbs/256/' . ImageService::getRelativePath($data))) ?>" itemprop="thumbnail" alt="<?php echo $data['fileName'] ?>" id="<?php echo $data['id'] ?>">
	</a>
	<figcaption itemprop="caption description"><?php echo $data->id0->description?></figcaption>
	<div class="nav">
		<span class="tag tag-info"><?php echo implode('</span>, <span class="tag tag-info">', ImageService::getTagLinks($data->id0)) ?></span>
	</div>
	<?php echo CHtml::hiddenField('id', $data->id)?>
	<?php $this->widget('CStarRating', array(
		'name'=>'rating' . $index,
		'value' => ImageService::getAverageRating($data->id0),
		'callback' => 'starRating',
	))?>
	<br>
	<div id='mystar_voting'></div>
	<div class="caption">
	<b><?php echo Yii::t('app', 'Date Time Original'); ?>:</b>
	<?php echo CHtml::encode($data['dateTimeOriginal']); ?>
	<br />
	</div>
</figure>

