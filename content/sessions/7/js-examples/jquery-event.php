<!doctype html>
<html>
<head>
	<title>JS Event</title>
</head>
<body>
	<div id='container' style='background:red; height:400px;'>
		<a id='change-bg' href='#'>Change My Color</a>
	</div>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script>
	$('#change-bg').on('click', function() {
		$('#container').css('background', 'green');
		return false;
	});
	</script>

</body>
</html>