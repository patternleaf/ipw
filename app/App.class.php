<?php
require_once('config.php');
require_once('inc/Router.class.php');
require_once('inc/Request.class.php');
require_once('routes.php');

class App {

	private $fragments = array();
	private $templates = array();
	private $headers = array();
	private $code = 200;
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
		
		$includes_ok = true;
		
		if ($response) {
			foreach ($response['includes'] as $include) {
				if (is_file($include)) {
					include($include);
				}
				else {
					$includes_ok = false;
				}
			}
			if ($includes_ok) {
				if (isset($response['templates'])) {
					$this->templates = $response['templates'];
				}
			}
			else {
				$response = router()->load404();
				foreach ($response['includes'] as $include) {
					include($include);
				}
			}
		}
		foreach ($this->templates as $template) {
			include($template);
		}
		if (isset($response['code'])) {
			$this->code = $response['code'];
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
		if (count($this->request->pathParts) > 0) {
			return $this->request->pathParts[count($this->request->pathParts) - 1];
		}
		return '';
	}
	
	function setTemplates($override) {
		$this->templates = $override;
	}
	
	function addHeader($header) {
		$this->headers[] = $header;
	}
	
	function sendHTTPHeaders() {
		$protocol = isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0';
		array_unshift($this->headers, $protocol . ' ' . $this->code . ' ' . $this->httpStatusText[$this->code]);
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
	
	function printCommon($name, $options) {
		extract($options);
		include __DIR__.'/../templates/common/'.$name.'.php';
	}
	
	function escapedFileContents($path) {
		$f = file_get_contents($path); 
		echo htmlentities($f);
	}
	
	
	private $httpStatusText = array(
		100 => "Continue", 
		101 => "Switching Protocols", 
		102 => "Processing", 
		200 => "OK", 
		201 => "Created", 
		202 => "Accepted", 
		203 => "Non-Authoritative Information", 
		204 => "No Content", 
		205 => "Reset Content", 
		206 => "Partial Content", 
		207 => "Multi-Status",
		300 => "Multiple Choices",
		301 => "Moved Permanently", 
		302 => "Found", 
		303 => "See Other", 
		304 => "Not Modified", 
		305 => "Use Proxy", 
		306 => "(Unused)", 
		307 => "Temporary Redirect", 
		308 => "Permanent Redirect", 
		400 => "Bad Request", 
		401 => "Unauthorized", 
		402 => "Payment Required", 
		403 => "Forbidden", 
		404 => "Not Found", 
		405 => "Method Not Allowed", 
		406 => "Not Acceptable", 
		407 => "Proxy Authentication Required", 
		408 => "Request Timeout", 
		409 => "Conflict", 
		410 => "Gone", 
		411 => "Length Required", 
		412 => "Precondition Failed", 
		413 => "Request Entity Too Large", 
		414 => "Request-URI Too Long", 
		415 => "Unsupported Media Type", 
		416 => "Requested Range Not Satisfiable", 
		417 => "Expectation Failed", 
		418 => "I'm a teapot", 
		419 => "Authentication Timeout", 
		420 => "Enhance Your Calm", 
		422 => "Unprocessable Entity", 
		423 => "Locked", 
		424 => "Failed Dependency", 
		424 => "Method Failure", 
		425 => "Unordered Collection", 
		426 => "Upgrade Required", 
		428 => "Precondition Required", 
		429 => "Too Many Requests", 
		431 => "Request Header Fields Too Large", 
		444 => "No Response", 
		449 => "Retry With", 
		450 => "Blocked by Windows Parental Controls", 
		451 => "Unavailable For Legal Reasons", 
		494 => "Request Header Too Large", 
		495 => "Cert Error", 
		496 => "No Cert", 
		497 => "HTTP to HTTPS", 
		499 => "Client Closed Request", 
		500 => "Internal Server Error", 
		501 => "Not Implemented", 
		502 => "Bad Gateway", 
		503 => "Service Unavailable", 
		504 => "Gateway Timeout", 
		505 => "HTTP Version Not Supported", 
		506 => "Variant Also Negotiates", 
		507 => "Insufficient Storage", 
		508 => "Loop Detected", 
		509 => "Bandwidth Limit Exceeded", 
		510 => "Not Extended", 
		511 => "Network Authentication Required", 
		598 => "Network read timeout error", 
		599 => "Network connect timeout error"
	);
}

$gApp = NULL;
function app() {
	global $gApp;
	if (is_null($gApp)) {
		$gApp = new App();
	}
	return $gApp;
}