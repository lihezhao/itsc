<?php
/* @var $this ImageController */
/* @var $data Exif */
?>

<figure class="grid-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
	<a href="<?php echo CHtml::normalizeUrl(array('thumbs/1200/' . $data->getRelativePath())) ?>" itemprop="contentUrl" data-size="<?php echo $data->getDataSize(1200)?>">
		<img class="img-thumbnail" data-original="<?php echo CHtml::normalizeUrl(array('thumbs/256/' . $data->getRelativePath())) ?>" itemprop="thumbnail" alt="<?php echo $data['fileName'] ?>" id="<?php echo $data['id'] ?>">
	</a>
	<figcaption itemprop="caption description"><?php echo $data->id0->description?></figcaption>
	<div class="nav">
		<span class="tag tag-info"><?php echo implode('</span>, <span class="tag tag-info">', $data->id0->tagLinks) ?></span>
	</div>
	<?php echo CHtml::hiddenField('id', $data->id)?>
	<?php $this->widget('CStarRating', array(
		'name'=>'rating' . $index,
		'value' => $data->id0->getAverageRating(),
		'callback' => 'starRating',
	))?>
	<br>
	<div id='mystar_voting'></div>
	<div class="caption">
	<b><?php echo Yii::t('itsc', 'Date Time Original'); ?>:</b>
	<?php echo CHtml::encode($data['dateTimeOriginal']); ?>
	<br />
	</div>
</figure>

