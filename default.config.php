<?php

// Define paths

define('ROOT_PATH'  , __DIR__.'/');
define('VENDOR_PATH', __DIR__.'/vendor/');
define('CONTROLLER_PATH', __DIR__.'/controllers/');
define('MODEL_PATH', __DIR__.'/models/');
define('VIEW_PATH', __DIR__.'/views/');
define('TEST_PATH', __DIR__.'/test/');
// define('LOG_PATH', __DIR__.'/log/');

// Load Slim framework

require VENDOR_PATH.'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

// Load models

spl_autoload_register(function ($class) {
	$fileName = MODEL_PATH . $class . '.php';
	if (file_exists($fileName)) {
		require $fileName;
	}
});

// Load controllers

spl_autoload_register(function ($class) {
	$fileName = CONTROLLER_PATH . $class . '.php';
	if (file_exists($fileName)) {
		require $fileName;
	}
});

// Set slim configuration

$config['slim'] = array(
	// Application
	'mode'          => 'development',
	// Debugging
	'debug'         => true,
	// Logging
	'log.writer'    => null,
	'log.level'     => \Slim\Log::DEBUG,
	'log.enabled'   => true,
	//View
	'templates.path'=> ROOT_PATH.'views',
	// HTTP
	'http.version' => '1.1',
	// Routing
	'routes.case_sensitive' => true,
	// Cookies
	'cookies.encrypt' => false,
	'cookies.lifetime' => '30 minutes'
);

// Set database configuration

$config['db'] = array(
	// Hostname
	'hostname'		=> 'localhost',
	'username'		=> 'root',
	'password'		=> '',
	'database'		=> 'srs'
);

date_default_timezone_set('Europe/London');
