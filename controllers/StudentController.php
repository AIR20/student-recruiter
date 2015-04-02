<?php

Class StudentController extends BaseController {
	function register(){
		
		$this->app->render('student_register.php', $this->data);
	}
}