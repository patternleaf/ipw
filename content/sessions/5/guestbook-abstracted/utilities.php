<?php
/**
 * utilities.php - Utility functions for our guestbook.
 * 
 */

function newMessageSubmitted() {
	return !empty($_POST);
}

function getSanitizedInput() {
	// sanitize input to prevent attacks.
	// this will html-encode certain characters so as to prevent
	// users from injecting a malicious <script> tag or bad formatting
	// into the guestbook.
	$sanitizedInput = array(
		'name' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS),
		'title' => filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS),
		'message' => filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS),
		'location' => filter_input(INPUT_POST, 'location', FILTER_SANITIZE_SPECIAL_CHARS),
		'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS)
	);

	// now sanitize for our current data store.
	$sanitizedInput = datastore_sanitizeForStore($sanitizedInput);

	return $sanitizedInput;
}

/**
 * getValidationErrors
 * 
 * @param assoc-array input An array of sanitized input.
 * @return array A linear array of validation error strings, if any.
 */
function getValidationErrors($input) {
	$errors = array();
	
	if (empty($input['name'])) {
		$errors[] = 'Please provide a name.';
	}
	if (empty($input['title'])) {
		$errors[] = 'Please provide a title.';
	}
	if (empty($input['message'])) {
		$errors[] = 'Please leave a message!';
	}
	// location is not required! we can use a check to fill it in
	// with our own placeholder, however.
	if (empty($input['location'])) {
		$input['location'] = 'Terra Incognita';
	}
	if (empty($input['email'])) {
		$errors[] = 'Please provide your email address.';
	}
	else {
		// and here, validate the format of the email address.
		// we put this in an else block to the empty check because
		// an empty email address would fail this test as well as the empty
		// test, resulting in two errors for the same thing, which is bad UX.
		if (filter_var($input['email'], FILTER_VALIDATE_EMAIL) === FALSE) {
			$errors[] = 'Please provide a valid email address!';
		}
	}
	return $errors;
}

function printMessage($message) {
	
	// obfuscate the email address for display
	$atLocation = strpos($message['email'], "@");
	$lastDotLocation = strrpos($message['email'], ".");
	$obfuscatedEmail = substr($message['email'], 0, $atLocation + 2)."&hellip;".substr($message['email'], $lastDotLocation - 1);

	echo '
		<li class="row">
			<div class="3u">
				<h3>'.$message['title'].'</h3>
				<div class="byline">By '.$message['name'].'&lt;'.$obfuscatedEmail.'&gt;</div>
				<div class="location">'.$message['location'].'</div>
				<div class="dateline">'.date('l j F Y \a\t h:i A', strtotime($message['timestamp'])).'</div>
			</div>
			<div class="message 9u">
				<p>'.$message['message'].'</p>
			</div>
		</li>
	';
	
}

function printValidationErrors($errors) {
	foreach ($errors as $error) {
		echo '<p class="error">'.$error.'</p>';
	}
}