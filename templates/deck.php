<?php ob_start(); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=1024, user-scalable=no">

	<?php app()->renderHTMLHead(); ?>

	<!-- Required stylesheet -->
	<link rel="stylesheet" href="<?php echo STATIC_URL; ?>js/deck.js/core/deck.core.css">

	<!-- Extension CSS files go here. Remove or add as needed. -->
	<link rel="stylesheet" media="screen" href="<?php echo STATIC_URL; ?>js/deck.js/extensions/goto/deck.goto.css">
	<link rel="stylesheet" media="screen" href="<?php echo STATIC_URL; ?>js/deck.js/extensions/menu/deck.menu.css">
	<link rel="stylesheet" media="screen" href="<?php echo STATIC_URL; ?>js/deck.js/extensions/navigation/deck.navigation.css">
	<link rel="stylesheet" media="screen" href="<?php echo STATIC_URL; ?>js/deck.js/extensions/status/deck.status.css">
	<link rel="stylesheet" media="screen" href="<?php echo STATIC_URL; ?>js/deck.js/extensions/hash/deck.hash.css">
	<link rel="stylesheet" media="screen" href="<?php echo STATIC_URL; ?>js/deck.js/extensions/scale/deck.scale.css">

	<!-- Style theme. More available in /themes/style/ or create your own. -->
	<link rel="stylesheet" media="screen" href="<?php echo STATIC_URL; ?>js/deck.js/themes/style/swiss.css">

	<!-- Transition theme. More available in /themes/transition/ or create your own. -->
	<link rel="stylesheet" media="screen" href="<?php echo STATIC_URL; ?>js/deck.js/themes/transition/horizontal-slide.css">

	<!-- Basic black and white print styles -->
	<link rel="stylesheet" media="print" href="<?php echo STATIC_URL; ?>js/deck.js/core/print.css">

	<!-- Required Modernizr file -->
	<script src="<?php echo STATIC_URL; ?>js/deck.js/modernizr.custom.js"></script>

	<!-- prettyprint -->
	<link href="<?php echo STATIC_URL; ?>js/google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/google-code-prettify/prettify.js"></script>
	
	<link rel="stylesheet" media="screen" href="<?php echo STATIC_URL; ?>css/di.css">
</head>
<body>
	<div class="deck-container">

	<!-- Begin slides. Just make elements with a class of slide. -->

	<?php
	$dir = new DirectoryIterator($slides_dir);
	foreach ($dir as $fileinfo) {
	    if (!$fileinfo->isDot() && !$fileinfo->isDir() && !(strpos($fileinfo->getFilename(), '.') == 0)) {
	        echo '<section class="slide"><!--'.$fileinfo->getFilename().'-->';
			include $slides_dir.'/'.$fileinfo->getFilename();
			echo '</section>';
	    }
	}
	?>

	<!-- End slides. -->

	<!-- Begin extension snippets. Add or remove as needed. -->

	<!-- deck.navigation snippet -->
	<a href="#" class="deck-prev-link" title="Previous">&#8592;</a>
	<a href="#" class="deck-next-link" title="Next">&#8594;</a>

	<!-- deck.status snippet -->
	<p class="deck-status">
		<span class="deck-status-current"></span>
		/
		<span class="deck-status-total"></span>
	</p>

	<!-- deck.goto snippet -->
	<form action="." method="get" class="goto-form">
		<label for="goto-slide">Go to slide:</label>
		<input type="text" name="slidenum" id="goto-slide" list="goto-datalist">
		<datalist id="goto-datalist"></datalist>
		<input type="submit" value="Go">
	</form>

	<!-- deck.hash snippet -->
	<a href="." title="Permalink to this slide" class="deck-permalink">#</a>

	<!-- End extension snippets. -->
	</div>

<!-- Required JS files. -->
<script src="<?php echo STATIC_URL; ?>js/deck.js/jquery.min.js"></script>
<script src="<?php echo STATIC_URL; ?>js/deck.js/core/deck.core.js"></script>

<!-- Extension JS files. Add or remove as needed. -->
<script src="<?php echo STATIC_URL; ?>js/deck.js/core/deck.core.js"></script>
<script src="<?php echo STATIC_URL; ?>js/deck.js/extensions/hash/deck.hash.js"></script>
<script src="<?php echo STATIC_URL; ?>js/deck.js/extensions/menu/deck.menu.js"></script>
<script src="<?php echo STATIC_URL; ?>js/deck.js/extensions/goto/deck.goto.js"></script>
<script src="<?php echo STATIC_URL; ?>js/deck.js/extensions/status/deck.status.js"></script>
<script src="<?php echo STATIC_URL; ?>js/deck.js/extensions/navigation/deck.navigation.js"></script>
<script src="<?php echo STATIC_URL; ?>js/deck.js/extensions/scale/deck.scale.js"></script>

<!-- Initialize the deck. You can put this in an external file if desired. -->
<script>
	$(function() {
		$.deck('.slide');
		prettyPrint();
	});
</script>
</body>
</html>
<?php app()->setFragment('HTMLPage', ob_get_clean()); ?>