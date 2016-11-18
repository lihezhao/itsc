<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>
<div class="row">
	<div class="col-lg-9 col-md-9">
		<div class="card">
			<div class="card-header">
				<?php echo Yii::t('app', 'Gallery')?>
				<span class="pull-xs-right"><?php echo CHtml::link(Yii::t('app', 'More'), array('gallery/index'))?></span>
			</div>
			<div class="card-block">
			<div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
				<?php $this->widget('zii.widgets.CListView', array(
					'id' => 'image-list',
					'dataProvider' => $model->search('home'),
					'itemView' => '_view',
					'itemsCssClass' => 'grid',
					'afterAjaxUpdate' => 'loadImages',
				))?>
			</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<?php echo Yii::t('app', 'Blog')?>
				<span class="pull-xs-right"><?php echo CHtml::link(Yii::t('app', 'More'), array('post/index'))?></span>
				</div>
			<div class="card-block"></div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3">
	</div>
</div>
<?php $this->renderPartial('common.views.image.photoswipe')?>