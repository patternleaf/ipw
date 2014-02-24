<?php 
	app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Sessions');
	app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
	ob_start();
?>
	<div class="jumbotron">
		<div class="container"><h1>Sessions</h1></div>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="col-md-3">
				<ul class="nav nav-tabs nav-stacked affix" id="sidebar-nav">
					<li><a href="#session-1">Session 1</a></li>
					<li><a href="#session-2">Session 2</a></li>
					<li><a href="#session-3">Session 3</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				<section id="session-1">
					<div class="page-header">
						<h1>
							<a href="/sessions/1">Session 1</a><br>
							<small>Introductions; HTML/CSS Review</small>
						</h1>
					</div>
					<h3>Decks</h3>
					<ul class="session-links">
						<li><a href="/decks/introductions">Deck: Introductions</a></li>
						<li><a href="/decks/environment-setup">Deck: Environment Setup</a></li>
						<li><a href="/decks/html-css-review">Deck: HTML/CSS Review</a></li>
					</ul>
					<h3>Reading</h3>
					<ul>
						<li><a href="http://programmers.stackexchange.com/a/46760">Things to know and look for before making your site public</a> on Stack Overflow.
						</li>
						<li><a href="http://learnpythonthehardway.org/book/intro.html">The Hard Way is Easier</a> (beginner programming wisdom)
						</li>
					</ul>
					<h3>Homework</h3>
					<ol>
						<li>Markup Moby Dick</li>
						<li>Style the pizza recipe</li>
					</ol>
				</section>
				
				<section id="session-2">
					<div class="page-header">
						<h1>Session 2</h1>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</section>
				<section id="session-3">
					<div class="page-header">
						<h1>Session 3</h1>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</section>

			</div>
		</div>
	</div>
<?php 
app()->setFragment('HTMLBodyContent', ob_get_clean()); 
app()->appendTo('HTMLBodyTail', '
	<script type="text/javascript" charset="utf-8">
		$(\'body\').scrollspy();
	</script>
');

?>