<!DOCTYPE html>
<html>
<head>
	<title>Exercise 1</title>
	<?php if (date('a') == 'am') : ?>
		<link rel="stylesheet" href="light.css" type="text/css">
	<?php else : ?>
		<link rel="stylesheet" href="dark.css" type="text/css">
	<?php endif; ?>
</head>
<body>
	<p>
		Hello, world. It is <?php echo date('l, F j'); ?>.
	</p>
</body>
</html>