<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Web Programming: Session 1');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 1</h1>
			<p class="lead">Computers Do What You Tell Them To Do</p>
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
					<p>
						Our first lesson is surprisingly difficult to accept! They are frustrating, mysterious, and clearly obsessed with foiling all of our plans, but actually computers do only and precisely what you (or rather, you plus the engineers who designed them) tell them to do. To get our feet wet we start with a little graphical programming and are introduced to our Javascript-based version of the Karel programming environment.
					</p>
					
				</section>
				<section id="recipes">
					<h1>Recipes</h1>
					<p>
						Computers follow instructions as if they were following a recipe. That is, they read the first instruction, follow it, then read the next instruction, and follow it. The good news is that they're really good at following instructions in a precise manner. The bad news is that they're really good at following instructions in <em>only</em> a precise manner. They have no notion of the larger picture. You can tell them you're writing a recipe for pizza, but they have no idea what pizza is, so they have no way to tell if they're doing it right.
					</p>
				</section>
				<section class="exercise" id="exercise-1">
					<h1>A Quick Recipe</h1>
					<p>
						Type in the commands below to make a pizza. The program will run each command in the order that they appear. Try the commands in different orders or try leaving out commands to see how the computer interprets it. Remember to end each command with <code>();</code>.
					</p>
					<ul>
						<li><code>makeCrust();</code></li>
						<li><code>spreadSauce();</code></li>
						<li><code>slicePepperoni();</code></li>
						<li><code>sliceCheese();</code></li>
					</ul>
					<div class="row live-exercise">
						<div class="span4">
							<div class="code-container" style="height:200px; width:100%;">
								<div id="exercise-1-input" class="pretty-code" style="height:200px; width:100%;">makeCrust();
