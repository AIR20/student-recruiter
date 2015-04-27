<?php

class SessionController extends BaseController {

	# GET /login
	function login(){
		$this->app->render('login.php', $this->data);
	}

	# POST /authenticate
	function authenticate(){
		$app = $this->app;

		$email = $app->request->post('email');
		$password = $app->request->post('password');

		$uid = User::authenticate($email, $password);
		if ( $uid !== false) {
			$user = User::getUserById($uid);
			if($user->isAdmin())
				$_SESSION['user'] = Admin::getAdminById($uid);
			if($user->isStaff())
				$_SESSION['user'] = Staff::getStaffById($uid);
			if($user->isTeacher())
				$_SESSION['user'] = Teacher::getTeacherById($uid);
			if($user->isStudent())
				$_SESSION['user'] = Student::getStudentById($uid);

			$app->flash('info', 'Successfully logged in.');
			$app->redirect($app->urlFor('home'));
		} else {
			$app->flash('error', 'Wrong email and password combination.');
			
			$app->redirect($app->urlFor('login'));
		}
	}
	
	# POST /logout
	function logout(){
		// TODO: Logout
		unset($_SESSION['user']);
		$this->app->flash('error', 'You have successfully logged out!');
		$this->app->redirect($this->app->urlFor('home'));
		//throw new Exception('Not implemented.');
	}
}