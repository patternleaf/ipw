<?php

$gConnection = mysqli_connect(
	'localhost',
	'username',
	'password',
	'my_database'
);

function guestbookWasSigned() {
	return array_key_exists('submit', $_POST);
}

function addEntryToGuestbook() {
	global $gConnection;

	$name = $_POST['name'];
	$title = $_POST['title'];
	$message = $_POST['message'];

	$safe_name = mysqli_real_escape_string($gConnection, $name);
	$safe_message = mysqli_real_escape_string($gConnection, $message);
	$safe_title = mysqli_real_escape_string($gConnection, $title);

	$query = 'insert into entries values ("'.$safe_name.'", "'.$safe_title.'", "'.$safe_message.'", NOW());';

	$queryResult = mysqli_query($gConnection, $query);

	error_log(mysqli_error($gConnection));
}

function printEntries() {
	global $gConnection;

	$query = 'select * from entries;';

	$queryResult = mysqli_query($gConnection, $query);

	if ($queryResult) {
		while ($message = mysqli_fetch_assoc($queryResult)) {
			echo '
				<li class="row">
					<div class="3u">
						<h3>'.$message['title'].'</h3>
						<div class="byline">'.$message['name'].'</div>
						<div class="dateline">'.$message['timestamp'].'</div>
					</div>
					<div class="9u">
						'.$message['message'].'
					</div>
				</li>
		'	;
		}
	}


}
