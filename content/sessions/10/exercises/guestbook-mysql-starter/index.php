<!doctype html>
<?php
include('guestbook-app.php');

if (guestbookWasSigned()) {
	addEntryToGuestbook($_POST);
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
		.validation-error, .error {
			padding:2px 4px;
			background:#ffff99;
			color:white;
			border-radius:5px;
			margin-bottom:5px;
		}
		.error {
			background:#ff9999;
		}
		nav#pagination {
			width:50%;
			margin:0 auto;
			overflow:hidden;
		}
		nav#pagination span {
			color:white;
		}
		nav#pagination li {
			float:left;
			margin-right:10px;
			color:white;
		}
		nav#pagination li a {
			color:orange;
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
			<ul id="entries">
				<?php printEntries(); ?>
			</ul>
		</section>
	</div>
	<div id="content-wrapper">
		<section id="content" class="5grid-layout 5grid">
			<h2>Hi! Leave a note!</h2>

			<?php printErrors(); ?>
			
			<form method="post">
				<label class="row">
					<span class="3u">Name:</span>
					<input type="text" name="name" class="8u" value="<?php echo $gPrefilledFormData['name']; ?>">
				</label>
				<label class="row">
					<span class="3u">Title:</span>
					<input type="text" name="title" class="8u" value="<?php echo $gPrefilledFormData['title']; ?>">
				</label>
				<label class="row">
					<span class="3u">Email:</span>
					<input type="text" name="email" class="8u" value="<?php echo $gPrefilledFormData['email']; ?>">
				</label>
				<label class="row">
					<span class="3u">Message:</span>
					<textarea name="message" class="8u"><?php echo $gPrefilledFormData['message']; ?></textarea>
				</label>
				<input type="submit" value="Say It!" class="button-big offset-9u">
			</form>
		</section>
	</div>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

</body>
</html>