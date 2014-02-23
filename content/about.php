<?php app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: About');
ob_start();
?>

	<div class="jumbotron">
		<div class="container"><h1>About</h1></div>
	</div>
	<div class="container">
		<p>
			This site is built with:
			<ul>
				<li><a href="http://getbootstrap.com/">Bootstrap</a></li>
				<li><a href="http://jquery.com">jQuery</a></li>
				<li><a href="http://lesscss.org/">Less</a></li>
				<li><a href="http://imakewebthings.com/deck.js/">Deck.js</a></li>
				<li><a href="http://processingjs.org">Processing.js</a></li>
				<li><a href="http://jsfiddle.net">JSFiddle</a></li>
				<li><a href="https://github.com/patternleaf/Romano">Romano</a></li>
				<li>A little homemade PHP routing/templating framework</li>
			</ul>
			And a bunch of custom PHP and JS glue. <a href="https://github.com/patternleaf/ipw">You can find the source on github</a>.
		</p>
		<small>Photo credits: <a href="http://www.flickr.com/photos/26782864@N00/4782904694">William Warby</a>, <a href="http://www.flickr.com/photos/iamshinji/3063220244/">Dino Latoga</a></small>
	</div>

<?php app()->setFragment('HTMLBodyContent', ob_get_clean()); ?>