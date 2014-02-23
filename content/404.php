<?php 
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: 404 Page Not Found');
app()->addHeader('HTTP/1.0 404 Not Found');
ob_start();
?>

	<div class="jumbotron">
		<h1>404, Dude!</h1>
	</div>
	<p>Ah, bummer.</p>

<?php app()->setFragment('HTMLBodyContent', ob_get_clean()); ?>