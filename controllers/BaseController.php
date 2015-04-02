<?php
class BaseController
{
	protected $app;
	protected $data;
	public function __construct()
	{
		$this->app = \Slim\Slim::getInstance();
		$this->data = array();
		/** default title */
		$this->data['title'] = 'Student Recruiter System';
		/** meta tag and information */
		$this->data['meta'] = array();
		/** queued css files */
		$this->data['css'] = array();
		/** queued js files */
		$this->data['js'] = array();
		/** prepared message info */
		$this->data['message'] = array(
			'error'    => array(),
			'info'    => array(),
			'debug'    => array(),
		);
		/** base dir for asset file */
		$this->data['assetUrl'] = $this->baseUrl() . '/assets/';
		$this->data['app'] = $this->app;
		$this->loadBaseCss();
		$this->loadBaseJs();
	}
	/**
	 * enqueue css asset to be loaded
	 * @param  [string] $css     [css file to be loaded relative to base_asset_dir]
	 * @param  [array]  $options [location=internal|external, position=first|last|after:file|before:file]
	 */
	protected function loadCss($css, $options=array())
	{
		$location = (isset($options['location'])) ? $options['location']:'internal';
		//after:file, before:file, first, last
		$position = (isset($options['position'])) ? $options['position']:'last';
		if(!in_array($css,$this->data['css'])){
			if($position=='first' || $position=='last'){
				$key = $position;
				$file='';
			}else{
				list($key,$file) =  explode(':',$position);
			}
			switch($key){
				case 'first':
					array_unshift($this->data['css'],$css);
				break;
				case 'last':
					$this->data['css'][]=$css;
				break;
				case 'before':
				case 'after':
					$varkey = array_keys($this->data['css'],$file);
					if($varkey){
						$nextkey = ($key=='after') ? $varkey[0]+1 : $varkey[0];
						array_splice($this->data['css'],$nextkey,0,$css);
					}else{
						$this->data['css'][]=$css;
					}
				break;
			}
		}
	}
	/**
	 * enqueue js asset to be loaded
	 * @param  [string] $js      [js file to be loaded relative to base_asset_dir]
	 * @param  [array]  $options [location=internal|external, position=first|last|after:file|before:file]
	 */
	protected function loadJs($js, $options=array())
	{
		$location = (isset($options['location'])) ? $options['location']:'internal';
		//after:file, before:file, first, last
		$position = (isset($options['position'])) ? $options['position']:'last';
		if(!in_array($js,$this->data['js'])){
			if($position=='first' || $position=='last'){
				$key = $position;
				$file='';
			}else{
				list($key,$file) =  explode(':',$position);
			}
			switch($key){
				case 'first':
					array_unshift($this->data['js'],$js);
				break;
				case 'last':
					$this->data['js'][]=$js;
				break;
				case 'before':
				case 'after':
					$varkey = array_keys($this->data['js'],$file);
					if($varkey){
						$nextkey = ($key=='after') ? $varkey[0]+1 : $varkey[0];
						array_splice($this->data['js'],$nextkey,0,$js);
					}else{
						$this->data['js'][]=$js;
					}
				break;
			}
		}
	}
	/**
	 * clear enqueued css asset
	 */
	protected function resetCss()
	{
		$this->data['css']         = array(
			'internal'  => array(),
			'external'  => array()
		);
	}
	/**
	 * clear enqueued js asset
	 */
	protected function resetJs()
	{
		$this->data['js']         = array(
			'internal'  => array(),
			'external'  => array()
		);
	}
	/**
	 * remove individual css file from queue list
	 * @param  [string] $css [css file to be removed]
	 */
	protected function removeCss($css)
	{
		$key=array_keys($this->data['css']['internal'],$css);
		if($key){
			array_splice($this->data['css']['internal'],$key[0],1);
		}
		$key=array_keys($this->data['css']['external'],$css);
		if($key){
			array_splice($this->data['css']['external'],$key[0],1);
		}
	}
	/**
	 * remove individual js file from queue list
	 * @param  [string] $js [js file to be removed]
	 */
	protected function removeJs($js)
	{
		$key=array_keys($this->data['js']['internal'],$js);
		if($key){
			array_splice($this->data['js']['internal'],$key[0],1);
		}
		$key=array_keys($this->data['js']['external'],$js);
		if($key){
			array_splice($this->data['js']['external'],$key[0],1);
		}
	}
	/**
	 * addMessage to be viewd in the view file
	 */
	protected function message($message, $type='info')
	{
		$this->data['message'][$type] = $message;
	}
	/**
	 * add custom meta tags to the page
	 */
	protected function meta($name, $content)
	{
		$this->data['meta'][$name] = $content;
	}
	/**
	 * load base css for the template
	 */
	protected function loadBaseCss()
	{
		$this->loadCss("bootstrap.min.css");
		$this->loadCss("application.css");
	}
	/**
	 * load base js for the template
	 */
	protected function loadBaseJs()
	{
		$this->loadJs("jquery-1.11.2.min.js");
		$this->loadJs("bootstrap.min.js");
	}
	/**
	 * generate base URL
	 */
	protected function baseUrl()
	{
		$baseUrl = dirname($_SERVER['SCRIPT_NAME']);
		$baseUrl = rtrim($baseUrl, '/');
		return $baseUrl;
	}
}