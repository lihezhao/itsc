<?php
$this->breadcrumbs=array(
	'Blog',
	'Manage Posts',
);
?>
<h1><?php echo Yii::t('itsc', 'Manage Posts')?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'cssFile' => false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table table-striped table-hover',
	'columns'=>array(
		array(
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->title), $data->url)',
			'class' => 'CBootstrapDataColumn',
		),
		array(
			'name'=>'status',
			'value'=>'Yii::t("itsc", Lookup::item("PostStatus",$data->status))',
			'filter'=>Translator::translateArray(Lookup::items('PostStatus')),
			'class' => 'CBootstrapDataColumn',
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
