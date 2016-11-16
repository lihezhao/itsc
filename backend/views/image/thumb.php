<?php
/* @var $this ImageController */

$this->breadcrumbs = array(
	Yii::t('itsc', 'Image manager') => array('image/index'),
	Yii::t('itsc', 'Image thumbnail'),
);
?>
<h1><?php echo Yii::t('itsc', 'Image thumbnail')?></h1>
<?php echo CHtml::hiddenField('imageUrl', CHtml::normalizeUrl(array('image/scanImage')))?>
<?php echo CHtml::hiddenField('thumbUrl', CHtml::normalizeUrl(array('image/scanThumb')))?>
<?php echo CHtml::hiddenField('buildThumbUrl', CHtml::normalizeUrl(array('image/buildThumb')))?>
<div class="row">
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-4">
				<div class="card card-outline-primary">
					<div class="card-block" id="image">
						<h4 class="card-title"><?php echo Yii::t('itsc', 'The original image folder')?></h4>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'Folder count:')?> <span id="folderCount"></span></small></p>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'File count:')?> <span id="folderFileCount"></span></small></p>
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
						<h4 class="card-title"><?php echo Yii::t('itsc', 'Thumbnail' . ' ' . basename($folder))?></h4>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'Folder count:')?> <span id="folderCount"></span></small></p>
						<p class="card-text"><small class="text-muted"><?php echo Yii::t('itsc', 'File count:')?> <span id="folderFileCount"></span></small></p>
						<p>
							<a href="<?php echo $this->createUrl('image/doThumb', array('size' => basename($folder))); ?>" class="btn btn-primary" role="button"><?php echo Yii::t('itsc', 'Rebuild the thumbnails');?></a>
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
					<?php echo $form->textField($model, 'size', array('class' => 'form-control', 'placeholder' => Yii::t('itsc', 'Size'))); ?>
				</div>
				<div class="form-group">
					<?php echo CHtml::submitButton(Yii::t('itsc', 'Build the thumbnails'),
							array(
									'class' => 'btn btn-primary',
									'data-loading-text' => Yii::t('itsc', 'Please wait for Building...'),
									'name' => 'buildThumb',
					))?>
				</div>
				<?php $this->endWidget()?>
			</div>
			<div class="col-md-8">
				<div id="progressMessage"><?php echo yii::t('itsc', 'Initialize the image storage process...')?></div>
				<progress class="progress" value="0" max="100" aria-describedby="progressMessage">
					<div class="progress">
						<span class="progress-bar"></span>
					</div>
				</progress>
			</div>
		</div>
	</div>
</div>