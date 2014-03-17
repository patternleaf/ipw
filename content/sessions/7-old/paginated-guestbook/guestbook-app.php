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
 function addEntryToGuestbook() {
 	global $gRuntimeErrors, $gPrefilledFormData;

	// !!!!! modify me to accept an argument that is the entry to add to the 
	// guestbook. you can either then modify the callsite of this method 
	// in index.php to always pass $_POST, or have this method fall back to 
	// using $_POST if the passed array is empty.
	// (see also: default arguments in PHP: http://www.php.net/manual/en/functions.arguments.php#functions.arguments.default)
	$sanitizedData = sanitizeData($_POST);

	$gPrefilledFormData = $sanitizedData;

	// validate it
	// if anything is bad, don't write to data store
	// also, store validation errors that we run into
	global $gValidationErrors;
	$gValidationErrors = validateData($sanitizedData);
	
	if (empty($gValidationErrors)) {
		// load file in
		createDataStoreIfNeeded();
		
		$fileContents = file_get_contents('messages.json');
		
		if ($fileContents !== FALSE) {
			
			$entries = json_decode($fileContents);
			
			if (!is_null($entries) || empty($fileContents)) {
				$entries[] = array(
					'name' => $sanitizedData['name'],
					'title' => $sanitizedData['title'],
					'email' => $sanitizedData['email'],
					'message' => $sanitizedData['message'],
					'date' => date('F j, Y, g:i a')
				);
	
				file_put_contents('messages.json', json_encode($entries));
				$gPrefilledFormData = array(
					'name' => '',
					'title' => '',
					'email' => '',
					'message' => ''
				);
			}
			else {
				error_log('Error: json_decode failed: '.__FILE__.' line # '.__LINE__);
				$gRuntimeErrors[] = 'Could not post your message! Please try again.';
			}

		}
		else {
			error_log('Error: file_get_contents failed: '.__FILE__.' line # '.__LINE__);
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

function printJSONEntries() {
	// !!!!! implement me!
	// this function should jsut print raw JSON.
}

function createDataStoreIfNeeded() {
	if (!file_exists('messages.json')) {
		touch('messages.json');
	}
}