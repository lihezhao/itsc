<?php
$this->breadcrumbs=array(
	$model->title=>$model->url,
	Yii::t('app', 'Update'),
);
?>

<h1><?php echo Yii::t('app', 'Update')?> <i><?php echo CHtml::encode($model->title); ?></i></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>