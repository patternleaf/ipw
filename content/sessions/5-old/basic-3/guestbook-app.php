<?php

// globals! ack!
$gValidationErrors = array();
$gErrors = array();
$gPrefilledForm = array();

/**
 * guestbookWasSigned
 * 
 * @return boolean
 */
function guestbookWasSigned() {
	return !empty($_POST);
}

/**
 * getSanitizedInput
 * 
 * @return assoc-array Associative array containing sanitzed input.
 */
function getSanitizedInput() {
	// sanitize input to prevent attacks.
	// this will html-encode certain characters so as to prevent
	// users from injecting a malicious <script> tag or bad formatting
	// into the guestbook.
	$sanitizedInput = array(
		'name' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS),
		'title' => filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS),
		'message' => filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS),
		'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS)
	);

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

function addEntryToGuestbook() {
	global $gValidationErrors, $gPrefilledForm;
	
	$sanitizedInput = getSanitizedInput();
	$gValidationErrors = getValidationErrors($sanitizedInput);
	$gPrefilledForm = $sanitizedInput;
	
	if (empty($gValidationErrors)) {
		$newMessage = array(
			'name' => $sanitizedInput['name'],
			'title' => $sanitizedInput['title'],
			'message' => $sanitizedInput['message'],
			'email' => $sanitizedInput['email'],
			'timestamp' => time()
		);
		
		$data = loadData();
		
		if (!is_null($data)) {
			$data[] = $newMessage;
			$result = file_put_contents('messages.json', json_encode($data));

			// note we must check explicitly for boolean false.
			if ($result === FALSE) {
				$errors[] = 'Could not write to data file!';
			}
			else {
				// reset the form
				$gPrefilledForm = array();
			}
		}
	}
}

function loadData() {
	global $gErrors;
	$result = NULL;
	$fileContents = file_get_contents('messages.json');
	// note we must check explicitly for boolean false.
	if ($fileContents !== FALSE) {
		if (strlen($fileContents) > 0) {
			$data = json_decode($fileContents);
			if (!is_null($data)) {
				$result = $data;
			}
			else {
				$gErrors[] = 'Could not decode data!';
			}
		}
		else {
			// in this case, the file is empty. 
			// json_decode will not know that we want an array.
			$result = array();
		}
	}
	else {
		$gErrors[] = 'Could not open data file for reading!';
	}
	return $result;
}

function printEntries() {
	
	$data = loadData();
	if ($data) {
		foreach ($data as $message) {
			echo '
				<li class="row">
					<div class="3u">
						<h3>'.$message->title.'</h3>
						<div class="byline">'.$message->name.'</div>
						<div class="dateline">'.date('l j F Y \a\t h:i A', $message->timestamp).'</div>
					</div>
					<div class="9u">
						'.$message->message.'
					</div>
				</li>
		'	;
		}
	}
}

function printErrors() {
	global $gErrors;
	if (count($gErrors)) {
		echo '<ul>';
		foreach ($gErrors as $error) {
			echo '<li class="error">'.$error.'</li>';
		}
		echo '</ul>';
	}
}

function printValidationErrors() {
	global $gValidationErrors;
	if (count($gValidationErrors)) {
		echo '<ul>';
		foreach ($gValidationErrors as $error) {
			echo '<li class="validation-error">'.$error.'</li>';
		}
		echo '</ul>';
	}
}