<h2>First Recipe</h2>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<p>
				Type in these commands and click the button to make a pizza. The program will run each command in the order that they appear. Type them exactly as they appear, including the <code>();</code>.
			</p>
		</div>
		<div class="col-md-6">
			<ul>
				<li><code>makeCrust();</code></li>
				<li><code>spreadSauce();</code></li>
				<li><code>slicePepperoni();</code></li>
				<li><code>sliceCheese();</code></li>
			</ul>
		</div>
	</div>
	<div class="row slide">
		<p>
			Now make try making a pizza with three times as much pepperoni.
		</p>
	</div>
	<div class="row">
	<?php app()->printCommon('exercise-switcher', array(
		'instance_id' => 'first-recipe',
		'container_attributes' => 'has-solution',
		'height' => '240px',
		'source_path' => __DIR__.'/../exercises/basic-markup.php',
		'solution_path' => __DIR__.'/../exercises/first-recipe.js',
		'language' => 'javascript',
		'prompt' => '',
		'eval_button_markup' => '<button id="first-recipe-eval" class="eval">Make Pizza!</button>',
		'output_markup' => '<canvas id="first-recipe-output" class="display:block;margin:0 auto;width:200px;"></canvas>'
	));?>
	</div>
	<div class="row slide">
		<p>Try intentionally making a couple of mistakes. </p>
		<ul>
			<li>Put down the pepperoni before the crust.</li>
			<li>Intentionally mis-type a command. Type, say, <code>slidePepperoni();</code> instead of <code>slicePepperoni();</code></li>
		</ul>
		<p>What happens?</p>
	</div>
	
</div>
<?php
ob_start(); ?>
<script>
$(document).ready(function() {
	var runExample = function() {
		console.log()
		var currentEditor = $('#first-recipe').data('active-code').data('editor');
		if (currentEditor) {
			var content = currentEditor.getValue();
			var ex = function(processing) {
				var errorTriggered = false;
				var center = {
					x: 100,
					y: 100
				};
				var pepperoniLocs = [];
				var generatePepperoniLocs = function() {
					for (var i = 0; i < processing.random(10, 20); i++) {
						pepperoniLocs[i] = {
							x: center.x + processing.random(-60, 60),
							y: center.y + processing.random(-60, 60)
						};
					}
				};
				var cheeseLocs = [];
				var generateCheeseLocs = function() {
					for (var i = 0; i < processing.random(50, 80); i++) {
						cheeseLocs[i] = {
							x: center.x + processing.random(-55, 55),
							y: center.y + processing.random(-55, 55),
							r: processing.random(360) * (180 / processing.PI)
						}
					}
				};
				var makeCrust = function() {
					processing.fill(220, 200, 180);
					processing.ellipse(center.x, center.y, 180, 180);
				};
				var spreadSauce = function() {
					processing.fill(200, 120, 100);
					processing.ellipse(center.x, center.y, 160, 160);
				};
				var slicePepperoni = function() {
					generatePepperoniLocs();
					processing.fill(240, 120, 100);
					for (var i = 0; i < pepperoniLocs.length; i++) {
						processing.ellipse(
							pepperoniLocs[i].x,
							pepperoniLocs[i].y,
							10, 10
						);
					}
				};
					
				var sliceCheese = function() {
					generateCheeseLocs();
					processing.fill(240, 240, 220);
					for (var i = 0; i < cheeseLocs.length; i++) {
						processing.pushMatrix();
						processing.translate(cheeseLocs[i].x, cheeseLocs[i].y);
						processing.rotate(cheeseLocs[i].r);
						processing.rect(0, 0, 5, 13);
						processing.popMatrix();
					}
				};

				processing.setup = function() {
					processing.size(200, 200);
					processing.noLoop();
				};
				processing.draw = function() {
					processing.background(230);
					try {
						if (!errorTriggered) {
							eval(content);
						}
					}
					catch (e) {
						errorTriggered = true;
						alert('Oops! The computer couldn\'t understand your recipe.');
					}
				};
			};
			$('#first-recipe-output').replaceWith('<canvas id="first-recipe-output">');
			var $canvas = $('#first-recipe-output');
			var processingInstance = new Processing($canvas.get(0), ex);
		}
		return false;
	};
	$('button#first-recipe-eval').click(runExample);
	runExample();
});
</script>
<?php
app()->appendTo('HTMLBodyTail', ob_get_clean());
?>