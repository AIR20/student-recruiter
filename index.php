<?php

require 'config.php';

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
