<?php

/**
 * Constants
 */
define('ENTRIES_PER_PAGE', 10);

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

/**
 * Make a global connection to the mysql database.
 */
$gMysqlConnection = mysqli_connect(
	'localhost',
	'username',		// replace with your own MySQL username
	'password',		// replace with your own MySQL password
	'test_database'
);

if (!$gMysqlConnection) {
	$gRuntimeErrors[] = 'Could not connect to the database! '.mysqli_error($gMysqlConnection);
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
	
	// !!!! Now that we're using MySQL we need to additionally sanitize untrusted
	// input to prevent MySQL injection attacks.
	// @see http://php.net/mysqli_real_escape_string
	
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
function addEntryToGuestbook($newEntry) {
	global $gRuntimeErrors, $gPrefilledFormData;
	global $gMysqlConnection;

	$sanitizedData = sanitizeData($newEntry);

	$gPrefilledFormData = $sanitizedData;

	// validate it
	// if anything is bad, don't write to data store
	// also, store validation errors that we run into
	global $gValidationErrors;
	$gValidationErrors = validateData($sanitizedData);

	if (empty($gValidationErrors)) {

		$query = 'insert into entries values(
			"'.$sanitizedData['name'].'",
			"'.$sanitizedData['title'].'",
			"'.$sanitizedData['message'].'",
			"'.date('Y-m-d H:i:s').'",
			"'.$sanitizedData['email'].'"
		)';
		
		$queryResult = mysqli_query($gMysqlConnection, $query);
		
		if ($queryResult !== FALSE) {
			$gPrefilledFormData = array(
				'name' => '',
				'title' => '',
				'email' => '',
				'message' => ''
			);
		}
		else {
			error_log('Error: insert failed: '.__FILE__.' line # '.__LINE__.': '.mysqli_error($gMysqlConnection));
			$gRuntimeErrors[] = 'Could not post your message! Please try again.';
		}
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

/**
 * printEntries
 *
 * Print the current guestbook entries. Note that this function, as it is,
 * must be called from within a <ul>.
 */
function printEntries() {
	
	createDataStoreIfNeeded();
	
	$messageData = json_decode(file_get_contents('messages.json'));
	
	foreach ($messageData as $messageDatum) {
		echo '
			<li class="row">
				<div class="3u">
					<h3>'.$messageDatum->title.'</h3>
					<div class="byline">'.$messageDatum->name.'</div>
					<div class="dateline">'.$messageDatum->date.'</div>
					<div class="email">'.$messageDatum->email.'</div>
				</div>
				<div class="9u">
					'.$messageDatum->message.'
				</div>
			</li>
	'	;
	}
}

function getNumEntries() {
	global $gMysqlConnection;
	$query = 'select count(*) from entries;';
	$queryResult = mysqli_query($gMysqlConnection, $query);
	
	if ($queryResult !== FALSE) {
		$row = mysqli_fetch_assoc($queryResult);
		return $row['count(*)'];
	}
}

function getRequestedPageNum() {
	$requestURI = rtrim($_SERVER['REQUEST_URI'], '/');
	$rootURL = rtrim(ROOT_URL, '/');
	if ($requestURI == rtrim(GUESTBOOK_ROOT, '/')) {
		return 0;
	}

	$urlParts = parse_url($requestURI);
	$pathParts = explode('/', $urlParts['path']);
	
	$pageNum = array_pop($pathParts);
	if (is_numeric($pageNum) && $pageNum > 0 && $pageNum < (getNumEntries() / ENTRIES_PER_PAGE)) {
		if (array_pop($pathParts) == 'page') {
			return $pageNum - 1;	// internally index pages against zero
		}
	}
	return null;
}

function printJSONEntries() {
	global $gRuntimeErrors;
	global $gMysqlConnection;
	
	
	// figure out what page needs to be displayed
	// query for only that page's worth of entries.
	
	$startEntry = getRequestedPageNum() * ENTRIES_PER_PAGE;
	$query = 'select * from entries limit '.ENTRIES_PER_PAGE.' offset '.$startEntry.' order by timestamp';
	
	$queryResult = mysqli_query($gMysqlConnection, $query);
	
	if ($queryResult !== FALSE) {
		$result = array();
		while ($row = mysqli_fetch_assoc($queryResult)) {
			$row['timestamp'] = date('F j, Y, g:i a', strtotime($row['timestamp']));
			$result[] = $row;
		}
		echo json_encode($result);
	}
	else {
		error_log('Error: mysqli_query failed: '.__FILE__.' line # '.__LINE__.': '.mysqli_error($gMysqlConnection));
		$gRuntimeErrors[] = 'Could not read messages! Please try again.';
		echo '[]';
	}
}

function createDataStoreIfNeeded() {
	if (!file_exists('messages.json')) {
		touch('messages.json');
	}
}