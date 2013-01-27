<?php 
app()->setFragment('HTMLTitle', 'Intro to Web Programming');
ob_start();
?>
	<!-- Main hero unit for a primary marketing message or call to action -->
	<div class="hero-unit">
		<h1>Intro to Programming for the Web</h1>
		<p>The official site for the official class of the official Intro to Programming for the Web course at Boulder Digital Works</p>
		<p>January-February 2013 edition</p>
		<p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
	</div>

	<!-- Example row of columns -->
	<div class="row">
		<div class="span4">
			<h2>Resources</h2>
			<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			<p><a class="btn" href="#">View details &raquo;</a></p>
		</div>
		<div class="span4">
			<h2>Syllabus</h2>
			<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			<p><a class="btn" href="#">View details &raquo;</a></p>
	 </div>
		<div class="span4">
			<h2>Exercises</h2>
			<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			<p><a class="btn" href="#">View details &raquo;</a></p>
		</div>
	</div>


<?php app()->setFragment('HTMLBodyContent', ob_get_clean()); ?>