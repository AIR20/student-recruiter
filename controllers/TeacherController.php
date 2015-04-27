<?php

class TeacherController extends BaseController {

    # GET /teacher/register
    function register(){

        $this->app->render('teacher_register.php', $this->data);
    }

    # GET /teacher/class
    function viewClass() {
        $this->requireValidTeacher();
        $this->data['students'] = $this->user->getStudentList();
        $this->app->render('view_class.php', $this->data);
    }

    # GET /teacher/add_student
    function addStudent() {
        throw new Exception('Not implemented.');
    }

    # GET /teacher/edit_student/:id
    function editStudent() {
        throw new Exception('Not implemented.');
    }

    private function requireValidTeacher() {
        if (isset($this->user) && $this->user->isTeacher()) return;
        throw new Exception('Forbidden Area.');
    }

}
