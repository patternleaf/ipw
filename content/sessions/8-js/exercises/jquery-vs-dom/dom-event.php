<!doctype html>
<html>
<head>
	<title>JS Event</title>
</head>
<body>
	<div id='container' style='background:red; height:400px;'>
		<a id='change-bg' href='#'>Change My Color</a>
	</div>

	<script>
		var link = document.getElementById('change-bg');
		link.addEventListener('click', function(event) {
			var container = document.getElementById('container');
			container.style.background = 'green';
		});
	</script>
</body>
</html>