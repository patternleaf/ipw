<?php

router()->set(array(
	'/^\/?$/' 							=> array('includes' => 'content/home.php'),
	'/^\/api\/?(.*)$/' 					=> array('includes' => 'app/endpoint.php', 'templates' => array()),
	'/^\/classes\/?$/' 					=> array('includes' => 'content/sessions.php'),
	'/^\/sessions\/?$/' 				=> array('includes' => 'content/sessions.php'),
	'/^\/sessions\/([\d])\/?$/' 		=> array('includes' => 'content/sessions/$1/session-$1.php'),
	'/^\/decks\/?$/' 					=> array('includes' => 'content/decks.php'),
	'/^\/decks\/(.*)\/?$/' 				=> array('includes' => 'content/decks/$1/index.php', 'templates' => array('templates/deck.php')),
	'/^\/resources\/?$/' 				=> array('includes' => 'content/resources.php'),
	'/^\/contact\/?$/' 					=> array('includes' => 'content/contact.php'),
	'/^\/about\/?$/' 					=> array('includes' => 'content/about.php'),
	'/^\/exercises\/?$/' 				=> array('includes' => 'content/exercises.php'),
	'/^.*$/' 							=> array('includes' => 'content/404.php'),
));