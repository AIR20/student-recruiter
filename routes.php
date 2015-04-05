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

$app->group(
	'/teacher',
	function () use($app){
		$app->get(
			'/register',
			'TeacherController:register'
		)->name('teacher_register');
	}
);

$app->group(
	'/admin',
	function () use($app){
		$app->get(
			'/create_staff',
			'AdminController:create_staff'
		)->name('create_staff');
	}
);

$app->group(
	'/staff',
	function () use($app){
		$app->get(
			'/create_event',
			'StaffController:create_event'
		)->name('create_event');
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
