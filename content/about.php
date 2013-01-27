<?php app()->setFragment('HTMLTitle', 'Intro to Web Programming: About');
ob_start();
?>

	<div class="hero-unit">
		<h1>About</h1>
	</div>
	<p>This is an about page. Woo.</p>

<?php app()->setFragment('HTMLBodyContent', ob_get_clean()); ?>