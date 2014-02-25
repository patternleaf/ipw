<?php app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Contact');
ob_start();
?>

	<div class="jumbotron">
		<h1>Contact</h1>
	</div>
	<div class="container">
		<p>Contact info going here.</p>
	</div>

<?php app()->setFragment('HTMLBodyContent', ob_get_clean()); ?>