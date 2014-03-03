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
		.byline {
			font-size:16px;
		}
		.dateline {
			font-size:14px;
		}
		.byline, .dateline {
			line-height:1.5em;
		}
		.messages li .message {
			color:#fff;
		}
		
		.error {
			color:#b44;
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
			// this is the super-simple version of the guestbook. it stores the
			// markup for the list of guestbook entries in a regular old file. 
			// this is inefficient, and blurs the boundary between data and 
			// presentation of that data. 
			
			// ***************************** THIS IS NOT THE RIGHT WAY TO DO THIS. ***************************** //
			
			// here we check for post data. if there is no post data,
			// there was no submission—just a regular old page load.
			if (!empty($_POST)) {
				
				// make new entry as string using $_POST data
				// store it in a variable. 
				
				// note that without sanitization, we are vulnerable to 
				// attacks. we're basically making this web page a 
				// publicly-modifiable page that anyone can alter as they wish. 
				// well, anyone who knows any javascript.
				$title = $_POST['title'];
				$name = $_POST['name'];
				$message = $_POST['message'];

				// store the markup for a new entry in a variable.
				$newEntry = '
								<li class="row">
									<div class="3u">
										<h3>'.$title.'</h3>
										<div class="byline">By '.$name.'</div>
										<div class="dateline">'.date('l j F Y \a\t h:i A').'</div>
									</div>
									<div class="9u">
										'.$message.'
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

			// print messages.txt, whether there was a new submission or not.
			$messagesHTML = file_get_contents('messages.txt');
			echo $messagesHTML;

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
					<textarea name="message" class="8u">
					</textarea>
				</label>
				<input type="submit" value="Say It!" class="button-big offset-9u">
			</form>
		</section>
	</div>
</body>
</html>