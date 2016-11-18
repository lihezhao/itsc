<?php
/* @var $this ImageController */

$this->breadcrumbs = array(
	Yii::t('app', 'Image manager') => array('image/index'),
	Yii::t('app', 'Image thumbnail'),
);
?>
<h1><?php echo Yii::t('app', 'Image thumbnail')?></h1>
<?php echo CHtml::hiddenField('imageUrl', CHtml::normalizeUrl(array('image/scanImage')))?>
<?php echo CHtml::hiddenField('thumbUrl', CHtml::normalizeUrl(array('image/scanThumb')))?>
<?php echo CHtml::hiddenField('buildThumbUrl', CHtml::normalizeUrl(array('image/buildThumb')))?>
<div class="row">
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-4">
				<div class="card card-outline-primary">
					<div class="card-block" id="image">
						<h4 class="card-title"><?php echo Yii::t('app', 'The original image folder')?></h4>
						<p class="card-text"><small class="text-muted"><span id="folderCount"></span><?php echo Yii::t('app', 'Folders')?></small></p>
						<p class="card-text"><small class="text-muted"><span id="folderFileCount"></span><?php echo Yii::t('app', 'Files')?></small></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($thumbnailFolder['folders'][''] as $folder) {?>
			<div class="col-md-4">
				<div class="card card-outline-info">
					<div class="card-block">
						<?php echo CHtml::hiddenField('path', basename($folder))?>
						<h4 class="card-title"><?php echo Yii::t('app', 'The thumbnail folder') ?><small><?php echo basename($folder) ?></small></h4>
						<p class="card-text"><small class="text-muted"><span id="folderCount"></span><?php echo Yii::t('app', 'Folders')?></small></p>
						<p class="card-text"><small class="text-muted"><span id="folderFileCount"></span><?php echo Yii::t('app', 'Files')?></small></p>
						<p>
							<a href="<?php echo $this->createUrl('image/doThumb', array('size' => basename($folder))); ?>" class="btn btn-primary" role="button"><?php echo Yii::t('app', 'Rebuild the thumbnails');?></a>
						</p>
					</div>
				</div>
				
			</div>
			<?php }?>
		</div>
		<div class="row">
			<?php $model = new ImageThumbForm;?>
			<div class="col-md-4">
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id' => 'image-thumb-form',
				))?>
				<div class="form-group">
					<?php echo $form->labelEx($model, 'size'); ?>
					<?php echo $form->textField($model, 'size', array('class' => 'form-control', 'placeholder' => Yii::t('app', 'Size'))); ?>
				</div>
				<div class="form-group">
					<?php echo CHtml::submitButton(Yii::t('app', 'Build the thumbnails'),
							array(
									'class' => 'btn btn-primary',
									'data-loading-text' => Yii::t('app', 'Please wait for Building...'),
									'name' => 'buildThumb',
					))?>
				</div>
				<?php $this->endWidget()?>
			</div>
			<div class="col-md-8 progress">
				<div id="progressMessage"><?php echo Yii::t('app', 'Initialize the image thumbnail process...')?></div>
				<progress class="progress" value="0" max="100" aria-describedby="progressMessage">
					<div class="progress">
						<span class="progress-bar"></span>
					</div>
				</progress>
			</div>
		</div>
	</div>
</div>