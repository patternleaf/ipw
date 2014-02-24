<?php app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Resources');
ob_start();
?>

	<div class="jumbotron">
		<div class="container"><h1>Resources</h1></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>HTML5</h2>
				<ul>
					<li><a href="http://www.w3.org/html/wg/drafts/html/master/Overview.html#contents">The spec</a></li>
					<li><a href="http://joshduck.com/periodic-table.html">Periodic Table of the Elements</a></li>
				</ul>

				<h2>CSS</h2>
				<ul>
					<li><a href="http://www.w3.org/Style/CSS/">Specs</a></li>
				</ul>

				<h2>JavaScript</h2>
				<ul>
					<li><a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript">MDN JavaScript reference</a></li>
				</ul>
				<h2>PHP</h2>
				<ul>
					<li><a href="http://php.net">php.net</a></li>
				</ul>
			</div>
			<div class="col-md-6">
				<h2>Utilities</h2>
				<ul>
					<li><a href="http://www.colorpicker.com">Simple color picker</a></li>
					<li><a href="http://www.css3factory.com/linear-gradients/">CSS3 Gradient Generator</a></li>
				</ul>
				<h2>Misc - Programming / Web</h2>
				<ul>
					<li><a href="http://www.boulderdigitalarts.com/training/details.php?offering=253">BDA Course Page</a></li>
					<li><a href="http://www.w3.org">The W3C</a></li>
					<li><a href="http://stackoverflow.com">Stack Overflow</a></li>
					<li><a href="http://stackoverflow.com/questions/3088/best-ways-to-teach-a-beginner-to-program">Best ways to teach a beginner to progam?</a> on Stack Overflow. Has a list of potentially interesting links.</li>
					<li><a href="http://learnpythonthehardway.org/book/intro.html">The Hard Way is Easier</a> (beginner programming wisdom)</li>
					<li><a href="http://me.veekun.com/blog/2012/04/09/php-a-fractal-of-bad-design/">PHP: a fractal of bad design</a></li>
					<li><a href="http://programmers.stackexchange.com/a/46760">Things to know and look for before making your site public</a> on Stack Overflow.</li>
				</ul>
			</div>
		</div>
	</div>

<?php app()->setFragment('HTMLBodyContent', ob_get_clean()); ?>