<?php
$this->breadcrumbs=array(
	'Manage Posts',
);
?>
<h1>Manage Posts</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile' => false,
	'itemsCssClass' => 'table table-striped table-hover',
	'columns'=>array(
		array(
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->title), $data->url)'
		),
		array(
			'name'=>'status',
			'value'=>'Yii::t("itsc", Lookup::item("PostStatus",$data->status))',
			'filter'=>Translator::translateArray(Lookup::items('PostStatus')),
		),
		array(
			'name'=>'create_time',
			'type'=>'datetime',
			'filter'=>false,
		),
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl' => 'Yii::app()->createUrl("post/view", array("id" => $data->primaryKey))',
			'buttons' => array(
				'view' => array('options' => array('target' => '_blank')),
		),
		),
	),
)); ?>
