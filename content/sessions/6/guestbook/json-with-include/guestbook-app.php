<?php

function guestbookWasSigned() {
	return array_key_exists('submit', $_POST);
}

function addEntryToGuestbook() {
	$name = $_POST['name'];
	$title = $_POST['title'];
	$message = $_POST['message'];
	
	// load file in
	$entries = json_decode(file_get_contents('messages.json'));
	
	$entries[] = array(
		'name' => $_POST['name'],
		'title' => $_POST['title'],
		'message' => $_POST['message'],
		'date' => date('F j, Y, g:i a')
	);
	
	file_put_contents('messages.json', json_encode($entries));
}

function printEntries() {
	
	$messageData = json_decode(file_get_contents('messages.json'));
	
	foreach ($messageData as $messageDatum) {
		echo '
			<li class="row">
				<div class="3u">
					<h3>'.$messageDatum->title.'</h3>
					<div class="byline">'.$messageDatum->name.'</div>
					<div class="dateline">'.$messageDatum->date.'</div>
				</div>
				<div class="9u">
					'.$messageDatum->message.'
				</div>
			</li>
	'	;
	}

}