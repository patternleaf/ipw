<!doctype html>
<?php

include('guestbook-app.php');

$runtimeErrors = array();

if (guestbookWasSigned()) {
	$sanitizedData = sanitizeData($_POST);
	$validationErrors = validateData($sanitizedData);
	if (count($validationErrors) == 0) {
		try {
			addEntryToGuestbook($sanitizedData);
		}
		catch (Exception $exception) {
			$runtimeErrors[] = $exception->getMessage();
		}
	}
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
		.error {
			padding:.7em 1.6em;
			color:#777;
			border-radius:5px;
			margin-bottom:5px;
		}
		.error.validation {
			background:#ffff99;
		}
		.error.runtime {
			background:#ff9999;
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
			<?php 
				try {
					$entries = getEntries();
					echo '<ul>';
					foreach ($entries as $entry) {
						echo '
						<li class="row">
							<div class="3u">
								<h3>'.$entry['title'].'</h3>
								<div class="byline">'.$entry['name'].'</div>
								<div class="dateline">'.$entry['date'].'</div>
								<div class="email">'.$entry['email'].'</div>
							</div>
							<div class="9u">
								'.$entry['message'].'
							</div>
						</li>
						';
					}
					echo '</ul>';
				}
				catch (Exception $exception) {
					echo '
						<h2>Error!</h2>
						<ul>
							<li class="error runtime">'.$exception->getMessage().'</li>
						</ul>
					';
				}
			?>
		</section>
	</div>
	<div id="content-wrapper">
		<section id="content" class="5grid-layout 5grid">
			<h2>Hi! Leave a note!</h2>

			<?php 
					if (!empty($validationErrors)) {
						echo '<ul>';
						foreach (array_unique($validationErrors) as $key => $error) {
							echo '<li class="error validation">'.$error.'</li>';
						}
						echo '</ul>';
					}
					if (!empty($runtimeErrors)) {
						echo '<ul>';
						foreach ($runtimeErrors as $message) {
							echo '<li class="error runtime">'.$message.'</li>';
						}
						echo '</ul>';
					}
			?>
			
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
					<span class="3u">Email:</span>
					<input type="text" name="email" class="8u">
				</label>
				<label class="row">
					<span class="3u">Message:</span>
					<textarea name="message" class="8u"></textarea>
				</label>
				<input type="submit" name="submit" value="Say It!" class="button-big offset-9u">
			</form>
		</section>
	</div>
</body>
</html>