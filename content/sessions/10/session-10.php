<?php
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Session 10');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 10</h1>
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
							<li>Wordpress</li>
						</ul>
					</div>
				</section>

				<section class="section row" id="lecture">
					<h1>Lecture/In-Class Exercises</h1>
					
					<h3>Guestbook MySQL Starter</h3>
					<p>
						Let's review this implementation and implement <code>printEntries</code>.
					</p>
					<p>
						<a href="exercises/guestbook-mysql-starter/index.php">Working Example</a>.
					</p>
					<p>
						<a href="exercises/guestbook-mysql-starter.zip">.zip file for downloading</a>.
					</p>
					<div class="row live-example">
						<p style="padding-left:1em"><code>index.php</code></p>
						<div class="code-container col-md-10" style="padding-right:1em;">
							<div class="pretty-code non-editable" id="starter-index-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/guestbook-mysql-starter/index.php'); ?></div>
						</div>
					</div>
					<div class="row live-example">
						<p style="padding-left:1em"><code>guestbook-app.php</code></p>
						<div class="code-container col-md-10" style="padding-right:1em;">
							<div class="pretty-code non-editable" id="starter-include-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/guestbook-mysql-starter/guestbook-app.php'); ?></div>
						</div>
					</div>
					
					<p>
				</section>

				<section class="section row" id="advanced-topics">
					<div class="col-md-8">
						<h1>Advanced Topics</h1>
						<p>
							Some possible topics:
						</p>
						<ul>
							<li>More WordPress</li>
							<li>Pass by reference vs pass by value</li>
							<li>Cookies and sessions</li>
							<li>Add an API to our guestbook</li>
							<li>Questions about anything?</li>
							<li>Pagination using MySQL</li>
						</ul>
					</div>
				</section>


			</div>
		</div>
	</div>

<?php
app()->setFragment('HTMLBodyContent', ob_get_clean());

appendSessionBodyTail();
?>
