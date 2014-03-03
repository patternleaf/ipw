<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Session 3');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 3</h1>
			<p class="lead">PHP, functions, variables, arrays</p>
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
						<p>Controlling complexity is the essence of computer programming.</p>
						<small>Brian Kernighan</small>
					</blockquote>
				</section>
				<section class="section row" id="review">
					<h1>Review</h1>
					<p>
						Review Karel solutions from <a href="../2">Session 2</a>. 
					</p>
					<ul>
						<li>Problem 3</li>
						<li>Problem 4</li>
					</ul>
					<p>
						Guestbook questions:
					</p>
					<ul>
						<li>What are the parts of a guestbook?</li>
						<li>
							What might the markup for a guestbook look like?
						</li>
					</ul>
				</section>
				<section class="section row" id="lecture">
					<h1>Lecture</h1>
					<p>
						Lecture content for this session is found in the <a href="/decks">decks</a>.
					</p>
					<ul>
						<li><a href="/decks/functions-and-variables-js">Deck: Functions and Variables (JS)</a></li>
					</ul>
				</section>
				<section class="section row" id="materials">
					<h1>Materials</h1>

				</section>
				<section class="section row" id="homework">
					<h1>Homework</h1>
					<h2>Guestbook - Markup &amp; Form Submission</h2>
				</section>
				<section class="section row" id="goals">
					<h1>Goals</h1>

					<div class="col-md-9">
						<p>
							You should have some idea about the following problem-solving and programming concepts.
						</p>
						
						<ul>
							<li>Decomposition</li>
							<li>Abstraction</li>
							<li>Condition(al)</li>
							<li>Iteration</li>
						</ul>
					</div>
					<div class="col-md-3">
						<img src="img/cajun-man.png" style="width:100%">
					</div>
					</div>
				</section>
			</div>
		</div>
	</div>

<?php 
app()->setFragment('HTMLBodyContent', ob_get_clean()); 

appendSessionBodyTail();
?>