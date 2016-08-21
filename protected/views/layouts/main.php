<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	<link href="//cdn.bootcss.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/itsc.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<nav class="navbar navbar-fixed-top navbar-light bg-faded">
		<div class="container">
			<a class="navbar-brand" href="#">ITSC</a>
				<?php $this->widget('zii.widgets.CMenu',array(
					'htmlOptions' => array('class' => 'nav navbar-nav', 'id' => 'mainmenu'),
					'items'=>array(
						array('label'=>Yii::t('itsc', 'Home'), 'url'=>array('/site/index'), 'linkOptions' => array('class' => 'nav-link')),
						array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'), 'linkOptions' => array('class' => 'nav-link')),
						array('label'=>'Contact', 'url'=>array('/site/contact'), 'linkOptions' => array('class' => 'nav-link')),
					),
					'itemCssClass' => 'nav-item',
				)); ?>
				<?php $this->widget('zii.widgets.CMenu',array(
					'htmlOptions' => array('class' => 'nav navbar-nav pull-xs-right', 'id' => 'rightmenu'),
					'items'=>array(
						array('label'=> Yii::t('itsc', 'Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'nav-link')),
						array('label'=> Yii::t('itsc', 'Dashboard'), 'url'=>array('/dashboard/index'), 'visible'=>!Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'nav-link')),
						array('label'=> Yii::t('itsc', 'Logout') . ' (' . Yii::app()->user->name . ')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'nav-link'))
					),
					'itemCssClass' => 'nav-item',
				)); ?>
				
		</div>
	</nav>
<div class="container" id="page">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'tagName' => 'ol',
			'htmlOptions' => array('class' => 'breadcrumb'),
			'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
			'inactiveLinkTemplate' => '<li class="active">{label}</li>',
			'separator' => '',
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<script src="//cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/masonry/4.1.0/masonry.pkgd.min.js"></script>

</body>
</html>
