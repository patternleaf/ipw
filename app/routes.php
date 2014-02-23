<?php

router()->set(array(
	'/^\/?$/' 							=> array('includes' => 'content/home.php'),
	'/^\/api\/?(.*)$/' 					=> array('includes' => 'app/endpoint.php', 'templates' => array()),
	'/^\/classes\/?$/' 					=> array('includes' => 'content/sessions.php'),
	'/^\/sessions\/?$/' 				=> array('includes' => 'content/sessions.php'),
	'/^\/sessions\/([\d])\/?$/' 		=> array('includes' => 'content/sessions/$1/session-$1.php'),
	'/^\/sessions\/([\d])\/deck\/?$/' 	=> array('includes' => 'content/sessions/$1/deck.php', 'templates' => array('templates/deck.php')),
	'/^\/sessions\/([\d])\/(.*)$/' 		=> array('includes' => 'content/sessions/$1/$2'),
	'/^\/decks\/?$/' 					=> array('includes' => 'content/decks.php'),
	'/^\/decks\/([^\/])\/?$/' 			=> array('includes' => 'content/decks/$1/index.php'),
	'/^\/resources\/?$/' 				=> array('includes' => 'content/resources.php'),
	'/^\/contact\/?$/' 					=> array('includes' => 'content/contact.php'),
	'/^\/about\/?$/' 					=> array('includes' => 'content/about.php'),
	'/^.*$/' 							=> array('includes' => 'content/404.php'),
));