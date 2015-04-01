<?php

/**
 * Define the application routes
 */

// GET route
$app->get(
	'/',
	'HomeController:welcome'
)->name('home');
