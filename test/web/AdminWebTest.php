<?php

class AdminWebTest extends WebTestCase {
	public function testIndexPage()
	{
		$this->client->get('/');
		$this->assertEquals(200, $this->client->response->status());
	}
}