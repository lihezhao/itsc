<div class="post">
	<h2>
		<?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?>
	</h2>
	<div>
		posted by <?php echo $data->author->username . ' on ' . date('F j, Y',$data->create_time); ?>
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
		<br/>
		<?php echo CHtml::link('Permalink', $data->url); ?> |
		<?php echo CHtml::link("Comments ({$data->commentCount})",$data->url.'#comments'); ?> |
		Last updated on <?php echo date('F j, Y',$data->update_time); ?>
	</div>
</div>