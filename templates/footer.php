<?php ob_start(); ?>
<hr>

<footer>
	<p>&copy; Patternleaf Design 2012</p>
</footer>

<?php app()->setFragment('HTMLBodyFooter', ob_get_clean()); ?>