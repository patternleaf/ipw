<?php

class Router {
	
	private $routes;
	
	function __construct() {
		$routes = array();
	}
	
	function set($key, $value = NULL) {
		if (is_array($key)) {
			foreach ($key as $k => $v) {
				$this->routes[$k] = $v;
			}
		}
		else {
			$this->routes[$key] = $value;
		}
	}
	
	function get($key = NULL) {
		if ($key) {
			return $this->routes[$key];
		}
		return $this->routes;
	}

	function load($path) {
		foreach ($this->routes as $pattern => $files) {
			$matches = array();
			if (preg_match($pattern, $path, $matches)) {
				if (is_string($files)) {
					$files = explode(' ', $files);
				}
				foreach ($files as $file) {
					if (count($matches) > 1) {
						for ($i = 0; $i < count($matches); $i++) {
							$file = str_replace('$'.$i, $matches[$i], $file);
						}
					}
					include($file);
				}
				break;
			}
		}
	}

}

$gRouter = NULL;
function router() {
	global $gRouter;
	if (!$gRouter) {
		$gRouter = new Router;
	}
	return $gRouter;
}