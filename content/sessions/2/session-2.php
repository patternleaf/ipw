<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Web Programming: Session 2');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<img src="<?php app()->contentWD(); ?>cheese.svg" style="width:200px; float:right;">
			<h1>Session 2</h1>
			<p class="lead">Decomposition, Iteration, Numbers, and Conditions</p>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="span3 session-sidebar">
				<ul class="nav nav-tabs nav-stacked" id="sidebar-nav">
				</ul>
			</div>
			<div class="span9 session-content">
				<section id="intro" class="first">
					<blockquote class="pull-right first">
						<p>Problem solving is the essence of programming; the rules are just a minor concern along the way.</p>
						<small>
							<a href="http://www.stanford.edu/class/cs106a/handouts/karel-the-robot-learns-java.pdf">Karel the Robot Learns Java</a>, [PDF], from Stanford University's <a href="http://www.stanford.edu/class/cs106a/">CS106a</a> Online Course Handouts.
						</small>
					</blockquote>
					<p style="clear:both;">
						Our second session introduces a few fundament matters of programming: decomposition, data types, and iteration.
					</p>
				</section>
				<section id="recipes" style="clear:both;">
					<h1>Decomposition</h1>
					<p>
					</p>
				</section>
			</div>
		</div>
	</div>

<?php 
app()->setFragment('HTMLBodyContent', ob_get_clean()); 

ob_start();
?>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/processing-1.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/ace/ace.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		
		$('.session-content section').each(function() {
			var $section = $(this);
			if ($section.attr('id') && $section.find('h1').length) {
				$('#sidebar-nav').append('\
					<li><a href="#' + $(this).attr('id') + '">' + $(this).find('h1').html() + '</a></li>\
				');
			}
		});
		
		$('body').scrollspy();
		$('.answer-container').click(function() {
			$(this).toggleClass('revealed').children().slideToggle();
		});
		
		// cause bootstrap's affix kinda sucks
		var sidebarOrigin = $('#sidebar-nav').offset().top;
		$(window).scroll(function() {
			var $window = $(window);
			if ($window.scrollTop() > sidebarOrigin - 80) {
				$('#sidebar-nav').addClass('affixed');
			}
			else {
				$('#sidebar-nav').removeClass('affixed');
			}
		});
		
		$('.pretty-code').each(function() {
			var $input = $(this);
			var inputId = $input.attr('id');
			var editor = ace.edit(inputId);
			editor.setTheme("ace/theme/xcode");
			editor.getSession().setMode("ace/mode/javascript");
			$input.data('editor', editor);
			if ($(this).hasClass('non-editable')) {
				editor.setReadOnly(true);
			}
		});
	});
</script>
<script type="text/javascript" charset="utf-8" src="<?php app()->contentWD(); ?>exercise-1.js"></script>

<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/romano/dependencies/raphael-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/romano/classes/Romano.js"></script>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/romano/classes/Sprite.js"></script>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/romano/classes/Surface.js"></script>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/romano/classes/Renderer.js"></script>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/romano/classes/RaphaelSurface.js"></script>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/romano/classes/RaphaelRenderer.js"></script>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/romano/classes/Viewport.js"></script>

<script type="text/javascript" charset="utf-8" src="<?php echo STATIC_URL; ?>js/karel/karel.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo STATIC_URL; ?>js/karel/classes/Karel.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo STATIC_URL; ?>js/karel/classes/Cheese.js"></script>

<script type="text/javascript" charset="utf-8" src="<?php app()->contentWD(); ?>exercise-2.js"></script>

<?php
app()->appendTo('HTMLBodyTail', ob_get_clean());
?>