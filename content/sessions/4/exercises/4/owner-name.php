<!DOCTYPE html>
<html>
<head>
	<title>JSON API</title>
	<style type="text/css" media="screen">
	figure {
		float:left;
		margin:1em;
		max-width:200px;
	}
	figure img {
		width:100%;
	}
	img:nth-child(4n+1) {
		clear:left;
	}
	</style>
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
		'per_page' => 16,
		'text' => $_GET['search-terms'],
		'extras' => 'owner_name'
	);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.flickr.com/services/rest/?'.http_build_query($request_data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$result = curl_exec($ch);	
	$data = json_decode($result, true);
	
	if (is_array($data) && $data['stat'] == 'ok') {
		echo '<section id="result">';
		foreach ($data['photos']['photo'] as $photo) {
			echo '
				<figure>
					<img src="http://farm'.$photo['farm'].'.staticflickr.com/'.$photo['server'].'/'.$photo['id'].'_'.$photo['secret'].'.jpg">
					<figcaption class="owner-name">by '.$photo['ownername'].'</figcaption>
				</figure>
			';
		}
		echo '</section>';
	}
	else {
		echo '<h2>Error: '.$data['stat'].'</h2>';
	}
}

?>

</body>
</html>