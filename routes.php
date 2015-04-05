<?php

/**
 * Define the application routes
 */

// GET route
$app->get(
	'/',
	'HomeController:welcome'
)->name('home');

$app->group(
	'/student',
	function () use($app){
		$app->get(
			'/register',
			'StudentController:register'
		)->name('student_register');
	}
);

$app->get(
	'/login',
	'SessionController:login'
)->name('login');

$app->post(
	'/logout',
	'SessionController:logout'
)->name('logout');

$app->post(
	'/authenticate',
	'SessionController:authenticate'
)->name('auth');
