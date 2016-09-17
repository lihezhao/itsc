<?php
return array(
	'mainmenu' => array(
		'htmlOptions' => array('class' => 'nav navbar-nav', 'id' => 'mainmenu'),
		'items'=>array(
			array('label'=>Yii::t('itsc', 'Home'), 'url'=>array('/site/index'), 'linkOptions' => array('class' => 'nav-link')),
			array('label'=>Yii::t('itsc', 'About'), 'url'=>array('/site/page', 'view'=>'about'), 'linkOptions' => array('class' => 'nav-link')),
			array('label'=>'Contact', 'url'=>array('/site/contact'), 'linkOptions' => array('class' => 'nav-link')),
		),
		'itemCssClass' => 'nav-item',
	),
	'accountmenu' => array(
		'htmlOptions' => array('class' => 'nav navbar-nav pull-xs-right', 'id' => 'rightmenu'),
		'items'=>array(
			array('label'=> Yii::t('itsc', 'Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'nav-link')),
			array('label'=> Yii::t('itsc', 'Sign up'), 'url'=>array('/site/signup'), 'visible'=>Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'nav-link')),
			array('label'=> Yii::t('itsc', 'Dashboard'), 'url'=>array('/dashboard/index'), 'visible'=>!Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'nav-link')),
			array('label'=> Yii::t('itsc', 'Logout') . ' (' . Yii::app()->user->name . ')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'nav-link'))
		),
		'itemCssClass' => 'nav-item',
	),
);