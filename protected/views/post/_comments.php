<?php foreach($comments as $comment): ?>
<div class="comment" id="c<?php echo $comment->id; ?>">
	<strong><?php echo $comment->authorLink ?></strong>
	<?php echo CHtml::link('#' . date('Y-m-d h:i:s', $comment->create_time), $comment->getUrl($post), array(
		'class'=>'cid',
		'title'=>'Permalink to this comment',
	)); ?>
	<div class="content">
		<?php echo nl2br(CHtml::encode($comment->content)); ?>
	</div>

</div><!-- comment -->
<?php endforeach; ?>