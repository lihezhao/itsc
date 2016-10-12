<?php $this->beginContent('/layouts/main') ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
			<?php $this->widget('zii.widgets.CMenu', array(
				'htmlOptions' => array('class' => 'nav nav-sidebar', 'id' => 'sidebar-menu'),
				'items' => $this->menu,
			))?>
			</div>
			<div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
				<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links' => Translator::translateArray($this->breadcrumbs),
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