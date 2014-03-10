<!doctype html>
<?php
include('guestbook-app.php');

if (guestbookWasSigned()) {
	addEntryToGuestbook();
}
?>
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
		.error, .validation-error {
			padding:2px 6px;
			font-family:Helvetica, serif;
			border-radius:3px;
			color:white;
			font-size:.8em;
			margin:2px 0;
		}
		.error {
			background:#ee6666;
		}
		.validation-error {
			background:#ee8800;
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
			<ul>
				<?php printEntries(); ?>
			</ul>
		</section>
	</div>
	<div id="content-wrapper">
		<section id="content" class="5grid-layout 5grid">
			<h2>Hi! Leave a note!</h2>
			<form method="post">
				<?php 
					printErrors();
					printValidationErrors();
				?>
					
				<label class="row">
					<span class="3u">Name:</span>
					<input type="text" name="name" class="8u" <?php if (isset($gPrefilledForm['name'])) { echo 'value="'.$gPrefilledForm['name'].'"'; }?>>
				</label>
				<label class="row">
					<span class="3u">Title:</span>
					<input type="text" name="title" class="8u" <?php if (isset($gPrefilledForm['title'])) { echo 'value="'.$gPrefilledForm['title'].'"'; }?>>
				</label>
				<label class="row">
					<span class="3u">Email:</span>
					<input type="text" name="email" class="8u" <?php if (isset($gPrefilledForm['email'])) { echo 'value="'.$gPrefilledForm['email'].'"'; }?>>
				</label>
				<label class="row">
					<span class="3u">Message:</span>
					<textarea name="message" class="8u"><?php if (isset($gPrefilledForm['message'])) { echo $gPrefilledForm['message']; }?></textarea>
				</label>
				<input type="submit" value="Say It!" class="button-big offset-9u">
			</form>
		</section>
	</div>
</body>
</html>