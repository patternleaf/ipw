<?php

/** 
 * CONSTANTS
 **/
define('ENTRIES_PER_PAGE', 10);
define('ROOT_URL', 'http://intro-web-programming.dev/content/sessions/10/guestbook-ajax/');
define('GUESTBOOK_ROOT', '/content/sessions/10/guestbook-ajax/');

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

function mysql_fetchEntries($start, $limit) {
	global $gMysqlConnection;
	global $gRuntimeErrors;

	$currentMessages = array();
	$queryResult = mysqli_query($gMysqlConnection, 'SELECT * FROM entries LIMIT '.$limit.' OFFSET '.$start.';');
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

function printJSONEntries() {
//	$messages = mysql_fetchEntries();
	$nEntries = getNumEntries();
	$pageNum = getPageNum();
	$messages = mysql_fetchEntries($pageNum * ENTRIES_PER_PAGE, ENTRIES_PER_PAGE);

	
	// NOTE: assignment by reference rather than by copy.
	foreach ($messages as &$message) {
		$message['date'] = date('F j, Y, g:i a', strtotime($message['timestamp']));
	}
	echo json_encode($messages);
}

function printPaginationLinks() {
	$nEntries = getNumEntries();
	$nPages = $nEntries / ENTRIES_PER_PAGE;
	$currentPage = getPageNum();
	for ($i = 0; $i < $nPages; $i++) {
		echo '<li><a data-pagenum="'.$i.'" '.($currentPage == $i ? 'class="active"' : '').'href="'.ROOT_URL.'page/'.($i + 1).'">'.($i + 1).'</a></li>';
	}
}

/**
 * @return assoc-array of the format:
 *		requestURI	=> string
 *		pathParts	=> array of strings
 *		pageNum		=> requested page, zero-indexed
 *		json		=> boolean
 */
function getRequestInfo() {
	$result = array();
	$requestURI = rtrim($_SERVER['REQUEST_URI'], '/');
	$urlParts = parse_url($requestURI);
	$pathParts = explode('/', $urlParts['path']);

	$result['requestURI'] = $requestURI;
	$result['pathParts'] = $pathParts;
	$result['json'] = false;
	$result['pageNum'] = NULL;

	$rootURL = rtrim(ROOT_URL, '/');
	$guestbookRoot = rtrim(GUESTBOOK_ROOT, '/');
	
	$matches = array();
	$remainder = NULL;
	// check for request for home page
	if (preg_match('#^'.$requestURI.'$#', $guestbookRoot, $matches)) {
		$result['pageNum'] = 0;
	}
	// extract page number if any
	else if (preg_match('#^'.$guestbookRoot.'/page/([\d]+)(.*)$#', $requestURI, $matches)){
		$rawPageNum = $matches[1];
		if (is_numeric($rawPageNum) && $rawPageNum >= 0 && $rawPageNum < (getNumEntries() / ENTRIES_PER_PAGE)) {
			$result['pageNum'] = $rawPageNum;
			// assign anything after the pageNum to $remainder
			$remainder = $matches[2];
		}
	}
	// see if the remainder is a json request.
	if (preg_match('#^/json/?$#', $remainder, $matches)) {
		$result['json'] = true;
	}

	if (is_null($result['pageNum'])) {
		return NULL;
	}
	return $result;
}

function requestIsForJSON() {
	$request = getRequestInfo();
	return $request && $request['json'];
}

function getNumEntries() {
	global $gMysqlConnection;
	$queryResult = mysqli_query(
		$gMysqlConnection,
		'select count(*) from entries;'
	);
	if ($queryResult) {
		$row = mysqli_fetch_assoc($queryResult);
		return $row['count(*)'];
	}
	return -1;
}

function getPageNum() {
	$request = getRequestInfo();
	return $request ? $request['pageNum'] : NULL;
}
