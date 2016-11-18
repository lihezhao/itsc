<?php
return array(
	'mainmenu' => array(
		'htmlOptions' => array('class' => 'nav navbar-nav', 'id' => 'mainmenu'),
		'items'=>array(
			array('label' => Yii::t('app', 'Home'), 'url'=>array('/site/index'), 'linkOptions' => array('class' => 'nav-link')),
			array('label' => Yii::t('app', 'Gallery'), 'url' => array('/gallery/index'), 'linkOptions' => array('class' => 'nav-link')),
			array('label' => Yii::t('app', 'Blog'), 'url' => array('/post/index'), 'linkOptions' => array('class' => 'nav-link')),
			array('label' => Yii::t('app', 'About'), 'url'=>array('/site/page', 'view'=>'about'), 'linkOptions' => array('class' => 'nav-link')),
			array('label' => Yii::t('app', 'Contact'), 'url'=>array('/site/contact'), 'linkOptions' => array('class' => 'nav-link')),
		),
		'itemCssClass' => 'nav-item',
	),
	'accountmenu' => array(
		'htmlOptions' => array('class' => 'nav navbar-nav float-xs-right', 'id' => 'rightmenu'),
		'items'=>array(
			array('label'=> Yii::t('app', 'Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'nav-link')),
			array('label'=> Yii::t('app', 'Sign up'), 'url'=>array('/site/signup'), 'visible'=>Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'nav-link')),
			array('label'=> Yii::t('app', 'Dashboard'), 'url'=>'/admin.php', 'visible'=>!Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'nav-link')),
			array('label'=> Yii::t('app', 'Logout') . ' (' . Yii::app()->user->name . ')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'nav-link'))
		),
		'itemCssClass' => 'nav-item',
	),
);