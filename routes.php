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

		$app->get(
			'/events',
			'StudentController:listEvents'
		)->name('student_event');
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
			'/events',
			'TeacherController:listEvents'
		)->name('teacher_event');
		
		$app->get(
			'/class',
			'TeacherController:viewClass'
		)->name('teacher_view_class');

		$app->get(
			'/add_student',
			'TeacherController:addStudent'
		)->name('teacher_add_student');

		$app->get(
			'/add_registered_student',
			'TeacherController:addRegisteredStudent'
		)->name('teacher_add_registered_student');

		$app->post(
			'/store_registered_student',
			'TeacherController:storeRegisteredStudent'
		)->name('teacher_store_registered_student');

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
	'/staff',
	function() use($app){
		$app->get(
			'/events',
			'StaffController:listEvents'
		)->name('staff_event');
	}
);

$app->group(
	'/admin',
	function () use($app){
		$app->get(
			'/users',
			'AdminController:user_list'
		)->name('user_list');

		$app->get(
			'/add_room',
			'AdminController:add_room'
		)->name('add_room');

		$app->post(
			'',
			'RoomController:store'
		)->name('room_store');
	}
);

$app->group(
	'/admin/create_staff',
	function () use($app){
		$app->get(
			'',
			'AdminController:create_staff'
		)->name('create_staff');

		$app->post(
			'',
			'StaffController:store'
		)->name('staff_store');
	}
);

$app->group(
	'/admin/add_department',
	function () use($app){
		$app->get(
			'',
			'AdminController:add_department'
		)->name('add_department');

		$app->post(
			'',
			'DepartmentController:store'
		)->name('department_store');
	}
);

$app->group(
	'/admin/add_building',
	function () use($app){
		$app->get(
			'',
			'AdminController:add_building'
		)->name('add_building');

		$app->post(
			'',
			'BuildingController:store'
		)->name('building_store');
	}
);

$app->group(
	'/admin/add_school',
	function () use($app){
		$app->get(
			'',
			'AdminController:add_school'
		)->name('add_school');

		$app->post(
			'',
			'SchoolController:store'
		)->name('school_store');
	}
);

$app->group(
	'/department/list',
	function () use($app){
		$app->get(
			'',
			'AdminController:department_list'
		)->name('department_list');
	}
);

$app->group(
	'/event',
	function () use($app){
		$app->get(
			'/list',
			'EventController:index'
		)->name('events_list');

		$app->get(
			'/create',
			'EventController:create'
		)->name('create_event');

		$app->get(
			'/search',
			'EventController:search'
		)->name('search_event');

		$app->post(
			'',
			'EventController:store'
		)->name('event_store');

		$app->get(
			'/pending',
			'EventController:pending'
		)->name('pending_events');

		$app->get(
			'/:id',
			'EventController:view'
		)->name('view_event');

		$app->get(
			'/:id/book',
			'EventController:book'
		)->name('book_event');

		$app->get(
			'/:id/unbook',
			'EventController:unbook'
		)->name('unbook_event');

		$app->get(
			'/:id/classbook',
			'EventController:classBook'
		)->name('classbook_event');

		$app->post(
			'/:id/classbook/',
			'EventController:storeClassBook'
		)->name('store_classbook_event');

		$app->get(
			'/:id/classunbook',
			'EventController:classunbook'
		)->name('classunbook_event');

		$app->get(
			'/:id/approve',
			'EventController:approve'
		)->name('approve_event');

		$app->post(
			'/:id/approve',
			'EventController:storeApproval'
		)->name('store_approve_event');

		$app->get(
			'/:id/reject',
			'EventController:reject'
		)->name('reject_event');

		$app->post(
			'/:id/reject',
			'EventController:storeRejection'
		)->name('store_reject_event');

		$app->get(
			'/:id/cancel',
			'EventController:cancel'
		)->name('cancel_event');

		$app->post(
			'/:id/cancel',
			'EventController:storeCancellation'
		)->name('store_cancel_event');

		$app->get(
			'/:id/move',
			'EventController:move'
		)->name('move_event');

		$app->post(
			'/:id/move',
			'EventController:storeMove'
		)->name('store_move_event');

		$app->get(
			'/:id/tweet',
			'EventController:tweet'
		)->name('tweet_event');
	}

);

		$app->get(
			'/statistics',
			'StatisticsController:dashboard'
		)->name('stats_dash');
		
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

$app->post(
	'/api/upload',
	'UploadController:upload'
)->name('upload');
