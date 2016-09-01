<?php if(!empty($_GET['tag'])): ?>
<h1><?php echo Yii::t('itsc', 'Posts Tagged with')?> <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php $this->breadcrumbs = array(
		Yii::t('itsc', 'Blog') => array('post/'),
		CHtml::encode($_GET['tag']),
);
?>
<?php else: ?>
<?php $this->breadcrumbs = array(
		Yii::t('itsc', 'Blog'));
?>

<?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
)); ?>
