<!doctype html>
<html>
<head>
</head>
<body>
	<p>This content will be parsed right away.</p>
	<script type="text/javascript">
	var start = new Date().getTime();
	var step;
	while((step = new Date().getTime()) < start + 5000) {
		if ((step - start) % 1000 == 0) {
			document.write('<p style="color:gray">waiting ' + ((step - start) / 1000) + ' secs&hellip;</p>');
		}
	}
	</script>
	<p>This content won't be parsed until the JS has finished!</p>
</body>
</html>