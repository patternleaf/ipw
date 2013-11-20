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
		$result = array(
			'includes' => array()
		);
		
		foreach ($this->routes as $pattern => $response) {
			$matches = array();
			if (preg_match($pattern, $path, $matches)) {
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