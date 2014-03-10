<!DOCTYPE html>
<html>
<head>
	<title>Exercise 1</title>
</head>
<body>
	<form method="get">
		<label>
			<span>How many images would you like to make?</span>
			<input type="text" name="number-of-pickles"><br>
		</label>
		<label>
			<span>What image would you like to show?</span>
			<input type="text" name="number-of-pickles">
		</label>
		<input type="submit" value="MAKE ME THE MONEY">
	</form>
<?php

for ($i = 0; $i < $_GET['number-of-pickles']; $i++) {
	echo 'pickle<br>';
}

?>

</body>
</html>