<?php 
	app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Sessions');
	app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
	ob_start();
?>
	<div class="jumbotron">
		<div class="container"><h1>Sessions</h1></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<ul class="nav nav-tabs nav-stacked" id="sidebar-nav">
					<li><a href="#session-1">Session 1</a></li>
					<li><a href="#session-2">Session 2</a></li>
					<li><a href="#session-3">Session 3</a></li>
					<li><a href="#session-4">Session 4</a></li>
					<li><a href="#session-5">Session 5</a></li>
					<li><a href="#session-6">Session 6</a></li>
					<li><a href="#session-7">Session 7</a></li>
					<li><a href="#session-8">Session 8</a></li>
					<li><a href="#session-9">Session 9</a></li>
					<li><a href="#session-10">Session 10</a></li>
				</ul>
			</div>
			<div class="col-md-9 session-list">
				<section id="session-1">
					<h1>
						<a href="1">Session 1</a><br>
						<small>Introductions; HTML/CSS Review</small>
						<a class="btn btn-default" href="/sessions/1" role="button">Go &raquo;</a>
					</h1>
					<p>
						Presentation vs content. Environment setup.
					</p>
				</section>
				<section id="session-2">

					<h1>
						<a href="2">Session 2</a><br>
						<small>Intro to Procedural Programming</small>
					</h1>

					<p>
						Karel the Robot. Decomposition, abstraction, thinking like a programmer.
					</p>
				</section>
				<section id="session-3">

					<h1>
						<a href="3">Session 3</a><br>
						<small>PHP: Variables, Arrays, Form Input</small>
					</h1>
					<p>
						Continued concepts in procedural programming. Forms and PHP. Simple guestbook.
					</p>
				</section>
				<section id="session-4">

					<h1>
						<a href="4">Session 4</a><br>
						<small>More on forms and PHP. File i/o.</small>
					</h1>

					<p>
						Data formats, error conditions. JSON-based Guestbook.
					</p>
				</section>
				<section id="session-5">

					<h1>
						<a href="5">Session 5</a><br>
						<small>JSON, APIs, Sanitization and Validation</small>
					</h1>

				</section>
				<section id="session-6">

					<h1>
						Session 6<br>
						<small>Object-Oriented Programming; jQuery; WordPress</small>
					</h1>
					<p>
						Paginated Guestbook. WordPress installation and configuration. Make a child theme.
					</p>
				</section>
				<section id="session-7">
					<h1>
						Session 7<br>
						<small>APIs; The RESTful Web; CRUD; WordPress Hooks</small>
					</h1>
					<p>
						RESTful guestbook. WordPress plugins and themes.
					</p>
				</section>
				<section id="session-8">
					<h1>
						Session 8<br>
						<small>MVC; Asynch Communication</small>
					</h1>
					<p>
						Asynch guestbook. Topics in WordPress/jQuery.
					</p>
				</section>
				<section id="session-9">
					<h1>
						Session 9<br>
						<small>Advanced Topics; Project Workshop</small>
					</h1>
				</section>
				<section id="session-10">
					<h1>
						Session 10<br>
						<small>More Advanced Topics; Project Presentations</small>
					</h1>
				</section>

			</div>
		</div>
	</div>
<?php 
app()->setFragment('HTMLBodyContent', ob_get_clean()); 
app()->appendTo('HTMLBodyTail', '
	<script type="text/javascript" charset="utf-8">
		$(\'body\').scrollspy();
		// cause bootstrap\'s affix kinda sucks
		var sidebarOrigin = $(\'#sidebar-nav\').offset().top;
		$(window).scroll(function() {
			var $window = $(window);
			if ($window.scrollTop() > sidebarOrigin - 80) {
				$(\'#sidebar-nav\').addClass(\'affixed\');
			}
			else {
				$(\'#sidebar-nav\').removeClass(\'affixed\');
			}
		});
		
	</script>
	
');

app()->appendTo('HTMLHeadAdditions', '
	<style type="text/css" media="screen">
		.session-list section {
			border-top:1px solid #ddd;
			padding:.5em 1em 3em;
			margin:0;
		}
		.session-list section:nth-child(even) {
			background:#f8f8f8;
		}
	</style>
');

?>