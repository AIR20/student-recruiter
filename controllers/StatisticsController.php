<?php

class StatisticsController extends BaseController {

	# GET /dashboard
	function dashboard()
	{
		$this->loadJs('d3.min.js');	
		$this->app->render('stats_dashboard.php', $this->data);
	}
}
