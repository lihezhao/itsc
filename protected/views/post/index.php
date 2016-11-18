<?php if(!empty($_GET['tag'])): ?>
<h1><?php echo Yii::t('app', 'Posts Tagged with')?> <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php $this->breadcrumbs = array(
		Yii::t('app', 'Blog') => array('post/'),
		CHtml::encode($_GET['tag']),
);
?>
<?php else: ?>
<?php $this->breadcrumbs = array(
		Yii::t('app', 'Blog'));
?>

<?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
)); ?>
