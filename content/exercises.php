<?php app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Exercises');
ob_start();
?>

	<div class="jumbotron">
		<div class="container"><h1>Exercises</h1></div>
	</div>
	<div class="container">
		<p>
			Currently unused. At some point, all of the exercises might be found here.
		</p>
	</div>

<?php app()->setFragment('HTMLBodyContent', ob_get_clean()); ?>