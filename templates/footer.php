<?php ob_start(); ?>

<footer class="footer-inverse">
	<div class="container"><p>&copy; 2014 <a href="http://patternleaf.com">patternleaf</a></p></div>
</footer>

<?php app()->setFragment('HTMLBodyFooter', ob_get_clean()); ?>