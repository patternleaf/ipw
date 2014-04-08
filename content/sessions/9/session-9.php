<?php
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Session 9');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 9</h1>
			<p class="lead">Advanced Topics, Project Review</p>
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
						<p>Hey, I'm a good software engineer, but I'm not exactly known for my fashion sense. White socks and sandals don't translate to "good design sense".</p>
						<small>Attributed to <a href="http://www.brainyquote.com/quotes/quotes/l/linustorva587356.html">Linus Torvalds</a></small>
					</blockquote>
				</section>

				<section class="section row" id="review">
					<div class="col-md-8">
						<h1>Review</h1>
						<ul>
							<li>Review personal projects.</li>
							<li>Review WordPress themes, jQuery accordion plugin.</li>
						</ul>
					</div>
				</section>
				<section class="section" id="lecture">
					<div class="row">
						<div class="col-md-8">
							<h1>Lecture</h1>
							<p>We have a few advanced topics we can talk about:</p>
							<ul>
								<li>AJAX (AHAH, AJAJ)</li>
								<li>AJAX with jQuery</li>
								<li>Closures.</li>
								<li>Pass by reference vs pass by value.</li>
							</ul>
						</div>
						<div class="col-md-4">

						</div>
					</div>
					<div class="row" style="clear:both;">
						<div class="col-md-10">
							<h3>AJAX</h3>

							<p>
								Below are two files demonstrating a very basic ajax request.
							</p>

							<h4 style="margin-top:2em;"><a href="exercises/ajax-client.php">Client-side</a>.</h4>

							<div class="pretty-code non-editable" id="ajax-client" data-language="php" style="width:100%; height:300px"><?php app()->escapedFileContents(__DIR__.'/exercises/ajax-client.php'); ?></div>

							<h4 style="margin-top:2em;"><a href="exercises/ajax-client.php">Server-side</a>.</h4>
							<div class="pretty-code non-editable" id="ajax-server" data-language="php" style="width:100%; height:300px"><?php app()->escapedFileContents(__DIR__.'/exercises/ajax-server.php'); ?></div>

							<h4>Exercise</h4>
							<p>
								Add a "number of paragraphs" option to the form, pass that value to the server, and have the server respond appropriately.
							</p>
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
						TBD
					</p>
				</section>
				<section class="section row" id="goals">
					<h1>Goals</h1>
					<div class="col-md-9">
						<ul>
							<li>Understand AJAX: what is the difference between an AJAX request and a "regular" HTTP request?</li>
							<li>Closures in JavaScript.</li>
							<li>Pass by value versus pass by reference.</li>
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
