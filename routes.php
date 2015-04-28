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

		$app->post(
			'',
			'TeacherController:store'
		)->name('teacher_store');

		$app->get(
			'/class',
			'TeacherController:viewClass'
		)->name('teacher_view_class');

		$app->get(
			'/add_student',
			'TeacherController:addStudent'
		)->name('teacher_add_student');

		$app->post(
			'/store_student',
			'TeacherController:storeStudent'
		)->name('teacher_store_student');

		$app->get(
			'/edit_student/:id',
			'TeacherController:editStudent'
		)->name('teacher_edit_student');
	}
);

$app->group(
	'/admin',
	function () use($app){
		$app->get(
			'/create_staff',
			'AdminController:create_staff'
		)->name('create_staff');

		$app->get(
			'/users',
			'AdminController:user_list'
		)->name('user_list');
		
		$app->get(
			'/add_building',
			'AdminController:add_building'
		)->name('add_building');
		
		$app->get(
			'/add_room',
			'AdminController:add_room'
		)->name('add_room');
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
		
		$app->get(
			'/unbook/:id',
			'EventController:unbook'
		)->name('unbook_event');
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
