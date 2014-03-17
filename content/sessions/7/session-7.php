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
				<section id="intro" class="first">
					<blockquote class="pull-right first">
						<p>changing admin menu? the process starts with weeping so that your tears make code wet and less rigid…</p>
						<small><a href="http://unserkaiser.com/blog/2013/06/29/loopchat-wordpress-quotes-collection-part-1/">Andrey “Rarst” Savchenko</a> on coding to modify the WordPress admin panel</small>
					</blockquote>
				</section>

				<section class="section row" id="review">
					<h1>Review</h1>
					<p>
						Review function exercises on codeacademy. (<a href="http://www.codecademy.com/tracks/php">PHP</a> and <a href="http://www.codecademy.com/tracks/javascript">JavaScript</a>.)
					</p>
				</section>
				<section class="section row" id="lecture">
					<div class="col-md-9">
						<h1>Lecture/In-Class Exercises</h1>
						<p>
							This session is all about <a href="http://wordpress.org">WordPress</a>. Check out <a href="../../decks/intro-to-wordpress">the deck</a>.
						</p>
					</div>
					<div class="col-md-3">
						<img src="http://s.w.org/about/images/logos/wordpress-logo-notext-rgb.png" style="width:100%">
					</div>
				</section>

				<section class="section row" id="materials">
					<h1>Materials</h1>
				</section>

				
				<section class="section row" id="homework">
					<h1>Homework</h1>
					<ol>
						<li>
							Find a WP theme you like. This can be a start for your personal project for the class, your own site, or just something that tickles your fancy.
						</li>
						<li>
							Override the theme with a child theme. Make a couple of style changes.
						</li>
					</ol>
				</section>
				<section class="section row" id="goals">
					<h1>Goals</h1>
					<div class="col-md-9">
						<ul>
							<li>Installing WordPress</li>
							<li>Plugins vs Themes</li>
							<li>Post types: posts, pages, images, galleries, etc</li>
							<li>WP hooks: actions and filters.</li>
							<li>Overriding a theme with a child theme.</li>
							<li>Parts of a theme.</li>
							<li>Parts of a plugin.</li>
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