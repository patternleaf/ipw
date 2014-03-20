<!doctype html>
<html>
<head>
	<title>Accordion on load jQuery example</title>
	<style type="text/css" media="screen">
	body {
		font-family:Helvetica, sans-serif;
	}
	#accordion {
		width:400px;
	}
	#accordion li {
		background:#777;
		border-radius:5px;
		padding:4px 8px;
		color:white;
	}
	#accordion li.hidden {
		display:none;
	}
	</style>
</head>
<body>
	<ul id="accordion">
		<li>Item One</li>
		<li>Item Two</li>
		<li>Item Three</li>
		<li class="visible-on-load">Item Four</li>
		<li>Item Four</li>
	</ul>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script type="text/javascript">
	jQuery('#accordion li')
		.addClass('hidden')
		.filter('.visible-on-load')
			.removeClass('hidden')
	;
	</script>
</body>
</html>
