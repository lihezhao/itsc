<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('common', __DIR__ . '/..');

return array(
	'import' => array(
		'common.components.*',
		'common.controllers.*',
		'common.controllers.base.*',
		'common.models.*',
		'common.helpers.*',
	),
	'components' => array(
		'db' => require(dirname(__FILE__) . '/database.php'),
		'messages' => array(
			'class' => 'CPhpMessageSource',
			'basePath' => __DIR__ . '/../messages',
		),
		'clientScript' => array(
			'coreScriptPosition' => CClientScript::POS_END,
			'scriptMap' => array(
				'jquery.js' => '//cdn.bootcss.com/jquery/3.1.0/jquery.min.js',
			),
			'packages' => array(
				'bootstrap' => array(
					'baseUrl' => '//cdn.bootcss.com/bootstrap/4.0.0-alpha.3',
					'js' => array('js/bootstrap.min.js'),
					'css' => array('css/bootstrap.min.css'),
					'depends' => array('jquery'),
				),
				'jstree' => array(
					'baseUrl' => '//cdn.bootcss.com/jstree/3.3.2',
					'js' => array('jstree.min.js'),
					'css' => array('themes/default/style.min.css'),
					'depends' => array('jquery'),
				),
				'masonry' => array(
					'baseUrl' => '//cdn.bootcss.com/masonry/4.1.0',
					'js' => array('masonry.pkgd.min.js'),
					'depends' => array('jquery'),
				),
			),
		),		
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'imagePath' => str_replace('common', 'protected', __DIR__) . '/../files',
		'thumbPath' => str_replace('common', 'protected', __DIR__) . '/../../thumbs',
		'thumbUrl'	=> '/thumbs',
	),		
);