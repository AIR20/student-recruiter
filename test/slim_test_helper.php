<?php

class WebTestCase extends \PHPUnit_Framework_TestCase
{
	protected $app;
	protected $client;
	// Run for each unit test to setup our slim app environment
	public function setup()
	{
		// Establish a local reference to the Slim app object
		$this->app = $this->getSlimInstance();
		$this->client = new WebTestClient($this->app);
	}
	// Instantiate a Slim application for use in our testing environment. You
	// will most likely override this for your own application.
	public function getSlimInstance()
	{
		global $config;
		$config['slim']['debug'] = false;
		$config['slim']['mode'] = 'testing';
		$app = new \Slim\Slim($config['slim']);
		require ROOT_PATH.'routes.php';
		return $app;
	}
}

class WebTestClient
{
	public $app;
	public $request;
	public $response;
	// We support these methods for testing. These are available via
	// `this->get()` and `$this->post()`. This is accomplished with the
	// `__call()` magic method below.
	public $testingMethods = array('get', 'post', 'patch', 'put', 'delete', 'head');
	public function __construct(Slim\Slim $slim)
	{
		$this->app = $slim;
	}
	// Implement our `get`, `post`, and other http operations
	public function __call($method, $arguments)
	{
		if (in_array($method, $this->testingMethods)) {
			list($path, $data, $headers) = array_pad($arguments, 3, array());
			return $this->request($method, $path, $data, $headers);
		}
		throw new \BadMethodCallException(strtoupper($method) . ' is not supported');
	}
	// Abstract way to make a request to SlimPHP, this allows us to mock the
	// slim environment
	private function request($method, $path, $data = array(), $optionalHeaders = array())
	{
		// Capture STDOUT
		ob_start();
		$options = array(
			'REQUEST_METHOD' => strtoupper($method),
			'PATH_INFO'      => $path,
			'SERVER_NAME'    => 'local.dev'
		);
		if ($method === 'get') {
			$options['QUERY_STRING'] = http_build_query($data);
		} elseif (is_array($data)) {
			$options['slim.input']   = http_build_query($data);
		} else {
			$options['slim.input']   = $data;
		}
		// Prepare a mock environment
		\Slim\Environment::mock(array_merge($options, $optionalHeaders));
		// Establish some useful references to the slim app properties
		$this->request  = $this->app->request();
		$this->response = $this->app->response();
		// Execute our app
		$this->app->run();
		// Return the application output. Also available in `response->body()`
		return ob_get_clean();
	}
}