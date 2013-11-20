<?php
	require_once('app/App.class.php');
	app()->loadContentForRequest();
	app()->sendHTTPHeaders();
	app()->renderHTTPBody();
?>