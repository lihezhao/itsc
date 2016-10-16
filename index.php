<?php
// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii-master/framework/yii.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
require_once(__DIR__ . '/backend/helpers/CArray.php');
$config = CArray::merge(
	require(__DIR__ . '/common/config/main.php'),
	require(__DIR__ . '/protected/config/main.php')
);

Yii::createWebApplication($config)->run();
