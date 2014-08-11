<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style-desktop.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/5grid/core.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/5grid/core-desktop.css" type="text/css" media="screen">
	<script type="text/javascript" charset="utf-8" src="css/5grid/jquery.js"></script>
	<script type="text/javascript" charset="utf-8" src="css/5grid/init.js?use=1000px"></script>
	<style type="text/css" media="screen">
		h3 {
			font-size:20px;
			color:#eee;
		}
		.byline, .dateline {
			font-size:15px;
			line-height:1.5em;
		}
	</style>
	<title>Guestbook</title>
</head>
<body>
	<div id="header-wrapper">
		<header id="header" class="5grid-layout 5grid">
			<div class="row">
				<div class="8u">
					<h1><a href="#">Guestbook</a></h1>
				</div>
			</div>
		</header>
	</div>
<?php

// this is the super-simple version of the guestbook. it stores the
// markup for the list of guestbook entries in a regular old file. 
// this is inefficient, and blurs the boundary between data and 
// presentation of that data. 
			
// ***************************** THIS IS NOT THE RIGHT WAY TO DO THIS. ***************************** //

// was there a form submission on this page load?
function guestbookWasSigned() {
	return array_key_exists('submit', $_POST);
}

function getSubmittedEntry() {
	// note that without sanitization, we are vulnerable to 
	// attacks. we're basically making this web page a 
	// publicly-modifiable page that anyone can alter as they wish. 
	// well, anyone who knows any javascript.
	return array(
		'title' => $_POST['title'],
		'name' => $_POST['name'],
		'message' => $_POST['message']
	);
}

function addEntryToGuestbook($entry) {
	$newEntry = '
		<li class="row">
			<div class="3u">
				<h3>'.$entry['title'].'</h3>
				<div class="byline">By '.$entry['name'].'</div>
				<div class="dateline">'.date('l j F Y \a\t h:i A').'</div>
			</div>
			<div class="9u">
				'.$entry['message'].'
			</div>
		</li>
	';
	// append it to messages.txt
	file_put_contents(
		'messages.txt',
		$newEntry,
		FILE_APPEND
	);
}

function listEntries() {
	// print messages.txt, whether there was a new submission or not.
	$messagesHTML = file_get_contents('messages.txt');
	echo $messagesHTML;
}
	
?>
	<div id="features-wrapper">
		<section id="features" class="5grid-layout 5grid">
			<ul>
<?php
	if (guestbookWasSigned()) {
		$entry = getSubmittedEntry();
		addEntryToGuestbook($entry);
	}
	
	listEntries();
?>
			</ul>
		</section>
	</div>
	<div id="content-wrapper">
		<section id="content" class="5grid-layout 5grid">
			<h2>Hi! Leave a note!</h2>
			<form method="post">
				<label class="row">
					<span class="3u">Name:</span>
					<input type="text" name="name" class="8u">
				</label>
				<label class="row">
					<span class="3u">Title:</span>
					<input type="text" name="title" class="8u">
				</label>
				<label class="row">
					<span class="3u">Message:</span>
					<textarea name="message" class="8u"></textarea>
				</label>
				<input type="submit" value="Say It!" class="button-big offset-9u">
			</form>
		</section>
	</div>
</body>
</html>