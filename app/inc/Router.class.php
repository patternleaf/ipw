<?php

class Router {
	
	private $routes;
	private $fourOhFour;
	
	function __construct() {
		$this->routes = array();
	}
	
	function set($key, $value = NULL) {
		if (is_array($key)) {
			foreach ($key as $k => $v) {
				$this->routes[$k] = $v;
				if (isset($v['code']) && $v['code'] == 404) {
					$this->fourOhFour = $v;
				}
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
	
	function load404() {
		$result = array(
			'includes' => array(),
			'code' => 404
		);
		if ($this->fourOhFour) {
			$result['includes'][] = $this->fourOhFour['includes'];
		}
		return $result;
	}

	function load($path) {
		$result = array(
			'includes' => array()
		);
		
		// discard multiple slashes
		$path = preg_replace('/(\/+)/', '/', $path);
		
		foreach ($this->routes as $pattern => $response) {
			$matches = array();
			if (preg_match($pattern, $path, $matches)) {
				// $i = 0;
				// foreach ($matches as $m) {
				// 	error_log('match '.$i++.': '.$m);
				// }
				$files = $response['includes'];
				if (is_string($files)) {
					$files = explode(' ', $files);
				}
				foreach ($files as $file) {
					if (count($matches) > 1) {
						for ($i = 0; $i < count($matches); $i++) {
							$file = str_replace('$'.$i, $matches[$i], $file);
						}
					}
					// if (is_dir(getcwd().'/'.$file) && file_exists(getcwd().'/'.$file.'/index.php')) {
					// 	$file .= '/index.php';
					// }
					$result['includes'][] = $file;
				}
				if (isset($response['templates'])) {
					$result['templates'] = $response['templates'];
				}
				return $result;
			}
		}
		return false;
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