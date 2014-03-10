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
		.byline, .location {
			font-size:16px;
		}
		.dateline {
			font-size:14px;
		}
		.byline, .dateline, .location {
			line-height:1.5em;
		}
		.messages li .message {
			color:#fff;
		}
		
		.error {
			color:#b44;
			margin:0;
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
	<div id="features-wrapper">
		<section id="features" class="5grid-layout 5grid">
			<ul class="messages">
<?php

	// include and include_once inserts the file into the stream of lines
	// being parsed by the php parser.
	require_once('datastore/interface.php');
	require_once('utilities.php');

	$currentMessages = datastore_fetchEntries();
	$validationErrors = array();

	if (newMessageSubmitted()) {

		$sanitizedInput = getSanitizedInput();
		$validationErrors = getValidationErrors($sanitizedInput);

		if (empty($validationErrors)) {
			$newMessae = array(
				'name' => $sanitizedInput['name'],
				'title' => $sanitizedInput['title'],
				'message' => $sanitizedInput['message'],
				'location' => $sanitizedInput['location'],
				'email' => $sanitizedInput['email'],
				'timestamp' => time()
			);
			$currentMessages = datastore_insertEntry($newMessage);
		}
	}

	foreach ($currentMessages as $message) {
		printMessage($message);
	}
?>
			</ul>
		</section>
	</div>
	<div id="content-wrapper">
		<section id="content" class="5grid-layout 5grid">
			<h2>Hi! Leave a note!</h2>
<?php

			$thereWereErrors = !empty($validationErrors);
			if ($thereWereErrors) {
				printValidationErrors($validationErrors);
			}
?>
			<form method="post">
				<label class="row">
					<span class="3u">Name:</span>
					
					<?php /* re-fill the user's data if they have to re-submit. note that we're using sanitized data here! */ ?>
					
					<input type="text" name="name" class="8u" <?php if ($thereWereErrors) { echo 'value="'.$sanitizedInput['name'].'"'; } ?>>
				</label>
				<label class="row">
					<span class="3u">Title:</span>
					<input type="text" name="title" class="8u" <?php if ($thereWereErrors) { echo 'value="'.$sanitizedInput['title'].'"'; } ?>>
				</label>
				<label class="row">
					<span class="3u">Location:</span>
					<input type="text" name="location" class="8u" <?php if ($thereWereErrors) { echo 'value="'.$sanitizedInput['location'].'"'; } ?>>
				</label>
				<label class="row">
					<span class="3u">Email:</span>
					<input type="text" name="email" class="8u" <?php if ($thereWereErrors) { echo 'value="'.$sanitizedInput['email'].'"'; } ?>>
				</label>
				<label class="row">
					<span class="3u">Message:</span>
					<textarea name="message" class="8u"><?php if ($thereWereErrors) { echo $sanitizedInput['message']; } ?></textarea>
				</label>
				<input type="submit" value="Say It!" class="button-big offset-9u">
			</form>
		</section>
	</div>
</body>
</html>