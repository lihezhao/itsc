<!DOCTYPE html>
<html lang="zh">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link href="//cdn.bootcss.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dashboard.css">
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
			<div id="navbar">
			<?php $this->widget('zii.widgets.CMenu', array(
				'htmlOptions' => array('class' => 'nav navbar-nav pull-xs-left', 'id' => 'mainmenu'),
				'items' => array(
					array('label' => Yii::t('itsc', 'Home'), 'url' => array('/dashboard/home/index'), 'linkOptions' => array('class' => 'nav-link')),
					array('label' => Yii::t('itsc', 'Image'), 'url' => array('/dashboard/image/index'), 'linkOptions' => array('class' =>'nav-link')),
					array('label' => Yii::t('itsc', 'Settings'), 'url' => array('/dashboard/settings/index'), 'linkOptions' => array('class' =>'nav-link')),
					array('label' => Yii::t('itsc', 'Help'), 'url' => array('/dashboard/help'), 'linkOptions' => array('class' => 'nav-link')),
				),
				'itemCssClass' => 'nav-item',
			))?>
			</div>
		</nav>
		<?php echo $content ?>				
	</body>
</html>