<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	yii::t('itsc', 'Login'),
);
?>

<h1><?php echo yii::t('itsc', 'Login'); ?></h1>

<p><?php echo yii::t('itsc', 'Please fill out the following form with your login credentials:'); ?></p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note"><?php echo Yii::t('itsc', 'Fields with <span class="required">*</span> are required.')?></p>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username', array(
				'class' => 'form-control',
				'placeholder' => yii::t('itsc', 'Username'),
		)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password', array(
				'class' => 'form-control',
				'placeholder' => Yii::t('itsc', 'Password'),
		)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="checkbox">
		<label><?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?></label>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('itsc', 'Login'), array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
