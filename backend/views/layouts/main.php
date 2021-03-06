<!DOCTYPE html>
<html lang="zh">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<?php Yii::app()->clientScript->registerCssFile('css/dashboard.css')?>
	</head>
	<body>
		<nav class="navbar navbar-dark navbar-fixed-top bg-inverse">
			<button type="button" class="navbar-toggler hidden-sm-up" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">ITSC</a>
			<?php if ($this->action->id != 'login') {?>
			<div id="navbar">
			<?php $this->widget('zii.widgets.CMenu', array(
				'htmlOptions' => array('class' => 'nav navbar-nav pull-xs-left', 'id' => 'mainmenu'),
				'items' => array(
					array('label' => Yii::t('app', 'Home'), 'url' => array('/site/index'), 'linkOptions' => array('class' => 'nav-link')),
					array('label' => Yii::t('app', 'Image'), 'url' => array('/image/index'), 'linkOptions' => array('class' =>'nav-link')),
					array('label' => Yii::t('app', 'Blog'), 'url' => array('/post/index'), 'linkOptions' => array('class' =>'nav-link')),
					array('label' => Yii::t('app', 'Settings'), 'url' => array('/settings/index'), 'linkOptions' => array('class' =>'nav-link')),
					array('label' => Yii::t('app', 'Help'), 'url' => array('/help'), 'linkOptions' => array('class' => 'nav-link')),
				),
				'itemCssClass' => 'nav-item',
			))?>
			</div>
			<?php } ?>
		</nav>
		
		<?php echo $content ?>
	</body>
</html>