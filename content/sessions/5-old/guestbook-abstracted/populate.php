<?php
	// a script to auto-populate our messages datastore with fake messages.

	// by including the datastore interface, we can use it in this utility 
	// program without having to write any new database or message-related
	// code.
	include ('datastore/interface.php');
	
	// explode() turns a string into an array by splitting it up into pieces.
	// the first argument tells it the string token which should be used to
	// break the string apart. in this case, it's a space.
	$loremParts = explode(' ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
	
	
	// add ?n=1000 to the url to populate with 1000.
	$n = 100;
	if (isset($_GET['n']) && is_numeric($_GET['n'])) {
		$n = $_GET['n'];
	}
	
	for ($i = 0; $i < $n; $i++) {

		// shuffle randomizes an array.
		shuffle($loremParts);
		
		$newEntry = array(
			'name' => 'A Name '.$i,
			'title' => 'Title '.$i,
			'message' => implode(' ', $loremParts), // the opposite of explode, implode takes an array and returns a string.
			'location' => 'Boulder, CO',
			'email' => 'eric@patternleaf.com',
			'timestamp' => time()
		);
		
		// insert the new
		datastore_insertEntry($newEntry);
		
		// print out status to page.
		echo 'inserted entry '.$i.'<br>';
	}

