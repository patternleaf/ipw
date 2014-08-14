<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Session 7');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 7</h1>
			<p class="lead">WordPress</p>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-md-3 session-sidebar">
				<ul class="nav nav-tabs nav-stacked" id="sidebar-nav">
				</ul>
			</div>
			<div class="col-md-9 session-content">
				<section class="section row" id="review">
					<h1>Review</h1>
					<p>
						Any questions about:
					</p>
					<ul>
						<li>Santization</li>
						<li>Validation</li>
						<li>Modularization</li>
						<li>Global variables</li>
					</ul>
				</section>
				<section class="section row" id="lecture">
					<h1>Lecture/In-Class Exercises</h1>
					<p>
						In this session, we're going to look at MySQL and convert our guestbook to use MySQL as the datastore. 
						<a href="/decks/mysql.pdf">Here's a deck to start with</a>.
					</p>

					<p>
						Here is where we left the guestbook—with sanitization, validation and pre-filled forms. Note that this version also includes some Javascript-powered pagination so it works a little differently in a couple of ways.
					</p>
					
					<h3>Guestbook MySQL Starter</h3>
					<p>
						<a href="guestbook-mysql-starter/index.php">Working Example</a>.
					</p>
					<p>
						<a href="guestbook-mysql-starter.zip">.zip file for downloading</a>.
					</p>
					<div class="row live-example">
						<p style="padding-left:1em"><code>index.php</code></p>
						<div class="code-container col-md-10" style="padding-right:1em;">
							<div class="pretty-code non-editable" id="starter-index-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/guestbook-mysql-starter/index.php'); ?></div>
						</div>
					</div>
					<div class="row live-example">
						<p style="padding-left:1em"><code>guestbook-app.php</code></p>
						<div class="code-container col-md-10" style="padding-right:1em;">
							<div class="pretty-code non-editable" id="starter-include-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/guestbook-mysql-starter/guestbook-app.php'); ?></div>
						</div>
					</div>
					
					<p>
						Questions: which parts of our guestbook module need to be changed to support MySQL as a datastore

				</section>

				<section class="section row" id="materials">

				</section>

				
				<section class="section row" id="homework">
					<h1>Homework</h1>
					<ol>
						<li>
							Finish converting the guestbook to use MySQL.
						</li>
					</ol>
				</section>
				<section class="section row" id="goals">
					<h1>Goals</h1>
					<div class="col-md-9">
						<ul>
							<li>Super-basic MySQL: select, insert</li>
							<li>MySQL sanitization</li>
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