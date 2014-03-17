<?php app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Resources');
ob_start();
?>

	<div class="jumbotron">
		<div class="container"><h1>Resources</h1></div>
	</div>
	<div class="container">
		<div class="row">
			<p>The <a href="http://www.boulderdigitalarts.com/training/details.php?offering=253">BDA Course Page</a>.</p>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h2>HTML5</h2>
				<ul>
					<li><a href="http://developers.whatwg.org">WHATWG standards for developers</a></li>
					<li><a href="http://joshduck.com/periodic-table.html">Periodic Table of the Elements</a></li>
					<li><a href="http://validator.w3.org">HTML Validator</a></li>
				</ul>

				<h2>CSS</h2>
				<ul>
					<li><a href="http://www.w3.org/Style/CSS/">Specs</a></li>
					<li><a href="http://code.tutsplus.com/tutorials/the-30-css-selectors-you-must-memorize--net-16048">The 30 CSS selectors you must memorize</a></li>
					<li><a href="http://jigsaw.w3.org/css-validator/">CSS3 Validator</a></li>
				</ul>

				<h2>JavaScript</h2>
				<ul>
					<li><a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript">MDN JavaScript reference</a></li>
				</ul>
				<h2>PHP</h2>
				<ul>
					<li><a href="http://php.net">php.net</a></li>
				</ul>
				
				<h2>WordPress</h2>
				<ul>
					<li><a href="http://wordpress.org/themes/">Official Themes Directory</a></li>
					<li><a href="http://wordpress.org/plugins/">Official Plugins Directory</a></li>
					<li><a href="http://codex.wordpress.org">The WordPress Codex</a></li>
				</ul>

			</div>
			<div class="col-md-6">
				<h2>Web Design</h2>
				<ul>
					<li><a href="http://www.smashingmagazine.com/2013/03/01/logical-breakpoints-responsive-design/">Logical Breakpoints for your Responsive Design</a></li>
				</ul>
				<h2>Style and Best Practices</h2>
				<ul>
					<li><a href="http://google-styleguide.googlecode.com/svn/trunk/htmlcssguide.xml">Google HTML/CSS Style Guide</a></li>
					<li><a href="https://google-styleguide.googlecode.com/svn/trunk/javascriptguide.xml">Google JavaScript Style Guide</a></li>
					<li><a href="http://nodeguide.com/style.html">Another style guide for JavaScript</a>. I agree with most of it.</li>
					<li><a href="http://stackoverflow.com/questions/1547986/can-i-use-camel-case-in-css-class-names">Can I use CamelCase in CSS Class Names?</a> on Stack Overflow. Convention says uses lowercase-dashes.</li>
					<li><a href="http://programmers.stackexchange.com/a/46760">Things to know and look for before making your site public</a> on Stack Overflow.</li>
					<li><a href="http://mdo.github.io/code-guide/">Code Guide by @mdo</a></li>
				</ul>
				
				<h2>Misc - Programming / Web</h2>
				<ul>
					<li><a href="http://google-styleguide.googlecode.com/svn/trunk/htmlcssguide.xml">Google HTML/CSS Style Guide</a></li>
					<li><a href="http://www.w3.org">The W3C</a></li>
					<li><a href="http://stackoverflow.com">Stack Overflow</a></li>
					<li><a href="http://stackoverflow.com/questions/3088/best-ways-to-teach-a-beginner-to-program">Best ways to teach a beginner to progam?</a> on Stack Overflow. Has a list of potentially interesting links.</li>
					<li><a href="http://learnpythonthehardway.org/book/intro.html">The Hard Way is Easier</a> (beginner programming wisdom)</li>
					<li><a href="http://me.veekun.com/blog/2012/04/09/php-a-fractal-of-bad-design/">PHP: a fractal of bad design</a></li>
				</ul>
				
				<h2>Utilities</h2>
				<ul>
					<li><a href="http://www.colorpicker.com">Simple color picker</a></li>
					<li><a href="http://www.css3factory.com/linear-gradients/">CSS3 Gradient Generator</a></li>
				</ul>
				
			</div>
		</div>
	</div>

<?php app()->setFragment('HTMLBodyContent', ob_get_clean()); ?>