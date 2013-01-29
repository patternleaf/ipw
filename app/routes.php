<?php

router()->set(array(
	'/^\/?$/' 						=> array('content/home.php'),
	'/^\/classes\/?$/' 				=> array('content/sessions.php'),
	'/^\/sessions\/?$/' 			=> array('content/sessions.php'),
	'/^\/sessions\/([\d])\/?$/' 	=> array('content/sessions/$1/session-$1.php'),
	'/^\/sessions\/([\d])\/(.*)$/' 	=> array('content/sessions/$1/$2'),
	'/^\/resources\/?$/' 			=> array('content/resources.php'),
	'/^\/contact\/?$/' 				=> array('content/contact.php'),
	'/^\/about\/?$/' 				=> array('content/about.php'),
	'/^.*$/' 						=> array('content/404.php'),
));