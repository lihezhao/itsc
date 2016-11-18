<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Blog') => array('post/'),
	$model->title,
);
$this->pageTitle=$model->title;
?>

<?php $this->renderPartial('_view', array(
	'data'=>$model,
)); ?>

<div id="comments">
	<?php if($model->commentCount>=1): ?>
		<h3>
			<?php echo Yii::t('app', $model->commentCount>1 ? $model->commentCount . ' comments' : 'One comment'); ?>
		</h3>

		<?php $this->renderPartial('_comments',array(
			'post'=>$model,
			'comments'=>$model->comments,
		)); ?>
	<?php endif; ?>


</div><!-- comments -->
