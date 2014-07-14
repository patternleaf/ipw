<?php
include('guestbook-app.php');
$nEntries = 300;
if (isset($_GET['entries']) && is_numeric($_GET['entries'])) {
	$nEntries = $_GET['entries'];
}

$loremParts = explode(' ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');


for ($i = 0; $i < $nEntries; $i++) {
	shuffle($loremParts);
	$entrySize = rand(10, count($loremParts));
	
	addEntryToGuestbook(array(
		'name' => 'Auto-Entry Bot',
		'title' => 'Entry #'.$i,
		'email' => 'entrybot@humans-are-dumb.com',
		'message' => implode(' ', array_slice($loremParts, 0, $entrySize))
	));
	echo '<p>Added entry '.$i.'</p>';
}