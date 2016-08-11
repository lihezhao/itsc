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
					array('label' => Yii::t('itsc', 'Help'), 'url' => array('/dashboard/help'), 'linkOptions' => array('class' => 'nav-link')),
				),
				'itemCssClass' => 'nav-item',
			))?>
			</div>
		</nav>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
				</div>
				<div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
				<?php echo $content ?>
				</div>
			</div>
		</div>
				
	</body>
</html>