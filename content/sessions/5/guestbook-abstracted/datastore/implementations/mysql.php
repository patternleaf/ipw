<?php
/**
 * stores/mysql.php
 * 
 * Provides mysql data store implementation.
 * 
 */ 

$gMysqlErrors = array();
$gMysqlConnection = mysqli_connect('localhost', 'username', 'password', 'guestbook');

if (!$gMysqlConnection) {
	$gMysqlErrors[] = 'Could not connect to database: '.mysqli_error($gMysqlConnection);
}

// create our table if it doesn't exist.
// this is a very simple version, with no ids, no primary key.
$queryResult = mysqli_query($gMysqlConnection, '
	CREATE TABLE IF NOT EXISTS entries (
		`name` VARCHAR(255),
		`title` VARCHAR(255),
		`location` VARCHAR(255),
		`email` VARCHAR(255),
		`timestamp` DATETIME,
		`message` TEXT
	);
');
if (!$queryResult) {
	$gMysqlErrors[] = 'Could not create database table! '.mysqli_error($gMysqlConnection);
}


/**
 * 
 */
function mysql_insertEntry($data) {
	global $gMysqlConnection;
	
	// convert unix timestamp to mysql-formatted timestamp.
	$data['timestamp'] = date('Y-m-d H:i:s', $data['timestamp']);
	
	$query = 'INSERT INTO entries VALUES (
		"'.$data['name'].'",
		"'.$data['title'].'",
		"'.$data['location'].'",
		"'.$data['email'].'",
		"'.$data['timestamp'].'",
		"'.$data['message'].'"
	);';
	$queryResult = mysqli_query($gMysqlConnection, $query);
	
	if (!$queryResult) {
		$errors[] = 'Could not insert new entry! '.mysqli_error($gMysqlConnection);
	}
	
	// This is rather inefficient.
	return mysql_fetchEntries();
}

function mysql_fetchEntries() {
	global $gMysqlConnection;
	global $gMysqlErrors;

	$currentMessages = array();
	$queryResult = mysqli_query($gMysqlConnection, 'SELECT * FROM entries;');
	if ($queryResult) {
		while($row = mysqli_fetch_assoc($queryResult)) {
			$currentMessages[] = $row;
		}
	}
	else {
		$gMysqlErrors[] = 'Could not query entries! '.mysqli_error($gMysqlConnection);
	}
	return $currentMessages;
}

function mysql_sanitizeForStore($data) {
	global $gMysqlConnection;
	return array(
		'name' => mysqli_real_escape_string($gMysqlConnection, $data['name']),
		'title' => mysqli_real_escape_string($gMysqlConnection, $data['title']),
		'location' => mysqli_real_escape_string($gMysqlConnection, $data['location']),
		'message' => mysqli_real_escape_string($gMysqlConnection, $data['message']),
		'email' => mysqli_real_escape_string($gMysqlConnection, $data['email'])
	);
}