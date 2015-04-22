<?php

Class StaffController extends BaseController {
  function create_event(){

    $this->app->render('create_event.php', $this->data);
  }
}
