<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
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
	<nav class="navbar navbar-fixed-top navbar-dark bg-faded" style="background-color: #5774c2;">
		<div class="container">
			<a class="navbar-brand" href="#">ITSC</a>
				<?php $this->widget('zii.widgets.CMenu',array(
					'htmlOptions' => array('class' => 'nav navbar-nav', 'id' => 'mainmenu'),
					'items'=>array(
						array('label'=>Yii::t('itsc', 'Home'), 'url'=>array('/site/index'), 'linkOptions' => array('class' => 'nav-link')),
						array('label'=>Yii::t('itsc', 'About'), 'url'=>array('/site/page', 'view'=>'about'), 'linkOptions' => array('class' => 'nav-link')),
						array('label'=>'Contact', 'url'=>array('/site/contact'), 'linkOptions' => array('class' => 'nav-link')),
					),
					'itemCssClass' => 'nav-item',
				)); ?>
				<?php $this->widget('zii.widgets.CMenu',array(
					'htmlOptions' => array('class' => 'nav navbar-nav pull-xs-right', 'id' => 'rightmenu'),
					'items'=>array(
						array('label'=> Yii::t('itsc', 'Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'nav-link')),
						array('label'=> Yii::t('itsc', 'Sign up'), 'url'=>array('/site/signup'), 'visible'=>Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'nav-link')),
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
			'links'=>Translator::translateArray($this->breadcrumbs),
			'tagName' => 'ol',
			'htmlOptions' => array('class' => 'breadcrumb'),
			'activeLinkTemplate' => '<li class="breadcrumb-item"><a href="{url}">{label}</a></li>',
			'inactiveLinkTemplate' => '<li class="breadcrumb-item active">{label}</li>',
			'separator' => '',
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>


</div>
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p>
				Copyright &copy; <?php echo date('Y'); ?> by ITSC.org.cn
				All Rights Reserved.
				<?php echo Yii::powered(); ?>
				</p>
			</div>
		</div>
	</div>
</footer>

<script src="//cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/masonry/4.1.0/masonry.pkgd.min.js"></script>

</body>
</html>
