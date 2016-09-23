<?php $this->beginContent('//layouts/dashboard/main') ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
			<?php $this->widget('zii.widgets.CMenu', array(
				'htmlOptions' => array('class' => 'nav nav-sidebar', 'id' => 'sidebar-menu'),
				'items' => array(
					array('label' => Yii::t('itsc', 'Overview'), 'url' => array('/dashboard/index/index')),
					array('label' => Yii::t('itsc', 'Reports'), 'url' => array('/dashboard/home/reports')),
				),
			))?>
				
			</div>
			<div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
				<?php echo $content ?>
			</div>
		</div>
	</div>
<?php $this->endContent(); ?>