<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('itsc', 'Sign up');
$this->breadcrumbs = array(
	Yii::t('itsc', 'Sign up'),
);
?>

<h1><?php echo Yii::t('itsc', 'Sign up') ?></h1>
<?php CHtml::$errorCss = 'form-control-danger'?>
<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'signup-form',
	'errorMessageCssClass' => 'has-danger',
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
	'clientOptions' => array(
		'validateOnSubmit' => true,
		'errorCssClass' => 'form-control-danger',
	),
));?>
<div class="form-group">
	<?php echo $form->labelEx($model, 'username', array(
			'class' => 'col-form-label col-form-label-sm',
	))?>
	<?php echo $form->textField($model, 'username', array(
			'class' => 'form-control form-control-sm',
			'placeholder' => Yii::t('itsc', 'Username'),
	))?>
	<?php echo $form->error($model, 'username')?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'password', array(
			'class' => 'col-form-label col-form-label-sm',
	))?>
	<?php echo $form->passwordField($model, 'password', array(
			'class' => 'form-control form-control-sm',
			'placeholder' => Yii::t('itsc', 'Password'),
	))?>
	<?php echo $form->error($model, 'password')?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'passwordConfirm', array(
			'class' => 'col-form-label col-form-label-sm',
	))?>
	<?php echo $form->passwordField($model, 'passwordConfirm', array(
			'class' => 'form-control form-control-sm',
			'placeholder' => Yii::t('itsc', 'Password Confirm'),
	))?>
	<?php echo $form->error($model, 'passwordConfirm')?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'email', array(
			'class' => 'col-form-label col-form-label-sm',
	))?>
	<?php echo $form->emailField($model, 'email', array(
			'class' => 'form-control form-control-sm',
			'placeholder' => Yii::t('itsc', 'Email'),
	))?>
	<?php echo $form->error($model, 'email')?>
</div>
<?php if (CCaptcha::checkRequirements()): ?>
<div class="form-group">
	<?php echo $form->labelEx($model, 'verifyCode', array(
			'class' => 'col-form-label col-form-label-sm',
	))?>
	<?php echo $form->textField($model, 'verifyCode', array(
			'class' => 'form-control form-control-sm',
			'placeholder' => Yii::t('itsc', 'Verification Code'),
	)); ?>
	<?php $this->widget('CCaptcha'); ?>
	<?php echo $form->error($model, 'verifyCode'); ?>
</div>
<?php endif; ?>
<?php echo CHtml::submitButton(Yii::t('itsc', 'Sign up'), array('class' => 'btn btn-primary'))?>

<?php $this->endWidget()?>