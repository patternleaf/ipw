<?php ob_start(); ?>
<?php
function echoActiveClassFor($slug) {
	if ($slug == app()->getCurrentPathSlug()) {
		echo 'class="active"';
	}
}
?>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="/">Intro to Web Programming</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li <?php echoActiveClassFor('sessions'); ?>><a href="/sessions">Sessions</a></li>
					<li <?php echoActiveClassFor('resources'); ?>><a href="/resources">Resources</a></li>
					<!--
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sessions <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li class="nav-header">Nav header</li>
							<li><a href="#">Separated link</a></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>
					-->
					<li <?php echoActiveClassFor('contact'); ?>><a href="/contact">Contact</a></li>
					<li <?php echoActiveClassFor('about'); ?>><a href="/about">About</a></li>
				</ul>
				<!--
				<form class="navbar-form pull-right">
					<input class="span2" type="text" placeholder="Email">
					<input class="span2" type="password" placeholder="Password">
					<button type="submit" class="btn">Sign in</button>
				</form>
				-->
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>

<?php app()->setFragment('HTMLBodyHeader', ob_get_clean()); ?>