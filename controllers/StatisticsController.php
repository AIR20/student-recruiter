<?php

class StatisticsController extends BaseController {

	# GET /dashboard
	function dashboard()
	{
		$this->app->render('stats_dashboard.php', $this->data);
	}
}
