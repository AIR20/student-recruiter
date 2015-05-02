<?php

class TeacherController extends BaseController {

    # GET /teacher/register
	function register() {
        $this->data['schools'] = School::getSchoolList();
		$this->app->render('teacher_register.php', $this->data);
  }

	function store() {
		$app = $this->app;
		$params = $this->getParams();

		$teacher = new Teacher(true);
		$teacher->firstname = $params['fname'];
		$teacher->lastname = $params['lname'];
		$teacher->email = $params['email'];
		$teacher->hashed_password = $params['password'];
		$teacher->phone = $params['phone'];
		$teacher->dob = $this->convertDate($params['dob']);
		$teacher->gender = $params['gender'];
		$teacher->school_id = $params['school_id'];
		if ($teacher->save()) {
			$app->flash('info', 'Registration sucessful');
			$app->redirect($app->urlFor('home'));
		} else {
			$app->flash('warning', 'Registration unsuccessful');
			$app->redirect($app->urlFor('teacher_register'));
		}
	}

    # GET /teacher/class
    function viewClass() {
        $this->requireValidTeacher();
        $this->data['students'] = $this->user->getStudentList();
        $this->app->render('view_class.php', $this->data);
    }

    # GET /teacher/add_student
    function addStudent() {
        $this->app->render('teacher_create_student.php', $this->data);
    }

	# GET /teacher/add_student
    function addRegisteredStudent() {
		$this->data['students'] = Student::getStudentsFromSchool($this->user->school_id);
		$this->data['schoolID'] = Student::getSchool($this->user->id);
        $this->app->render('teacher_create_registered_student.php', $this->data);
    }

	# POST /teacher/new_student
    function storeRegisteredStudent() {
        $this->requireValidTeacher();
        $app = $this->app;
        $params = $this->getParams();

        //$student = new Student(true);
		$students = $params['list'];

		foreach($students as $student){
			$studentObj = Student::getStudentById($student);
			$studentObj->updateTeacher($this->user->id);
		}

		$app->redirect($app->urlFor('teacher_view_class'));
    }

    # POST /teacher/new_student
    function storeStudent() {
        $this->requireValidTeacher();
        $app = $this->app;
        $params = $this->getParams();

        $student = new Student(true);
        $student->firstname = $params['fname'];
        $student->lastname = $params['lname'];
        $student->email = $params['email'];

        // TODO: Should use hashed password
        $student->hashed_password = 'SEEMS LIKE PASSWORD IS REQUIRED FIELD';
        $student->gender = $params['gender'];

        // convert date format
        $student->dob = $this->convertDate($params['dob']);

        $student->address_line1 = $params['addr1'];
        $student->address_line2 = $params['addr2'];
        $student->address_line3 = $params['addr3'];
        $student->postcode = $params['postcode'];
        $student->teacher_id = $this->user->id;

        if ($student->save()) {
            $app->flash('info', 'Well done. Student is added successfully.');
            $app->redirect($app->urlFor('teacher_view_class'));
        } else {
            $app->flash('warning', 'The form cannot be submitted due to some errors.');
            $app->redirect($app->urlFor('teacher_add_student'));
        }
    }

    # GET /teacher/edit_student/:id
    function editStudent() {
        throw new Exception('Not implemented.');
    }

}
