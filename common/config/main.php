<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('common', __DIR__ . '/..');

return array(
	'import' => array(
		'system.cli.views.webapp.protected.controllers.SiteController',
		'system.cli.views.webapp.protected.models.ContactForm',
		'system.cli.views.webapp.protected.models.LoginForm',	
		'common.components.*',
		'common.controllers.*',
		'common.controllers.base.*',
		'common.models.*',
		'common.helpers.*',
		'blog.models.Post',
		'blog.controllers.PostController',
	),
	'components' => array(
		'db' => require(dirname(__FILE__) . '/database.php'),
		'cache' => array(
			'class' => 'system.caching.CFileCache',
		),
		'messages' => array(
			'class' => 'CPhpMessageSource',
			'basePath' => __DIR__ . '/../messages',
		),
		'clientScript' => array(
			'coreScriptPosition' => CClientScript::POS_END,
			'scriptMap' => array(
				'jquery.js' => '//cdn.bootcss.com/jquery/3.1.1/jquery.min.js',
				'jquery.min.js' => '//cdn.bootcss.com/jquery/3.1.1/jquery.min.js',
			),
			'packages' => array(
				'bootstrap' => array(
					'baseUrl' => '//cdn.bootcss.com/bootstrap/4.0.0-alpha.5',
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
				'lazyload' => array(
					'baseUrl' => '//cdn.bootcss.com/jquery_lazyload/1.9.7',
					'js' => array('jquery.lazyload.min.js'),
				),
				'masonry' => array(
					'baseUrl' => '//cdn.bootcss.com/masonry/4.1.0',
					'js' => array('masonry.pkgd.min.js'),
					'depends' => array('jquery'),
				),
				'photoswipe' => array(
					'baseUrl' => '//cdn.bootcss.com/photoswipe/4.1.1',
					'js' => array('photoswipe.min.js', 'photoswipe-ui-default.min.js',),
					'css' => array('photoswipe.min.css', 'default-skin/default-skin.min.css'),
				),
			),
		),		
	),
	'controllerMap' => array(
		'site' => array(
			'class' => 'HomeController',
		),
		'post' => array(
			'class' => 'PostExController',
		),			
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'imagePath' => str_replace('common', 'protected', __DIR__) . '/../../../images',
		'thumbPath' => str_replace('common', 'protected', __DIR__) . '/../../thumbs',
		'thumbUrl'	=> '/thumbs',
	),		
);