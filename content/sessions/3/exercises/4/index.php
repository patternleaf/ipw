<!DOCTYPE html>
<html>
<head>
	<title>Exercise 4</title>
</head>
<body>

	<form>
		<label>
			<span>How many pickles would you like to make?</span>
			<input type="text" name="number-of-pickles">
		</label>
		<input type="submit" value="MAKE ME SOME PICKLES">
	</form>
<?php

for ($i = 0; $i < $_GET['number-of-pickles']; $i++) {
	echo '<span>'.$i.' <img src="http://www.celticstown.com/wp-content/uploads/2012/04/pickle1.jpg" style="height:100px;"></span>';
}
?>

</body>
</html>