spreadSauce();
slicePepperoni();
sliceCheese();</div>
							</div>
							<button id="exercise-1-eval" class="eval">Make It!</button>
						</div>
						<div class="span5">
							<canvas id="exercise-1-output"></canvas>
						</div>
						<style type="text/css" media="screen">
							#exercise-1-output {
								display:block;
								margin:0 auto;
								width:200px;
							}
						</style>
					</div>
					<p>
						When you make a pizza, the order in which you put the ingredients down is important. The crust must come first, or else the sauce will run everywhere on the counter. Now, the computer doesn't have any idea that what you're trying to do here is make a pizza. All it "knows" about is how to lay down sauce, how to slice pepperoni, and so on. So you are free here to make something that isn't pizza-like at all.
					</p>
					<p>
						Try moving the <code>spreadSauce()</code> command so that it runs first. What happens?
					</p>
					<div class="answer-container">
						<p>
							The sauce goes down first, and then the crust goes down <em>on top of</em> the crust. Not very useful, is it?
						</p>
						<p>Now, it <em>looks</em> like the sauce is no longer being made, but actually it is. To convince yourself of this, try removing the <code>makeCrust</code> command and running the program again.
						</p>
					</div>
					<p>
						Now try slicing a lot of cheese. That is, repeat the command <code>sliceCheese();</code> many times. Say, 10 or so. What happens?
					</p>
					<div class="answer-container">
						<p>
							Lots of cheese! (Which is never a bad thing.) Computers can't grasp the bigger picture, but they are tireless in the face of repetitive manual labor.
						</p>
					</div>
				</section>
				<section id="recipes-within-recipes">
					<h1>Recipes Within Recipes</h1>
					<p>
						Now of course when we say "make" a pizza here what we mean is "draw" a pizza. But the computer, it turns out, doesn't even know how to do that. What it's actually doing is just is drawing ovals and rectangles of various colors. The command <code>spreadSauce();</code> doesn't mean anything inherently to the computer. What's going on is that you're not talking directly to the computer. These commands are actually recipes in and of themselves. Let's take a look at the recipe for <code>spreadSauce()</code>.
					</p>
					<div class="row live-example">
						<div class="code-container" style="height:100px; width:100%;">
							<div id="example-1-input" class="pretty-code non-editable" style="height:100px; width:100%;">function spreadSauce() {
	fill(200, 120, 100);
	ellipse(100, 100, 160, 160);
}
</div>
						</div>
					</div>
					<p>
						Don't worry about <code>function</code>, the parentheses, and what-not. This recipe has two commands, and they come in-between the curly braces, <code>{</code> and <code>}</code>. 
					</p>
					<p>
						The first command is <code>fill</code>. This tells the computer to pick a color to use. The color is determined by the numbers in-between the parentheses. If you know HTML, CSS, or Photoshop, you know that colors can be defined by numbers. In this case, it's defining a 24-bit RGB color. Each of the three numbers can be between 0 and 255, defining red, green, and blue, respectively. (So, in CSS notation, what would <code>rgb(200, 120, 100)</code> be?)
					</p>
					<div class="answer-container">
						<div style="display:block-inline; width:20px; height:20px; background-color:rgb(200, 120, 100); float:right; margin:10px 400px 0 0;"></div>
						<p>
							The color of a tasty red tomato sauce, of course.
						</p>
					</div>
					<p>
						The second command is <code>ellipse</code>. This tells the computer to draw an ellipse, and the numbers in parentheses tell it where to draw it and how big to draw it. In this case the ellipse is drawn at (100, 100) pixels and is 160 pixels wide and 160 pixels high.
					</p>
					<p>
						The result of these two commands?
					</p>
					<figure>
						<canvas width="200" height="200" data-processing-sources="<?php app()->contentWD(); ?>red-sauce.pde" style="width:200px; margin:0 auto; display:block;">
						</canvas>
						<figcaption>Red sauce! Ok, it's actually just a red circle.</figcaption>
					</figure>
					<p>
						Now, despite all evidence to the contrary, it turns out that the computer <em>also</em> doesn't know how to pick a color, draw an ellipse, or even draw at all. Worse than that, it has no notion of a screen, a trackpad, audio, video, web pages, the internet, or anything at all that we use computers for.
					</p>
					<p>
						I cannot emphasize this enough: <strong>computers are dumb</strong>.
					</p>
					<p>
						Yet, computers do all this stuff. (Well, except when you're giving a presentation or submitting something at the last minute, when they suddenly don't do anything.) How does this work? It's a bunch of recipes. The trick is that the recipes are layered, or nested, one within another. If we return to the idea of making a pizza in real life, our recipe is something like what we have above. In English:
					</p>
					<ol>
						<li>Make the crust</li>
						<li>Spread some sauce on the crust</li>
						<li>Slice some pepperoni on top</li>
						<li>Grate cheese liberally</li>
						<li>Bake for 20 minutes</li>
					</ol>
					<p>
						As well-adjusted humans, we can follow these instructions without much trouble. But let's think about what goes into spreading the sauce. In fact we might buy some pre-made sauce from the store. 
					</p>
					<table>
						<thead>
							<th>Layers</th>
						</thead>
						<tbody>
							<tr>
								<td></td>
							</tr>
						</tbody>
					</table>
				</section><!-- /recipes-within-recipes -->
				<section id="meet-karel">
					<h1>Meet Karel</h1>
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
		
		// bootstrap's affix kinda sucks
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
	$(document).ready(function() {
		var runExample = function() {
			var editor = $('#exercise-1-input').data('editor');
			if (editor) {
				var content = editor.getValue();
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
				$('#exercise-1-output').replaceWith('<canvas id="exercise-1-output">');
				var $canvas = $('#exercise-1-output');
				var processingInstance = new Processing($canvas.get(0), ex);
			}
			return false;
		};
		$('button#exercise-1-eval').click(runExample);
		runExample();
	});
</script>
<?php
app()->appendTo('HTMLBodyTail', ob_get_clean());
?>