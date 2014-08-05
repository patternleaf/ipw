<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Session 5');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 5</h1>
			<p class="lead">Sanitization, Validation, Error Handling</p>
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
						<p>If debugging is the process of removing bugs, then programming must be the process of putting them in.</p>
						<small><a href="http://en.wikipedia.org/wiki/Edsger_Dijkstra">Edsger Dijkstra</a></small>
					</blockquote>
				</section>
				<section class="section row" id="review">
					<h1>Review</h1>
					<ul>
						<li>flickr API app</li>
						<li>JSON datastore-driven guestbooks</li>
					</ul>
				</section>
				<section class="section row" id="lecture">
					<h1>Lecture/In-Class Exercises</h1>

					<ul>
						<li>Discuss <dfn>santization</dfn> and <dfn>validation</dfn>.</li>
						<li>Introduce the notion of variable <dfn>scope</dfn>.</li>
						<li>Start working on implementing a santization and validation scheme for our guestbook.</li>
						<li>File Modularization: <code><a href="http://php.net/include">include</a></code>, <code><a href="http://php.net/require">require</a></code>, and friends</li>
					</ul>
					
					<h2>Sanitization and validation</h2>
					
					<p><a href="/decks/data-sanitization-and-validation-guestbook.pdf">See slides here</a>. Questions:</p>
					
					<ul>
						<li>What is the difference between sanitization and validation?</li>
						<li>Which should happen first?</li>
					</ul>
					
					<h2>Variable Scope</h2>
					
					<p><a href="/decks/variable-scope-php.pdf">Slides here</a>. Also check out <a href="http://us2.php.net/manual/en/language.variables.scope.php">PHP.net's breakdown of variable scope</a>. Then try the following exercises.</p>
					
					<div class="row">
						<div class="code-container col-md-12" style="padding:1em;">
							<div class="pretty-code non-editable" id="exercise-1-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/variable-scope/1.php'); ?></div>
						</div>
					</div>
					
					<p>Check out your error console when you first run this. What is printed out? Why?</p>

					<div class="row">
						<div class="code-container col-md-12" style="padding:1em;">
							<div class="pretty-code non-editable" id="exercise-2-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/variable-scope/2.php'); ?></div>
						</div>
					</div>

					
				</section>
				<section class="section row" id="homework">
					<h1>Homework</h1>
					
					<p>TBD</p>
					
				</section>
				<section class="section row" id="goals">
					<h1>Goals</h1>

					<div class="col-md-9">
						<ul>
							<li>Santiziation and Validation</li>
							<li>Variable Scope</li>
							<li>Error Handling</li>
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