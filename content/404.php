<?php 
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: 404 Page Not Found');
app()->addHeader('HTTP/1.0 404 Not Found');
ob_start();
?>

	<div class="jumbotron">
		<div class="container"><h1>404, Dude!</h1></div>
	</div>
	<div class="container">
		<h2>Ah, bummer.</h2>
		<p>
			That URL doesn't go anywhere. Could be you. Could be me. Let's communicate.
		</p>
	</div>

<?php app()->setFragment('HTMLBodyContent', ob_get_clean()); ?>