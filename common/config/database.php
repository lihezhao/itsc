<?php

// This is the database connection configuration.
return array(
//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=itsc',
	//'connectionString' => 'mysql:host=oiiadmin.db.3309340.hostedresource.com;dbname=oiiadmin',
	'emulatePrepare' => true,
	'username' => 'itsc',
	//'username' => 'oiiadmin',
	'password' => 'lhzAAlfh0609',
	//'password' => 'lhzAAlfh0609@',
	'charset' => 'utf8',
	'tablePrefix' => 't_',
	'enableParamLogging' => true,
);