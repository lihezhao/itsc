<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php echo Yii::t('itsc', 'Fields with <span class="required">*</span> are required.')?></p>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array(
				'class' => 'form-control',
				'placeholder' => $model->getAttributeLabel('author'),
		)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array(
				'class' => 'form-control',
				'placeholder' => $model->getAttributeLabel('email'),
		)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array(
				'class' => 'form-control',
				'placeholder' => $model->getAttributeLabel('url'),
		)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array(
				'class' => 'form-control',
				'placeholder' => $model->getAttributeLabel('content'),
				'rows'=>6)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('itsc', $model->isNewRecord ? 'Submit' : 'Save'), array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->