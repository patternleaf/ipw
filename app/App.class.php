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
		$this->loadDefaults();
	}
	
	function loadDefaults() {
		$this->templates = array(
			'templates/header', 
			'templates/footer', 
			'templates/default'
		);
		$this->setFragment('HTMLPage', '<h1>No Content Defined.</h1>');
	}
	
	function loadContentForRequest() {
		router()->load($this->request->path);
	}
	
	function renderFragment($key) {
		echo $this->getFragment($key);
	}
	
	function renderHTMLPage() {
		foreach ($this->templates as $fileName) {
			include ("$fileName.php");
		}
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
		return $this->request->pathParts[count($this->request->pathParts) - 1];
	}
	
	function setTemplates($override) {
		$this->templates = $override;
	}
	
	function addHeader($header) {
		$this->headers[] = $header;
	}
	
	function sendHeaders() {
		foreach ($this->headers as $header) {
			error_log('sending header '.$header);
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
	
	function contentWD() {
		echo '/content'.$this->request->path;
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