<?php

require 'config.php';

/** 
 * Enable error display
 */
if ($config['slim']['debug'] == true) {
    // error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

/**
 * Start native PHP session
 */
//session_cache_limiter(false);
session_start();
ini_set('display_errors', 'On');
/**
 * Instantiate a Slim application
 */
$app = new \Slim\Slim($config['slim']);

/**
 * Load routes
 */
require ROOT_PATH.'routes.php';

/**
 * Run the Slim application
 */
$app->run();
