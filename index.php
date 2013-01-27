<?php
	require_once('app/App.class.php');
	app()->loadDefaults();
	app()->loadContentForRequest();
	app()->sendHeaders();
	app()->renderHTMLPage();
?>