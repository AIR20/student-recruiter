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

		$app->get(
			'/class',
			'TeacherController:viewClass'
		)->name('view_class');

		$app->get(
			'/add_student',
			'TeacherController:addStudent'
		)->name('add_student');

		$app->get(
			'/edit_student/:id',
			'TeacherController:editStudent'
		)->name('edit_student');
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
	'/event',
	function () use($app){
		$app->get(
			'/list',
			'EventController:index'
		)->name('list_event');

		$app->get(
			'/create',
			'EventController:create'
		)->name('create_event');

		$app->post(
			'',
			'EventController:store'
		)->name('event_store');

		$app->get(
			'/:id',
			'EventController:view'
		)->name('view_event');

		$app->get(
			'/book/:id',
			'EventController:book'
		)->name('book_event');
	}

);

$app->get(
	'/account',
	'AccountController:display'
)->name('account');

$app->get(
	'/map',
	'MapController:display'
)->name('map');

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
