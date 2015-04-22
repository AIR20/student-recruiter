<?php

Class AdminController extends BaseController {
  function create_staff(){
  
  $this->app->render('create_staff.php', $this->data);
  }
}
