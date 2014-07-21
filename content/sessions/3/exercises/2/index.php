<!DOCTYPE html>
<html>
<head>
	<title>Exercise 1</title>
</head>
<body>

<?php
$pickleOrigins = array(
	'Gherkin' => 'West Indian',
	'Polish' => 'Poland',
	'Hungarian' => 'Hungary',
	'Swedish' => 'Sweden'
);
?>
<dl>
<?php
foreach ($pickleOrigins as $name => $origin) {
	echo '<dt>'.$name.'</dt>';
	echo '<dd>'.$origin.'</dd>';
}
?>
</dl>

</body>
</html>