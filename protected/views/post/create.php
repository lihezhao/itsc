<?php
$this->breadcrumbs=array(
	'Create Post',
);
?>
<h1><?php echo Yii::t('itsc', 'Create Post')?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>