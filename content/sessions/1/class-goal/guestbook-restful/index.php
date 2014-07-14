<?php
include('guestbook-app.php');

if (is_null(getPageRequest())) {
	header("HTTP/1.0 404 Not Found");
}

if (guestbookWasSigned()) {
	addEntryToGuestbook();
}
?>
<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="<?php echo URI_ROOT;?>css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php echo URI_ROOT;?>css/style-desktop.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php echo URI_ROOT;?>css/5grid/core.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php echo URI_ROOT;?>css/5grid/core-desktop.css" type="text/css" media="screen">
	<script type="text/javascript" charset="utf-8" src="<?php echo URI_ROOT;?>css/5grid/jquery.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php echo URI_ROOT;?>css/5grid/init.js?use=1000px"></script>
	<style type="text/css" media="screen">
		h3 {
			font-size:20px;
			color:#eee;
		}
		.byline, .dateline, .email {
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
		nav#pagination li a.active {
			color:#bbb;
			
		}
		.message {
			color:white;
			
		}
		.byline .name {
			color:yellow;
		}
		#features .email a {
			color:#55aa66;
			text-decoration:none;
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
<?php if (is_null(getPageRequest())) : ?>
	<div id="features-wrapper">
		<section id="features" class="5grid-layout 5grid">
			<h2>404!</h2>
			<p>
				We couldn't find what you are looking for. <a href="<?php echo URI_ROOT; ?>">Take me back!</a>
			</p>
		</section>
	</div>
<?php else : ?>
	<div id="features-wrapper">
		<section id="features" class="5grid-layout 5grid">
			<ul id="entries">
			</ul>
		</section>
		<nav id="pagination">
			<span>Page:</span>
			<ul>
				<?php printPaginationLinks(); ?>
			</ul>
		</nav>
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
	<script type="text/javascript">
		var gEntries = <?php printJSONEntries(); ?>;
		var gEntriesPerPage = 10;
		
		function loadPage(pageNum) {
			$('#entries').empty();
			var startEntry = gEntriesPerPage * pageNum;
			for (var i = startEntry; i < startEntry + gEntriesPerPage; i++) {
				if (i >= gEntries.length) {
					break;
				}
				$('#entries').append('\
					<li class="row">\
						<div class="3u">\
							<h3>' + gEntries[i].title + '</h3>\
							<div class="byline">From <span class="name">' + gEntries[i].name + '</span></div>\
							<div class="email">&lt;<a href="mailto:' + gEntries[i].email + '">' + gEntries[i].email + '</a>&gt;</div>\
							<div class="dateline">On ' + gEntries[i].date + '</div>\
						</div>\
						<div class="9u message">\
							' + gEntries[i].message + '\
						</div>\
					</li>\
				');
			}
		}
		
		$(document).ready(function() {
			loadPage(0);
		});
	</script>
<?php endif; // is_null(getPageRequest) ?>
</body>
</html>