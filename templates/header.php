<?php ob_start(); ?>
<?php
function echoActiveClassFor($slug) {
	if ($slug == app()->getCurrentPathSlug()) {
		echo 'class="active"';
	}
}
?>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".default-header-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="../" class="navbar-brand">Intro to Programming For the Web</a>
		</div>
		<nav class="navbar-collapse collapse default-header-navbar-collapse" role="navigation">
			<ul class="nav navbar-nav">
				<li <?php echoActiveClassFor('sessions'); ?>><a href="/sessions">Sessions</a></li>
				<li <?php echoActiveClassFor('decks'); ?>><a href="/decks">Decks</a></li>
				<li <?php echoActiveClassFor('exercises'); ?>><a href="/exercises">Exercises</a></li>
				<li <?php echoActiveClassFor('resources'); ?>><a href="/resources">Resources</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li <?php echoActiveClassFor('contact'); ?>><a href="/contact">Contact</a></li>
				<li <?php echoActiveClassFor('about'); ?>><a href="/about">About</a></li>
			</ul>
		</nav>
	</div>
</div>

<?php app()->setFragment('HTMLBodyHeader', ob_get_clean()); ?>