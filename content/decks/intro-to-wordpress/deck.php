<?php
	$slides_dir = __DIR__.'/slides';
	// $next_deck = array(
	// 	'title' => 'Intro to Procedural Programming',
	// 	'url' => 'intro-to-procedural'
	// );
	ob_start();
?>
<?php 
	app()->appendTo('HTMLBodyTail', ob_get_clean());
?>