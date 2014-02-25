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
	<!--
	<link rel="stylesheet" media="screen" href="<?php echo STATIC_URL; ?>js/deck.js/themes/style/swiss.css">
	-->
		
	<!-- Transition theme. More available in /themes/transition/ or create your own. -->
	<link rel="stylesheet" media="screen" href="<?php echo STATIC_URL; ?>js/deck.js/themes/transition/horizontal-slide.css">

	<!-- Basic black and white print styles -->
	<link rel="stylesheet" media="print" href="<?php echo STATIC_URL; ?>js/deck.js/core/print.css">

	<!-- Required Modernizr file -->
	<script src="<?php echo STATIC_URL; ?>js/deck.js/modernizr.custom.js"></script>

	<?php if (DEVELOP) : ?>
		<link rel="stylesheet/less" href="<?php echo STATIC_URL; ?>less/styles.less?<?php echo rand(); ?>" type="text/css">
		<script src="<?php echo STATIC_URL; ?>js/less-1.6.3.min.js" type="text/javascript"></script>
	<?php else : ?>
		<link rel="stylesheet" href="/css/styles.css" type="text/css">
	<?php endif; ?>

</head>
<body class="deck">
	<?php
	?>
	
	<div class="navbar navbar-inverse navbar-static-top">
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
					<li><a href="/sessions">Sessions</a></li>
					<li class="active"><a href="/decks">Decks</a></li>
					<li><a href="/exercises">Exercises</a></li>
					<li><a href="/resources">Resources</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/contact">Contact</a></li>
					<li><a href="/about">About</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="deck-style-container">
		<div class="deck-container">

		<!-- Begin slides. Just make elements with a class of slide. -->

		<?php
		if (empty($slides_dir)) {
			$slides_dir = '/slides';
		}
		$dir = new DirectoryIterator($slides_dir);
		$filenames = array();
		foreach ($dir as $fileinfo) {
			if (!$fileinfo->isDot() && !$fileinfo->isDir() && !(strpos($fileinfo->getFilename(), '.') == 0)) {
				$filenames[] = $fileinfo->getFilename();
			}
		}
		natsort($filenames);
		foreach ($filenames as $name) {
			echo '<section class="slide"><!--'.$name.'-->';
			include $slides_dir.'/'.$name;
			echo '</section>';
		}
		/*
		foreach ($dir as $fileinfo) {
			if (!$fileinfo->isDot() && !$fileinfo->isDir() && !(strpos($fileinfo->getFilename(), '.') == 0)) {
				echo '<section class="slide"><!--'.$fileinfo->getFilename().'-->';
				include $slides_dir.'/'.$fileinfo->getFilename();
				echo '</section>';
		    }
		}
		*/

		if (is_array($next_deck) && !empty($next_deck)) {
			echo '
				<section class="slide">
					<h1>
						Next Deck<br>
						<small>
							<a href="'.$next_deck['url'].'">'.$next_deck['title'].' <span class="glyphicon glyphicon-circle-arrow-right"></span>
							</a>
						</small>
					</h1>

				</section>
			';
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
	
	<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/ace/ace.js"></script>

	<!-- Initialize the deck. You can put this in an external file if desired. -->
	<script>
		$(function() {
			$.deck('.slide');

			$('.answer-container').click(function() {
				$(this).toggleClass('revealed').children().slideToggle();
			});
			
			$('.pretty-code').each(function() {
				var $input = $(this);
				var inputId = $input.attr('id');
				var editor = ace.edit(inputId);
				editor.setTheme("ace/theme/xcode");
				var lang = $(this).data('language') || 'javascript';
				editor.getSession().setMode("ace/mode/" + lang);
				editor.setBehavioursEnabled(false);
				$input.data('editor', editor);
				if ($(this).hasClass('non-editable')) {
					editor.setReadOnly(true);
				}
			});
		
			$('.line-highlighter').each(function() {
				$(this).on('click', function() {
					var $target = $('#' + $(this).data('target'));
					if ($target.length) {
						var editor = $target.data('editor');
						editor.gotoLine($(this).data('line'));
					}
					return false;
				});
			});
			
			/* exercise stuff */
			
			$('.live-exercise').each(function() {
				var $exercise = $(this);
				var $userCode = $exercise.find('.user-code');
				var $solutionCode = $exercise.find('.solution-code')
				var $target = $exercise.find('.output-target');
				
				var updateOutput = function() {
					if ($target.length) {
						var editor = $exercise.data('active-code').data('editor');
						if (editor) {
							$target.contents().find('html').html(editor.getValue());
						}
					}
				};
				
				$exercise.data('active-code', $userCode);
				$exercise.find('button.switcher-user').addClass('active');
				$exercise.find('.exercise-switcher').on('click', 'button', function(event) {
					if ($(event.target).hasClass('switcher-user')) {
						$solutionCode.hide();
						$userCode.show();
						$exercise.data('active-code', $userCode);
						updateOutput();
					}
					else {
						$userCode.hide();
						$solutionCode.show();
						$exercise.data('active-code', $solutionCode);
						updateOutput();
					}
					$exercise.find('button').removeClass('active');
					$(event.target).addClass('active');
				});
				$solutionCode.hide();
				if ($target.length) {
					$exercise.find('.pretty-code').each(function() {
						var editor = $(this).data('editor');
						if (editor) {
							editor.on('change', updateOutput);
						}
					});
					updateOutput();
				}
			});
			
			
			/* resize deck to account for bootstrap header */
			var sizeDeckContainer = function() {
				$('.deck-container').css('min-height', $(window).innerHeight() - $('.navbar-static-top').outerHeight());
				console.log($(window).innerHeight() - $('.navbar-static-top').outerHeight());
			};
			
			$(window).on('resize', sizeDeckContainer);
			sizeDeckContainer();
		});
	</script>
	<?php app()->renderFragment('HTMLBodyTail'); ?>
</body>
</html>
<?php app()->setFragment('HTMLPage', ob_get_clean()); ?>