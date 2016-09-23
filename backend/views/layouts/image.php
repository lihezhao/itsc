<?php $this->beginContent('//layouts/dashboard/main') ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
			<?php $this->widget('zii.widgets.CMenu', array(
				'htmlOptions' => array('class' => 'nav nav-sidebar', 'id' => 'sidebar-menu'),
				'items' => array(
					array('label' => Yii::t('itsc', 'Image Manager'), 'url' => array('/dashboard/image/index')),
				),
			))?>
			</div>
			<div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
				<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'tagName' => 'ol',
			'htmlOptions' => array('class' => 'breadcrumb'),
			'activeLinkTemplate' => '<li class="breadcrumb-item"><a href="{url}">{label}</a></li>',
			'inactiveLinkTemplate' => '<li class="breadcrumb-item active">{label}</li>',
			'separator' => '',
		)); ?><!-- breadcrumbs -->
	<?php endif?>
			
				<?php echo $content ?>
			</div>
		</div>
	</div>
<?php $this->endContent(); ?>