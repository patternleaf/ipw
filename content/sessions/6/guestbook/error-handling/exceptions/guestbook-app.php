<?php

/**
 * guestbookWasSigned
 * 
 * @return [boolean] True if there was a form submission.
 */
function guestbookWasSigned() {
	return array_key_exists('submit', $_POST);
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
	
	// Force-limit the size of each input string.
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
 * @return [array] A list of validation errors. The keys
 */
function validateData($data) {
	$errors = array();
	
	if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === FALSE) {
		$errors['email'] = 'Please put in a valid email address.';
	}
	foreach ($data as $key => $value) {
		if (strlen($data[$key]) == 0) {
			$errors[$key] = 'Please supply a '.$key.'.';
		}
	}
	return $errors;
}

/**
 * addEntryToGuestbook
 * 
 * Capture user input, sanitize it, validate it, and if everything checks out,
 * add a new entry to the guestbook data store.
 * 
 * @param [array] The entry, as an associative array.
 * @throws [Exception] If any part of the procedure fails.
 */
function addEntryToGuestbook($input) {

	createDataStoreIfNeeded();

	// Read in existing entries.
	$entries = getEntries();
	// Push a new entry onto the array.
	$entries[] = array(
		'name' => $input['name'],
		'title' => $input['title'],
		'email' => $input['email'],
		'message' => $input['message'],
		'date' => date('F j, Y, g:i a')
	);

	// Write new array back.
	$success = file_put_contents('messages.json', json_encode($entries));

	if ($success === FALSE) {
		error_log('Error: file_put_contents failed: '.__FILE__.' line # '.__LINE__);
		throw new Exception('Could not save your message! Please try again.');
	}
}

/**
 * getEntries
 *
 * @return [array] Current entries in the guestbook as a linear array of associative arrays.
 * @throws [Exception] If reading or decoding the entries fails.
 */
function getEntries() {
	$result = array();
	
	createDataStoreIfNeeded();
	
	$fileContents = file_get_contents('messages.json');

	if ($fileContents !== FALSE) {
		$result = json_decode($fileContents, true);
		if (is_null($result)) {
			error_log('Error: json_decode failed: '.__FILE__.' line # '.__LINE__);
			throw new Exception('Could not decode messages! Please try again.');
		}
	}
	else {
		error_log('Error: file_get_contents failed: '.__FILE__.' line # '.__LINE__);
		throw new Exception('Could not read messages file! Please try again.');
	}
	return $result;
}

/**
 * createDataStoreIfNeeded
 * 
 * Ensures the messages file exists. Clients generally need not call this.
 * 
 */
function createDataStoreIfNeeded() {
	if (!file_exists('messages.json')) {
		touch('messages.json');
	}
}