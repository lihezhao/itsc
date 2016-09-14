<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('blog', Yii::getFrameworkPath() . '/../demos/blog/protected');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name' => 'ITSC',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.helpers.*',
		'application.controllers.base.*',
		'blog.components.UserIdentity',
		'blog.models.User',
		'blog.models.Tag',
		'blog.models.Lookup',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'lhzaalfh',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
			
/*		'image' => array(
			'class' => 'application.extensions.image.CImageComponent',
			'driver' => 'GD',
		),*/
		'clientScript' => array(
			'coreScriptPosition' => CClientScript::POS_END,
			'scriptMap' => array(
					'jquery.js' => false,
			),
			'packages' => array(
				'jstree' => array(
					'baseUrl' => '//cdn.bootcss.com/jstree/3.3.2',
					'js' => array('jstree.min.js'),
					'css' => array('themes/default/style.min.css'),
				),
			),
		),
	),
		
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'imagePath' => __DIR__ . '/../files',
		'thumbPath' => __DIR__ . '/../../thumbs',
		'thumbUrl'	=> 'thumbs',
	),
);
