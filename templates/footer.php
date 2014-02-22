<?php ob_start(); ?>
<hr>

<footer>
	<p>&copy; 2014 patternleaf</p>
</footer>

<?php app()->setFragment('HTMLBodyFooter', ob_get_clean()); ?>