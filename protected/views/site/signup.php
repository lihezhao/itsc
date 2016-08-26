<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('itsc', 'Sign up');
$this->breadcrumbs = array(
	Yii::t('itsc', 'Sign up'),
);
?>

<h1><?php echo Yii::t('itsc', 'Sign up') ?></h1>

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'signup-form',
	'enableClientValidation' => true,
	'clientOptions' => array(
		'validateOnSubmit' => true,
	),
));?>
<div class="form-group">
	<?php echo $form->labelEx($model, 'username')?>
	<?php echo $form->textField($model, 'username', array(
			'class' => 'form-control',
			'placeholder' => Yii::t('itsc', 'Username'),
	))?>
	<?php echo $form->error($model, 'username')?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'password')?>
	<?php echo $form->passwordField($model, 'password', array(
			'class' => 'form-control',
			'placeholder' => Yii::t('itsc', 'Password'),
	))?>
	<?php echo $form->error($model, 'password')?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'passwordConfirm')?>
	<?php echo $form->passwordField($model, 'passwordConfirm', array(
			'class' => 'form-control',
			'placeholder' => Yii::t('itsc', 'Password Confirm'),
	))?>
	<?php echo $form->error($model, 'passwordConfirm')?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'email')?>
	<?php echo $form->emailField($model, 'email', array(
			'class' => 'form-control',
			'placeholder' => Yii::t('itsc', 'Email'),
	))?>
	<?php echo $form->error($model, 'email')?>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'profile')?>
	<?php echo $form->textArea($model, 'profile', array(
			'class' => 'form-control',
			'placeholder' => Yii::t('itsc', 'Profile'),
			'rows' => 6,
	))?>
	<?php echo $form->error($model, 'profile')?>
</div>
<?php echo CHtml::submitButton(Yii::t('itsc', 'Sign up'), array('class' => 'btn btn-primary'))?>

<?php $this->endWidget()?>