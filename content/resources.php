<?php app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Resources');
ob_start();
?>

	<div class="jumbotron">
		<div class="container"><h1>Resources</h1></div>
	</div>
	<div class="container">
		<h2>HTML5</h2>
		<ul>
			<li><a href="http://joshduck.com/periodic-table.html">Periodic Table of the Elements</a></li>
		</ul>

		<h2>PHP</h2>
		<ul>
			<li><a href="http://php.net">php.net</a></li>
		</ul>
	</div>

<?php app()->setFragment('HTMLBodyContent', ob_get_clean()); ?>