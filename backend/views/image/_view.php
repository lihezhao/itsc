<?php
?>
<li class="media">
	<div class="media-left">
	<figure class="grid-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
		<a href="<?php echo '/thumbs/1200' . ImageService::getRelativePath($data) ?>" itemprop="contentUrl" data-size="<?php echo ImageService::getDataSize($data, 1200)?>">
			<img class="media-object img-thumbnail" data-original="<?php echo '/thumbs/256' . ImageService::getRelativePath($data) ?>" alt="<?php echo $data['fileName'] ?>" id="<?php echo $data['id'] ?>">
		</a>
	</figure>
	</div>
	<div class="media-body">
		<?php
			echo CHtml::tag('label', array('class' => 'custom-control custom-checkbox'),
					CHtml::checkBox('select', false, array('class' => 'custom-control-input')) .
					CHtml::tag('span', array('class' => 'custom-control-indicator'), '') .
					CHtml::tag('span', array('class' => 'custom-control-description'), Yii::t('app', 'Selected')))
		?>
		
		<div class="dropdown">
			<?php echo CHtml::htmlButton(Yii::t('app', ImageService::getStatus($data->id0)),
					array('class' => 'btn btn-info dropdown-toggle',
						  'id' => 'status',
						  'data-toggle' => 'dropdown',
						  'aria-haspopup' => 'true',
						  'aria-expanded' => 'false'
			))?>
			<div class="dropdown-menu" aria-labelledby="status">
				<?php echo CHtml::link(Yii::t('app', 'Hide'), array('status', 'id' => $data['id'], 'status' => 0), array('class' => 'dropdown-item status'))?>
				<?php echo CHtml::link(Yii::t('app', 'Show'), array('status', 'id' => $data['id'], 'status' => 1), array('class' => 'dropdown-item status'))?>
				<?php echo CHtml::link(Yii::t('app', 'Show and Home'), array('status', 'id' => $data['id'], 'status' => 2), array('class' => 'dropdown-item status'))?>
			</div>
		</div>
		<?php $form = $this->beginWidget('CActiveForm', array(
				
		)); ?>
		<div class="sticky">
		<div class="input-group">
		<?php echo CHtml::activeTextArea($data->id0, 'description', array(
				'class' => 'form-control',
				'placeholder' => Yii::t('app', 'Description'),
				'rows' => 6,)
		)?>
		<?php echo  CHtml::htmlButton(Yii::t('app', 'Save'), array(
				'class' => 'btn btn-secondary',
				'id' =>$data['id'],
				'name' => 'saveDescription',
				'value' => CHtml::normalizeUrl(array('image/saveDescription'))
		));?>
		</div>
		</div>
		<div class="sticky">
		<div class="input-group">
		<?php $this->widget('CAutoComplete', array(
				'model' => $data->id0,
				'attribute' => 'tags',
				'url' => array('post/suggestTags'),
				'multiple' => true,
				'htmlOptions' => array('class' => 'form-control', 'placeholder' => Yii::t('app', 'tags'), 'size'=>50),
		));?>
		<span class="input-group-btn">
			<?php echo CHtml::htmlButton(Yii::t('app', 'Save'), array(
					'class' => 'btn btn-secondary',
					'name' => 'saveTags',
					'value' => CHtml::normalizeUrl(array('image/saveTags', 'id' => $data['id']))
			));?>
		</span>
		</div>
		</div>
		<?php $this->endWidget(); ?>
	
	</div>
</li>