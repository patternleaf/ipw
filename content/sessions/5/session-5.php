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

					<p>
						If you need a working file-based guestbook, you can download <a href="session-5-guestbook-starter.zip">this one</a>. 
					</p>
					<p>
						In this session, we wound up simply working through the process and logic of converting the markup-datastore guestbook to a JSON-datastore one.
					</p>	
				</section>
				<section class="section row" id="homework">
					<h1>Homework</h1>
					
					<p>Continue implementing and/or refining the JSON-based guestbook.</p>
					
				</section>

			</div>
		</div>
	</div>

<?php 
app()->setFragment('HTMLBodyContent', ob_get_clean()); 

appendSessionBodyTail();
?>