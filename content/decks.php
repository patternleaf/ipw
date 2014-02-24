<?php 
	app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Decks');
	app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
	ob_start();
?>
	<div class="jumbotron">
		<div class="container"><h1>Decks</h1></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<ul>
					<li><h3><a href="/decks/introductions">Introductions</a></h3></li>
					<li><h3><a href="/decks/environment-setup">Environment Setup</a></h3></li>
					<li><h3><a href="/decks/html-css-review">HTML/CSS Review</a></h3></li>
					<li><h3><a href="/decks/html-css-review">Intro to Procedural Programming</a></h3></li>
				</ul>
			</div>
			<div class="col-md-3">
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