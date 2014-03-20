<?php
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Session 8');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 8</h1>
			<p class="lead">jQuery, The DOM</p>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-md-3 session-sidebar">
				<ul class="nav nav-tabs nav-stacked" id="sidebar-nav">
				</ul>
			</div>
			<div class="col-md-9 session-content">
				<section id="intro" class="first">
					<blockquote class="pull-right first">
						<p>Learning JavaScript used to mean you weren't a serious software developer. Today, not learning Javascript means the same thing.</p>
						<small>Attributed to <a href="http://radar.oreilly.com/tim">Tim O'Reilly</a></small>
					</blockquote>
				</section>

				<section class="section row" id="review">
					<div class="col-md-8">
						<h1>Review</h1>
						<p>
							Review WordPress: themes, questions.
						</p>
					</div>
				</section>
				<section class="section" id="lecture">
					<div class="row">
						<div class="col-md-8">
							<h1>Lecture</h1>
							<p>First, we'll take a quick look at <a href="http://codex.wordpress.org/Writing_a_Plugin">developing WordPress plugins</a>.</p>
							<p>Then we'll be working with <a href="http://jquery.com">jQuery</a>.</p>
							<p>Slides forthcoming!</p>
						</div>
						<div class="col-md-4">
							<a href="http://jquery.com"><img src="http://jquery.com/jquery-wp-content/themes/jquery/images/logo-jquery@2x.png" style="background:#777;width:100%;padding:10px;border-radius:10px;"></a>
						</div>
					</div>
					<div class="row" style="clear:both;">
						<div class="col-md-10">
							<h3>JavaScript Loading Examples</h3>

							<p>In the examples below, an included JS file is actually a PHP script that writes JavaScript (yup, you can do that, too!). But before it does, it waits 5 seconds. The idea is to simulate a JavaScript that takes a long time to download: either because it's big, or the network connection is bad. <code>slow-to-load.php</code> looks like this:</p>
							<div class="pretty-code non-editable" id="slow-to-load" data-language="php" style="width:100%; height:100px"><?php app()->escapedFileContents(__DIR__.'/exercises/js-loading-examples/slow-to-load.php'); ?></div>

							<h4 style="margin-top:2em;"><a href="exercises/js-loading-examples/included-js-delay-1.php">Slow JS linked with HTML still to parse in the document</a>.</h4>
							<div class="pretty-code non-editable" id="slow-js-1" data-language="php" style="width:100%; height:200px"><?php app()->escapedFileContents(__DIR__.'/exercises/js-loading-examples/included-js-delay-1.php'); ?></div>

							<h4 style="margin-top:2em;"><a href="exercises/js-loading-examples/included-js-delay-2.php">Slow JS linked just before the <code>&lt;/body></code></a>.</h4>
							<div class="pretty-code non-editable" id="slow-js-2" data-language="php" style="width:100%; height:200px"><?php app()->escapedFileContents(__DIR__.'/exercises/js-loading-examples/included-js-delay-2.php'); ?></div>

							<h4 style="margin-top:2em;"><a href="exercises/js-loading-examples/inline-js-delay-1.php">Slow JS inline</a>.</h4>
							<div class="pretty-code non-editable" id="slow-js-3" data-language="php" style="width:100%; height:300px"><?php app()->escapedFileContents(__DIR__.'/exercises/js-loading-examples/inline-js-delay-1.php'); ?></div>


							<h3 style="margin-top:3em;">jQuery vs DOM API</h3>

							<h4><a href="exercises/jquery-vs-dom/dom-event.php">Hooking up an event in the DOM</a>.</h4>
							<div class="pretty-code non-editable" id="jquery-vs-dom-1" data-language="php" style="width:100%; height:300px"><?php app()->escapedFileContents(__DIR__.'/exercises/jquery-vs-dom/dom-event.php'); ?></div>

							<h4 style="margin-top:2em;"><a href="exercises/jquery-vs-dom/jquery-event.php">Hooking up the same event with jQuery</a>.</h4>
							<div class="pretty-code non-editable" id="jquery-vs-dom-2" data-language="php" style="width:100%; height:300px"><?php app()->escapedFileContents(__DIR__.'/exercises/jquery-vs-dom/jquery-event.php'); ?></div>

							<h3 style="margin-top:3em;">Accordion</h3>

<h4 style="margin-top:2em;"><a href="exercises/accordion/accordion-on-load.php">Accordion on load</a>.</h4>
							<p>
								This isn't really a working accordion, but it shows a technique for showing and hiding elements. Which element will remain standing when the JavaScript runs?
							</p>

							<div class="pretty-code non-editable" id="accordion-1" data-language="php" style="width:100%; height:300px"><?php app()->escapedFileContents(__DIR__.'/exercises/accordion/accordion-on-load.php'); ?></div>


							<h3><a href="exercises/accordion/after.php">A working accordion</a></h3>
							<p>Build your own! Start here:</p>
							<div class="pretty-code non-editable" id="accordion-before" data-language="php" style="width:100%; height:300px"><?php app()->escapedFileContents(__DIR__.'/exercises/accordion/before.php'); ?></div>
						</div>
					</div>
				</section>
<!--
				<section class="section row" id="materials">
					<h1>Materials</h1>
				</section>
 -->

				<section class="section row" id="homework">
					<h1>Homework</h1>
					<p>
						You're going to make a WordPress plugin that will turn a sidebar into an accordion. You can target your plugin for a specific site and theme, but see how general you can make it: does the plugin work if you change themes or content in the sidebar? The plugin should at least work with the twentyfourteen theme.
					</p>
					<ol>
						<li>
							Make a WordPress plugin.
						</li>
						<li>
							Use <code>wp_enqueue_script</code> to include a separate JS file in your plugin's folder. Be sure to include jQuery in the list of dependencies.
						</li>
						<li>
							Use jQuery selectors and event handling to turn a (or maybe all?) sidebars into accordions.
						</li>
					</ol>
				</section>
				<section class="section row" id="goals">
					<h1>Goals</h1>
					<div class="col-md-9">
						<ul>
							<li>Understand why it matters how and where you include JavaScript in an HTML file.</li>
							<li>Basic jQuery: selectors, <code>css()</code>, <code>text()</code>, <code>$</code></li>
							<li>Basic event handling in the DOM.</li>
						</ul>
					</div>
					<?php /*
					<div class="col-md-3">
						<img src="img/leo.png" style="width:100%">
					</div>
					*/?>
				</section>
			</div>
		</div>
	</div>

<?php
app()->setFragment('HTMLBodyContent', ob_get_clean());

appendSessionBodyTail();
?>
