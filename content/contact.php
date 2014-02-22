<?php app()->setFragment('HTMLTitle', 'Intro to Web Programming: Contact');
ob_start();
?>

	<div class="jumbotron">
		<h1>Contact</h1>
	</div>
	<p>Contact info going here.</p>

<?php app()->setFragment('HTMLBodyContent', ob_get_clean()); ?>