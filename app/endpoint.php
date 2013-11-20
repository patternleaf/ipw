<?php

if (isset($_GET['action'])) {
	$action = $_GET['action'];
	switch ($action) {
		case 'eval':
		$sanitized = sanitizePHPInput($_GET['php']);
		ob_start();
		try {
			eval($sanitized);
		}
		catch (Exception $e) {
			error_log('Exception: '.$e);
		}
		echo ob_get_clean();
		break;
	}
}

// mild attempt at security. obviously this is very very bad.
function sanitizePHPInput($input) {
	// $s = Runkit_Sandbox(array(
	// 	'safe_mode' => true,
	// 	'open_basedir' => '/var/www/users/jdoe/',
	// 	'allow_url_fopen' => 'false',
	// 	'disable_functions' => 'exec,shell_exec,passthru,system',
	// 	'disable_classes' => 'myAppClass'
	// ));
	
	return '';
	
	$input = str_replace(array('exec', 'shell_exec', 'passthru', 'system', '`'), '', $input);
	return $input;
}