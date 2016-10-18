<?php
?>
<li class="media">
	<div class="media-left">
		<a href="#">
			<img class="media-object img-thumbnail" data-original="<?php echo '/thumbs/256/' . $data->getRelativePath() ?>" alt="<?php echo $data['fileName'] ?>" id="<?php echo $data['id'] ?>">
		</a>
	</div>
	<div class="media-body">
		<?php
			echo CHtml::tag('label', array('class' => 'custom-control custom-checkbox'),
					CHtml::checkBox('select', false, array('class' => 'custom-control-input')) .
					CHtml::tag('span', array('class' => 'custom-control-indicator'), '') .
					CHtml::tag('span', array('class' => 'custom-control-description'), Yii::t('itsc', 'Selected')))
		?>
		
		<div class="dropdown">
			<?php echo CHtml::htmlButton(Yii::t('itsc', $data->id0->getStatus()),
					array('class' => 'btn btn-info dropdown-toggle',
						  'id' => 'status',
						  'data-toggle' => 'dropdown',
						  'aria-haspopup' => 'true',
						  'aria-expanded' => 'false'
			))?>
			<div class="dropdown-menu" aria-labelledby="status">
				<?php echo CHtml::link(Yii::t('itsc', 'Hide'), array('status', 'id' => $data['id'], 'status' => 0), array('class' => 'dropdown-item status'))?>
				<?php echo CHtml::link(Yii::t('itsc', 'Show'), array('status', 'id' => $data['id'], 'status' => 1), array('class' => 'dropdown-item status'))?>
				<?php echo CHtml::link(Yii::t('itsc', 'Show and Home'), array('status', 'id' => $data['id'], 'status' => 2), array('class' => 'dropdown-item status'))?>
			</div>
		</div>
	
	</div>
</li>