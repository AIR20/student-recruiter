<?php

Class FeedbackController extends BaseController {

	// Change this to select events for drop down list
	function view() {
		$this->app->render('feedback_form.php', $this->data);
	}

	function faq(){
		$this->app->render('faq.php', $this->data);
	}
}
