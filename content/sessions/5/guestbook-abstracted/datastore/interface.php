<?php
/**
 * data-store.php
 * 
 * A few functions for our guestbook. We use a simple interface/implementation
 * pattern: a front-end interface provides a well-defined set of functions.
 *
 * Two separate implementations can be used with the same front-end interface.
 * 
 * 
 * 
 * Note that this files uses a PHPDoc variant to document functions. 
 * More at http://en.wikipedia.org/wiki/PHPDoc.
 * 
 * @package data-store
 */

define('DATA_STORE_JSON', 'json');
define('DATA_STORE_MYSQL', 'mysql');

/**
* Change this constant to determine the data store we'll use.
* 
*/
//define('DATA_STORE', DATA_STORE_MYSQL);
define('DATA_STORE', DATA_STORE_JSON);

include('implementations/json.php');
include('implementations/mysql.php');


/**
 * Store a new entry.
 * 
 * Note that this function assumes that data has been sanitized for 
 * display, but not for storage in any particular datastore.
 * 
 * 
 * 
 * @param array $data Associative array, data for new guestbook entry.
 * @return array The new state of the guestbook following insertion of the new entry.
 */
function datastore_insertEntry($data) {
	$result = array();
	if (DATA_STORE == DATA_STORE_JSON) {
		$result = json_insertEntry($data);
	}
	else if (DATA_STORE == DATA_STORE_MYSQL) {
		$result = mysql_insertEntry($data);
	}
	return $result;
}

/**
 * Returns current guestbook entries as a linear array, wherein each entry
 * is an associative array of the form:
 * 
 * 		'name' => 			<guest name>
 * 		'title' => 			<entry title>
 * 		'location' =>		<location>
 * 		'email' => 			<email>
 * 		'timestamp' =>		a mysql-formatted timestamp string, YYYY-MM-DD H:M:S
 * 
 * @return array All guestbook entries, or NULL if store is not defined.
 */
function datastore_fetchEntries() {
	if (DATA_STORE == DATA_STORE_JSON) {
		return json_fetchEntries();
	}
	else if (DATA_STORE == DATA_STORE_MYSQL) {
		return mysql_fetchEntries();
	}
	return NULL;
}

/**
 * Perform store-specific sanitization.
 * 
 * @param $data Data to be sanitized in an associative array.
 * @return array Sanitized data, or NULL if store is not defined.
 */
function datastore_sanitizeForStore($data) {
	if (DATA_STORE == DATA_STORE_JSON) {
		return json_sanitizeForStore($data);
	}
	else if (DATA_STORE == DATA_STORE_MYSQL) {
		return mysql_sanitizeForStore($data);
	}
	return NULL;
}