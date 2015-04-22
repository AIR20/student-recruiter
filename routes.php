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

		$app->post(
			'',
			'StudentController:store'
		)->name('student_store');
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

$app->group(
	'/event',
	function () use($app){
		$app->get(
			'/list',
			'EventController:index'
		)->name('list_event');
		
		$app->get(
			'/:id',
			'EventController:view'
		)->name('view_event');
	}
	
);

$app->get(
	'/accountDetails',
	'AccountController:display'
)->name('account');



$app->get(
	'/login',
	'SessionController:login'
)->name('login');

$app->get(
	'/logout',
	'SessionController:logout'
)->name('logout');

$app->post(
	'/authenticate',
	'SessionController:authenticate'
)->name('auth');
