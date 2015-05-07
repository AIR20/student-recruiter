<?php

Class FeedbackController extends BaseController {

	// Change this to select events for drop down list
	function giveFeedback($id)
	{
		$this->data['event'] = Event::getEventById($id);
		$this->app->render('feedback_form.php', $this->data);
	}

	function viewFeedback($id)
	{
		$this->data['event'] = Event::getEventById($id);
		$this->app->render('feedback_list.php', $this->data);
	}
	

	function faq(){
		$this->app->render('faq.php', $this->data);
	}

	function storeFeedback()
	{

		if($event->save()){
			$app->flash('info', 'Event rejected successfully');
			$app->redirect($app->urlFor('pending_events'));
		} else {
		  $app->flash('warning', 'There was a problem');
		  $app->redirect($app->urlFor('pending_events'));
		}
	}
}
