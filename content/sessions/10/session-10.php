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
						<h1>MySQL Guestbook</h1>
						<ul>
							<li><a href="exercises/guestbook-mysql/from-class-6.zip">Guestbook from class 6</a></li>
							<li><a href="exercises/guestbook-mysql/finished.zip">A finished MySQL guestbook</a>.</li>
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
