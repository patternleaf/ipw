<?php
require_once('config.php');
require_once('inc/Router.class.php');
require_once('inc/Request.class.php');
require_once('routes.php');

class App {

	private $fragments = array();
	private $templates = array();
	private $headers = array();
	private $request = NULL;
	
	function __construct() {
		$this->request = Request::currentRequest();
	}
	
	function loadDefaults() {
		$this->templates = array(
			'templates/header.php', 
			'templates/footer.php', 
			'templates/default.php'
		);
		//$this->setFragment('HTMLPage', '<h1>No Content Defined.</h1>');
	}
	
	function loadContentForRequest() {
		$this->loadDefaults();
		
		$response = router()->load($this->request->path);
		
		if ($response) {
			foreach ($response['includes'] as $include) {
				error_log($include);
				include($include);
			}
			if (isset($response['templates'])) {
				$this->templates = $response['templates'];
			}
		}
		foreach ($this->templates as $template) {
			include($template);
		}
	}
	
	function renderFragment($key) {
		echo $this->getFragment($key);
	}
	
	function renderHTTPBody() {
		echo $this->getFragment('HTMLPage');
	}
	
	function renderHTMLHead() {
		echo '<title>'.$this->getFragment('HTMLTitle').'</title>';
		echo $this->getFragment('HTMLHeadAdditions');
	}
	
	function renderHTMLBody() {
		echo $this->getFragment('HTMLBodyHeader');
		echo $this->getFragment('HTMLBodyContent');
		echo $this->getFragment('HTMLBodyFooter');
	}

	function getCurrentPathSlug() {
		// foreach ($this->request->pathParts as $key => $value) {
		// 	error_log('pathparts: '.$key.' => '.$value);
		// }
		return $this->request->pathParts[count($this->request->pathParts) - 1];
	}
	
	function setTemplates($override) {
		$this->templates = $override;
	}
	
	function addHeader($header) {
		$this->headers[] = $header;
	}
	
	function sendHTTPHeaders() {
		foreach ($this->headers as $header) {
			//error_log('sending header '.$header);
			header($header);
		}
	}
	
	function setFragment($key, $value) {
		$this->fragments[$key] = $value;
	}
	
	function getFragment($key) {
		if (!empty($this->fragments[$key])) {
			return $this->fragments[$key];
		}
		//error_log('Warning: No fragment named '.$key);
		return '';
	}
	
	function appendTo($key, $value) {
		if (isset($this->fragments[$key])) {
			$this->fragments[$key] .= $value;
		}
		else {
			$this->fragments[$key] = $value;
		}
		
	}
	function getContentWD() {
		$result = '/content'.$this->request->path;
		if (strrpos($this->request->path, '/') !== strlen($this->request->path) - 1) {
			$result .= '/';
		}
		return $result;
	}
	function contentWD() {
		echo $this->getContentWD();
	}
	function getSessionWD($sessionNum) {
		return $this->getContentWD().'/sessions/'.$sessionNum.'/';
	}
	function sessionWD($sessionNum) {
		echo $this->getSessionWD($sessionNum);
	}
	
}

$gApp = NULL;
function app() {
	global $gApp;
	if (is_null($gApp)) {
		$gApp = new App();
	}
	return $gApp;
}