<?php

Class AdminController extends BaseController {
  function create_staff(){
	  $this->app->render('create_staff.php', $this->data);
	}

	function user_list(){
		$this->data['students'] = Student::getStudentList();
		$this->app->render('user_list.php', $this->data);
	}
	
	function add_building(){
		$this->app->render('building_register.php', $this->data);
	}
	
	function add_room(){
		$this->app->render('room_register.php', $this->data);
	}
}
