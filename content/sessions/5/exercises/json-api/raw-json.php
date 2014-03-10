<!DOCTYPE html>
<html>
<head>
	<title>JSON API</title>
</head>
<body>

	<form>
		<label>
			<span>Search on Flickr:</span>
			<input type="text" name="search-terms">
		</label>
		<input type="submit" value="Search">
	</form>
<?php

define('API_KEY', '4e881df747ca537f07e963f265402d3e');


if (array_key_exists('search-terms', $_GET)) {
	$request_data = array(
		'api_key' => API_KEY,
		'method' => 'flickr.photos.search',
		'format' => 'json',
		'nojsoncallback' => 1,
		'per_page' => 10,
		'text' => $_GET['search-terms'],
	);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.flickr.com/services/rest/?'.http_build_query($request_data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	
	$result = curl_exec($ch);
	
	echo '<pre>';
	print_r($result);
	echo '</pre>';
}

?>

</body>
</html>