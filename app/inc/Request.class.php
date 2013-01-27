<?php
/**
 * Represents a request. Pulls out and makes easily accesible data that is
 * relevant for our app.
 */
class Request {
	var $method = 'get';

	var $path = '';
	var $pathParts = array();

	var $action = 'read';
	var $objectID = NULL;
	
	var $referrer = '';
	
	var $routeController = '';
	var $matchedRoute = '';
	var $routeRegExMatches = array();
	
	// contents of GET or POST data payload
	var $payload;

	/**
	 * Factory function that just uses $_SERVER as the basis for the
	 * request object.
	 */
	static function currentRequest() {
		return new Request($_SERVER);
	}
	
	// expects a $_SERVER-like associative array.
	function __construct($data) {

		$this->referrer = isset($data['HTTP_REFERER']) ? $data['HTTP_REFERER'] : BASE_URL;
		if (strpos($data['REQUEST_URI'], 'http') === false) {
			$this->path = $data['REQUEST_URI'];
		}
		else {
			$this->path = $this->pathFromUrl($data['REQUEST_URI']);
		}
		
		/*
		$routes = router()->get();
		foreach ($routes as $route => $controllerName) {
			$matches = array();
			if (preg_match($route, $this->path, $matches)) {
				$this->routeController = $controllerName;
				$this->matchedRoute = $route;
				$this->routeRegExMatches = $matches;
				break;
			}
		}
		*/
		$this->pathParts = explode('/', $this->path);
		
		// explode annoyingly will put empty elements at the beginning and end
		// if the path begins or ends with the delimiter. 
		// @see http://www.php.net/manual/en/function.explode.php#103416
		if (empty($this->pathParts[0])) {
			array_shift($this->pathParts);
		}
		if (empty($this->pathParts[count($this->pathParts) - 1])) {
			array_pop($this->pathParts);
		}

		$this->method = 'get';
		$this->payload = $_GET;

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->method = 'post';
			$this->payload = $_POST;
		}
		
		// take off query string, if any
		if (count($this->pathParts)) {
			$lastPathPart = $this->pathParts[count($this->pathParts) - 1];
			$queryPosition = strpos($lastPathPart, '?');
			if ($queryPosition !== false) {
				$this->pathParts[count($this->pathParts) - 1] = substr($lastPathPart, 0, $queryPosition);
			}
		}
		
		if (count($this->pathParts) > 1) {
			$lastComponent = $this->pathParts[count($this->pathParts) - 1];
			if (!is_numeric($lastComponent)) {
				$this->action = $lastComponent;
			}
			if (is_numeric($this->pathParts[1])) {
				$this->objectID = $this->pathParts[1];
				$this->objectName = $this->pathParts[0];
			}
		}
	}
	
	// because we can be hosted some path below the server root
	// we check against our config's BASE_URL to determine where our
	// app root starts.
	function pathFromUrl($url) {
		// remove multiple slasheses
		$base_url = BASE_URL;
		$url = preg_replace('/\/(\/+)/', '/', $url);
		if (strpos($_SERVER['HTTP_HOST'], 'http') === false) {
			$base_url = str_replace('http://', '', $base_url);
		}
		$rootPos = strpos($base_url, $_SERVER['HTTP_HOST']);
		$base = substr($base_url, $rootPos + strlen($_SERVER['HTTP_HOST']));
		$path = substr($url, strlen($base) - 1);
		return $path;
	}

}