<div class="form">
<?php CHtml::$errorCss = 'form-control-danger'?>
<?php $form = $this->beginWidget('CActiveForm', array(
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
	'clientOptions' => array(
		'errorCssClass' => 'has-danger',
	),
)); ?>

	<p class="note"><?php echo Yii::t('itsc', 'Fields with <span class="required">*</span> are required.')?></p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="form-group">
		<?php echo Translator::translateSubString('Title', $form->labelEx($model,'title')); ?>
		<?php echo $form->textField($model,'title', array(
				'class' => 'form-control',
				'placeholder' => Yii::t('itsc', 'Title'),
		)); ?>
		<?php echo Translator::translateSubString('Title', $form->error($model,'title')); ?>
	</div>

	<div class="form-group">
		<?php echo Translator::translateSubString('Content', $form->labelEx($model,'content')); ?>
		<?php echo CHtml::activeTextArea($model,'content',array(
				'class' => 'form-control',
				'placeholder' => Yii::t('itsc', 'Content'),
				'rows'=>10, 'cols'=>70)); ?>
		<p class="hint">You may use <a target="_blank" href="http://daringfireball.net/projects/markdown/syntax">Markdown syntax</a>.</p>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="form-group">
		<?php echo Translator::translateSubString('Tags', $form->labelEx($model,'tags')); ?>
		<?php $this->widget('CAutoComplete', array(
			'model'=>$model,
			'attribute'=>'tags',
			'url'=>array('suggestTags'),
			'multiple'=>true,
			'htmlOptions'=>array('class' => 'form-control', 'size'=>50),
		)); ?>
		<p class="hint"><?php echo Yii::t('itsc', 'Please separate different tags with commas.')?></p>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="form-group">
		<?php echo Translator::translateSubString('Status', $form->labelEx($model,'status')); ?>
		<?php echo $form->dropDownList($model,'status',Translator::translateArray(Lookup::items('PostStatus')), array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton(Yii::t('itsc', $model->isNewRecord ? 'Create' : 'Save'), array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->