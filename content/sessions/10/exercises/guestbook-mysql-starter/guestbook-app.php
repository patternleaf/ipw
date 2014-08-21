<?php

/**
 * gValidationErrors
 * 
 * This is a global array which (in this version) will contain the names of
 * submitted form fields in which we encountered a validation error. If the 
 * array is empty, there were no validation errors.
 */
$gValidationErrors = array();
$gRuntimeErrors = array();
$gPrefilledFormData = array(
	'name' => '',
	'title' => '',
	'email' => '',
	'message' => ''
);

$gMysqlConnection = mysqli_connect('localhost', 'username', 'password', 'guestbook');
if (!$gMysqlConnection) {
	$gRuntimeErrors[] = 'Could not connect to database: '.mysqli_error($gMysqlConnection);
}

// create our table if it doesn't exist.
// this is a very simple version, with no ids, no primary key.
$queryResult = mysqli_query($gMysqlConnection, '
	CREATE TABLE IF NOT EXISTS entries (
		`name` VARCHAR(255),
		`title` VARCHAR(255),
		`email` VARCHAR(255),
		`timestamp` DATETIME,
		`message` TEXT
	);
');

if (!$queryResult) {
	$gRuntimeErrors[] = 'Could not create database table! '.mysqli_error($gMysqlConnection);
}

/**
 * 
 */
function mysql_insertEntry($data) {
	global $gMysqlConnection;
	global $gRuntimeErrors;
	
	// convert unix timestamp to mysql-formatted timestamp.
	$data['timestamp'] = date('Y-m-d H:i:s', time());
	
	$query = 'INSERT INTO entries VALUES (
		"'.$data['name'].'",
		"'.$data['title'].'",
		"'.$data['email'].'",
		"'.$data['timestamp'].'",
		"'.$data['message'].'"
	);';
	$queryResult = mysqli_query($gMysqlConnection, $query);
	
	if (!$queryResult) {
		$gRuntimeErrors[] = 'Could not insert new entry! '.mysqli_error($gMysqlConnection);
	}
}

function mysql_fetchEntries() {
	global $gMysqlConnection;
	global $gRuntimeErrors;

	$currentMessages = array();
	$queryResult = mysqli_query($gMysqlConnection, 'SELECT * FROM entries;');
	if ($queryResult) {
		while($row = mysqli_fetch_assoc($queryResult)) {
			$currentMessages[] = $row;
		}
	}
	else {
		$gRuntimeErrors[] = 'Could not query entries! '.mysqli_error($gMysqlConnection);
	}
	return $currentMessages;
}

/**
 * guestbookWasSigned
 * 
 * @return [boolean] True if there was a form submission.
 */
function guestbookWasSigned() {
	return !empty($_POST);
}

/**
 * sanitizeData
 * 
 * Make user-supplied input safe for storage and display.
 *
 * @param [array] $data The data to sanitize.
 * @return [array] Sanitized input
 */
function sanitizeData($data) {
	global $gMysqlConnection;
	$name = $data['name'];
	$title = $data['title'];
	$email = $data['email'];
	$message = $data['message'];
	
	// sanitize data
	$sanitizedData = array(
		'name' => filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS),
		'title' => filter_var($title, FILTER_SANITIZE_SPECIAL_CHARS),
		'email' => filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS),
		'message' => filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS)
	);
	
	foreach ($sanitizedData as $key => $value) {
		$sanitizedData[$key] = substr($sanitizedData[$key], 0, 500);
		$sanitizedData[$key] = mysqli_real_escape_string($gMysqlConnection, $sanitizedData[$key]);
	}
	
	return $sanitizedData;
}

/**
 * validateData
 * 
 * Validate user-supplied input. Requirements: every field is non-empty
 * and the supplied email address is valid.
 * 
 * @param [array] $data The data to validate
 * @return [array] A list of validation errors.
 */
function validateData($data) {
	$errors = array();
	
	if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === FALSE) {
		$errors[] = 'email';
	}
	foreach ($data as $key => $value) {
		if (strlen($data[$key]) == 0) {
			$errors[] = $key;
		}
	}
	return $errors;
}

/**
 * addEntryToGuestbook
 * 
 * Capture user input, sanitize it, validate it, and if everything checks out,
 * add a new entry to the guestbook data store.
 */
function addEntryToGuestbook($data = array()) {
	global $gRuntimeErrors, $gPrefilledFormData;
	
	if (empty($data) && !empty($_POST)) {
		$data = $_POST;
	}
	$sanitizedData = sanitizeData($data);

	$gPrefilledFormData = $sanitizedData;

	// validate it
	// if anything is bad, don't write to data store
	// also, store validation errors that we run into
	global $gValidationErrors;
	$gValidationErrors = validateData($sanitizedData);
	
	if (empty($gValidationErrors)) {
		
		mysql_insertEntry($sanitizedData);
		$gPrefilledFormData = array(
			'name' => '',
			'title' => '',
			'email' => '',
			'message' => ''
		);
	}
}

function printEntries() {

}

/**
 * printErrors
 * 
 * Print any validation errors captured during guestbook entry submission.
 */
function printErrors() {
	global $gValidationErrors, $gRuntimeErrors;
	if (!empty($gValidationErrors)) {
		echo '<ul>';
		foreach (array_unique($gValidationErrors) as $key) {
			echo '<li class="error">Please enter a valid '.$key.'.</li>';
		}
		echo '</ul>';
	}
	if (!empty($gRuntimeErrors)) {
		echo '<ul>';
		foreach ($gRuntimeErrors as $key) {
			echo '<li class="error">'.$key.'.</li>';
		}
		echo '</ul>';
	}
}

