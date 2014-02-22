<?php 
app()->setFragment('HTMLTitle', 'Intro to Web Programming');
ob_start();
?>
	<!-- Main hero unit for a primary marketing message or call to action -->
	<div class="container">
		<div class="jumbotron homepage">
			<h1>Intro to Programming for the Web</h1>
			<p>Web Application Development Transitions Certificate | <strong class="color-highlight">Boulder Digital Arts</strong> </p>
			<p><small>Winter 2014 Edition</small></p>
		</div>

		<!-- Example row of columns -->
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>Welcome!</h3>
				<p>
					This site will be your repository for wonder and magic&mdash;or at least lecture slides&mdash;as we work through the 5-week course. It's a work-in-progress, so please pardon the dust!
				</p>
			</div>
			<div class="col-md-6">
				<img class="img-thumbnail" src="<?php echo STATIC_URL;?>/img/code-bokeh.png" style="width:100%">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<h2><a href="/sessions">Sessions</a></h2>
				<p>Slides and links by session.</p>
				<p><a class="btn btn-default" href="/sessions" role="button">Go &raquo;</a></p>
			</div>
			<div class="col-md-3">
				<h2><a href="/topics">Topics</a></h2>
				<p>Slides broken out by topic.</p>
				<p><a class="btn btn-default" href="/topics" role="button">Go &raquo;</a></p>
			</div>
			<div class="col-md-3">
				<h2><a href="/exercises">Exercises</a></h2>
				<p>Materials for exercises</p>
				<p><a class="btn btn-default" href="/exercises" role="button">Go &raquo;</a></p>
			</div>
			<div class="col-md-3">
				<h2><a href="/resources">Resources</a></h2>
				<p>Handy links.</p>
				<p><a class="btn btn-default" href="/resources" role="button">Go &raquo;</a></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
			</div>
			<div class="col-md-3">
				<h4><a href="/contact">Contact</a></h4>
			</div>
			<div class="col-md-3">
				<h4><a href="/about">About</a></h4>
			</div>
		</div>
		<small>Photo credits: <a href="http://www.flickr.com/photos/26782864@N00/4782904694">William Warby</a>, <a href="http://www.flickr.com/photos/iamshinji/3063220244/">Dino Latoga</a></small>
	</div>

<?php app()->setFragment('HTMLBodyContent', ob_get_clean()); ?>