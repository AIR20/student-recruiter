<?php

require 'config.php';

/**
 * Start native PHP session
 */
session_cache_limiter(false);
session_start();

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
