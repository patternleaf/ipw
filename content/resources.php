<?php app()->setFragment('HTMLTitle', 'Intro to Web Programming: Resources');
ob_start();
?>

	<div class="hero-unit">
		<h1>Resources</h1>
	</div>
	<p>Resources will go here.</p>

<?php app()->setFragment('HTMLBodyContent', ob_get_clean()); ?>