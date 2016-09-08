<?php
?>
<li class="media">
	<div class="media-left">
		<a href="#">
			<img class="media-object img-thumbnail" src="images/loading.jpg" alt="<?php echo $data['path'] ?>" id="<?php echo $data['id'] ?>">
		</a>
	</div>
	<div class="media-body">
		<?php echo CHtml::link(Yii::t('itsc', $data['status'] == 0 ? 'Show' : 'Hide'),
				array('show', 'id' => $data['id']), array('class' => 'status'))?>
	</div>	
</li>