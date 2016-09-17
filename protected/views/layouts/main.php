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
			<?php $menus = require_once(Yii::app()->getBasePath() . '/config/menu.php') ?>
			<?php $this->widget('zii.widgets.CMenu', $menus['mainmenu']); ?>
			<?php $this->widget('zii.widgets.CMenu', $menus['accountmenu']); ?>	
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
