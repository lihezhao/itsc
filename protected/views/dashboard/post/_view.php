<div class="post">
	<h2>
		<?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?>
	</h2>
	
	<div>
		<?php echo date('Y-m-d h:i:s', $data->create_time); ?>
	</div>
	<div class="content">
		<?php
			$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
			echo $data->content;
			$this->endWidget();
		?>
	</div>
	<div class="nav">
		<?php echo '<span class="tag tag-info">' . implode('</span>, <span class="tag tag-info">', $data->tagLinks) . '</span>'; ?>
		<?php echo $data->author->username ?>
		<br/>
		<?php echo CHtml::link(Yii::t('itsc', 'Permalink'), $data->url); ?> |
		<?php echo CHtml::link(Yii::t('itsc', 'Comments') . "({$data->commentCount})",$data->url.'#comments'); ?> |
		<?php echo Yii::t('itsc', 'Last updated on') . date('Y-m-d h:i:s', $data->update_time); ?>
	</div>
</div>
