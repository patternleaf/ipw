<?php
/**
 * stores/json.php
 * 
 * Provides json data store implementation.
 * 
 */

$gCurrentEntriesLoaded = false;
$gCurrentEntries = array();

/**
 * 
 */
function json_insertEntry($data) {
	global $gCurrentEntries;

	// read current messages from store, if we haven't already.
	json_loadCurrentEntriesIfNecessary();
	
	// add the new entry to our in-program "source of truth"/model.
	$gCurrentEntries[] = $data;

	// write out the complete new model to the data store
	file_put_contents('messages.json', json_encode($gCurrentEntries));
	
	return $gCurrentEntries;
}

function json_fetchEntries() {
	global $gCurrentEntries;
	
	// Just load the data, if necessary. Following this call, the 
	// gCurrentEntries array will be populated with current entries.
	json_loadCurrentEntriesIfNecessary();

	return $gCurrentEntries;
}

/**
 * No extra sanitization is needed for the json
 * store. So just return the passed data!
 */
function json_sanitizeForStore($data) {
	return $data;
}

/**
 * Load current entries into the global entries array. This function
 * does not return anything, but does change global state. This kind 
 * of behavior should generally be avoided, but it's acceptable within
 * a package that exposes a interface, where this kind of behavior won't be
 * exposed to clients of the API.
 * 
 * This function is an implementation detail and is not meant to
 * be used publicly. Later we will see ways to make this more
 * explicit.
 * 
 */
function json_loadCurrentEntriesIfNecessary() {
	global $gCurrentEntries, $gCurrentEntriesLoaded;
	
	if (!$gCurrentEntriesLoaded) {
		// read current messages from store.
		$data = file_get_contents('messages.json');
		if (!empty($data)) {
			$entries = json_decode($data);
			
			// we need to do a little work on the raw data returned from
			// json_decode in order to conform to the datastore interface
			// conventions.
			//
			// 1. convert PHP objects to assoc. arrays
			// 2. convert unix timestamp (eg 1234123123) into mysql
			//    datetime format timestamps (eg YYYY-MM-DD HH:MM:SS)
			//
			foreach ($entries as $entry) {
				$entry = get_object_vars($entry);

				// per the datastore interface convention, we need to convert
				// our unix timestamp to a mysql-formatted datetime.
				$entry['timestamp'] = date('Y-m-d H:i:s', $entry['timestamp']);
				$gCurrentEntries[] = $entry;
			}
		}
		
		// set our flag to show that we have loaded current entries
		// and avoid loading them again.
		$gCurrentEntriesLoaded = true;
	}
}