<?php 
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web');
ob_start();
?>
	<!-- Main hero unit for a primary marketing message or call to action -->
	<div class="container">
		<div class="jumbotron homepage">
			<h1>Intro to Programming for the Web</h1>
			<p><a href="http://www.boulderdigitalarts.com/training/details.php?offering=253">Web Application Development Transitions Certificate</a> | <strong class="color-highlight">Boulder Digital Arts</strong> </p>
			<p><small>Winter 2014 Edition</small></p>
		</div>

		<!-- Example row of columns -->
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>Welcome!</h3>
				<p>
					This site will be your repository for wonder and magic&mdash;well, ok: lecture slides&mdash;as we work through the 5-week course. The site is a work-in-progress, and the course will adapt as we go, so please pardon any dust! Use the links below or in the header to find what you need.
				</p>
			</div>
			<div class="col-md-6">
				<img class="img-thumbnail" src="<?php echo STATIC_URL;?>/img/code-bokeh.png" style="width:100%">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<h2><a href="/sessions">Sessions</a> <a class="btn btn-success" href="/sessions" role="button">Go &raquo;</a></h2>
				<p>Slides and links by session.</p>
			</div>
			<div class="col-md-3">
				<h2><a href="/decks">Decks</a> <a class="btn btn-success" href="/decks" role="button">Go &raquo;</a></h2>
				<p>All the slide decks.</p>
			</div>
			<div class="col-md-3">
				<h2><a href="/exercises">Exercises</a> <a class="btn btn-success" href="/exercises" role="button">Go &raquo;</a></h2>
				<p>Yay! Homework.</p>
			</div>
			<div class="col-md-3">
				<h2><a href="/resources">Resources</a> <a class="btn btn-success" href="/resources" role="button">Go &raquo;</a></h2>
				<p>Handy links.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<h4><a href="/contact">Contact</a></h4>
			</div>
			<div class="col-md-3">
				<h4><a href="/about">About</a></h4>
			</div>
			<div class="col-md-6">
			</div>

		</div>
	</div>

<?php app()->setFragment('HTMLBodyContent', ob_get_clean()); ?>