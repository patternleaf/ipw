<?php
	$slides_dir = __DIR__.'/slides';
	// $next_deck = array(
	// 	'title' => 'Intro to Procedural Programming',
	// 	'url' => 'intro-to-procedural'
	// );
	ob_start();
?>
<script src="<?php echo STATIC_URL; ?>/js/processing-1.4.1.min.js"></script>

<script src="<?php echo STATIC_URL; ?>js/romano/dependencies/raphael-1.3.2.js"></script>
<script src="<?php echo STATIC_URL; ?>js/romano/classes/Romano.js"></script>
<script src="<?php echo STATIC_URL; ?>js/romano/classes/Sprite.js"></script>
<script src="<?php echo STATIC_URL; ?>js/romano/classes/Surface.js"></script>
<script src="<?php echo STATIC_URL; ?>js/romano/classes/Renderer.js"></script>
<script src="<?php echo STATIC_URL; ?>js/romano/classes/RaphaelSurface.js"></script>
<script src="<?php echo STATIC_URL; ?>js/romano/classes/RaphaelRenderer.js"></script>
<script src="<?php echo STATIC_URL; ?>js/romano/classes/Viewport.js"></script>

<script src="<?php echo STATIC_URL; ?>js/karel/karel.js"></script>
<script src="<?php echo STATIC_URL; ?>js/karel/classes/Karel.js"></script>
<script src="<?php echo STATIC_URL; ?>js/karel/classes/Cheese.js"></script>

<script src="<?php app()->contentWD();?>/slides/js/karel-exercises.js"></script>
<?php 
	app()->appendTo('HTMLBodyTail', ob_get_clean());
?>