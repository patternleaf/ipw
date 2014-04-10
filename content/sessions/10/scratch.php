<?php
$connection = mysqli_connect(
	'localhost',				// hostname
	'username',			// mysql server username
	'password',			// password
	'my_database'			// database to use on connection
);

$queryResult = mysqli_query($connection, 'select * from entries;');

if ($queryResult) {
	while ($row = mysqli_fetch_assoc($queryResult)) {
		print ($row['name'].' says: '.$row['message'].' at '.$row['timestamp'].'<br>');
	}
}
else {
	print('Query failed! '.mysqli_error($connection));
}
