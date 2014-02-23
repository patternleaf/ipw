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
					<li><h3>Introductions</h3></li>
					<li><h3>Programming as Recipes</h3></li>
					<li><h3>HTML/CSS Review</h3></li>
					<li><h3>Intro to Karel</h3></li>
				</ul>
			</div>
			<div class="col-md-3">
				<!--
				<ul class="nav nav-tabs nav-stacked affix" id="sidebar-nav">
					<li><a href="#introductions">Introductions</a></li>
					<li><a href="#recipes">Programming as Recipes</a></li>
					<li><a href="#karel-1">Intro to Karel</a></li>
				</ul>
				-->
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