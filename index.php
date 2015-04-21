<?php

require 'config.php';

/**
 * Start native PHP session
 */
session_cache_limiter(false);
session_start();

/** 
 * Enable error display
 */
if ($config['slim']->debug == true) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

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
