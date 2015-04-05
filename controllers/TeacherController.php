<?php

Class TeacherController extends BaseController {
  function register(){
  
    $this->app->render('teacher_register.php', $this->data);
  }
}
