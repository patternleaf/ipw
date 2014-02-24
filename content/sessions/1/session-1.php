<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Session 1');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
include_once(__DIR__.'/../common.php');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 1</h1>
			<p class="lead">Introductions; HTML/CSS Review</p>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-md-3 session-sidebar">
				<ul class="nav nav-tabs nav-stacked" id="sidebar-nav">
				</ul>
			</div>
			<div class="col-md-9 session-content">
				<h2 id="decks">Decks</h2>
				<p>
					Lecture/reading content for this session is found in the <a href="/decks">decks</a>. Refer to <a href="/sessions/#session-1">the session overview</a>.
				</p>
				<h2 id="homework">Homework</h2>
				<p>
					The first session is about getting our environment setup and reviewing HTML and CSS. For these two exercises, use your HTTP server environment.
				</p>
				<h3>Moby Dick</h3>
				<p>
					
				<h3>Pizza Recipe</h3>
				
				
			</div>
		</div>
	</div>

<?php 
app()->setFragment('HTMLBodyContent', ob_get_clean()); 

appendSessionBodyTail();
