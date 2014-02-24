<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Session 1');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
include_once(__DIR__.'/../common.php');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<img src="<?php app()->contentWD(); ?>cheese.svg" style="width:200px; float:right;">
			<h1>Session 1</h1>
			<p class="lead">Computers Do What You Tell Them To Do</p>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-md-3 session-sidebar">
				<ul class="nav nav-tabs nav-stacked" id="sidebar-nav">
				</ul>
			</div>
			<div class="col-md-9 session-content">
				<section id="intro" class="first">
					<blockquote class="pull-right first">
						<p>At least <a href="http://hubot.github.com/">Hubot</a> has an existential purpose. <a href="http://en.wikipedia.org/wiki/Karel_the_robot">Karel</a>'s only aim was to make me miserable.</p>
						<small>
							A CS106A veteran.
						</small>
					</blockquote>
					<p style="clear:both;">
						Our first lesson is surprisingly difficult to accept! They are frustrating, mysterious, and clearly obsessed with foiling all of our plans, but actually computers do only and precisely what you (or rather, you plus the engineers who designed them) tell them to do. To get our feet wet we start with a little graphical programming and are introduced to our Javascript-based version of the Karel programming environment.
					</p>
				</section>
				<section id="recipes" style="clear:both;">
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
						<div class="col-md-4">
							<div class="code-container" style="height:200px; width:100%;">
								<div id="exercise-1-input" class="pretty-code" style="height:200px; width:100%;">makeCrust();
spreadSauce();
slicePepperoni();
sliceCheese();</div>
							</div>
							<button id="exercise-1-eval" class="eval">Make It!</button>
						</div>
						<div class="col-md-5">
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
						Now of course when we say "make" a pizza here what we mean is "draw" a pizza. But the computer, it turns out, doesn't even know how to do that. What it's actually doing is just is drawing ovals and rectangles of various colors. The command <code>spreadSauce();</code> doesn't mean anything inherently to the computer. What's going on is that you're not talking directly to the computer. <em>These commands are actually recipes in and of themselves.</em> Let's take a look at the recipe for <code>spreadSauce()</code>.
					</p>
					<div class="row live-example">
						<div class="col-md-5">
							<div class="code-container" style="height:100px; width:100%;">
								<div id="example-1-input" class="pretty-code non-editable" style="height:100px; width:100%;">function spreadSauce() {
	fill(200, 120, 100);
	ellipse(100, 100, 160, 160);
}
</div>
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
						As well-adjusted humans, we can follow these instructions without much trouble. But let's think about what goes into spreading the sauce. <em>We</em> might just buy some pre-made sauce from the store. But a computer doesn't have a store. Step 2 <em>decomposes</em> into something ridiculous like:
					</p>
					<h4>2. Spread some sauce on the crust</h4>
					<ol>
						<li>Find tomatos</li>
						<li>Pick tomatos</li>
						<li>Find thing-that-crushes-tomatos</li>
						<li>Find bowl</li>
						<li>Carry tomatoes to thing-that-crushes-tomatos</li>
						<li>Drop tomatoes into bowl</li>
						<li>Crush tomatos</li>
						<li>Find seasonings</li>
						<li>Add seasonings to bowl</li>
						<li>etc&hellip;</li>
					</ol>
					<p>
						Though this is actually still quite generous. A computer of course wouldn't know what tomatos are, or what crushing is. So each of those steps would have to be further broken down. If it starts to sound a little silly, it is. Everything the computer does is a big-picture step which must be carried out by way of finer and finer details. We can say that all of those steps in spreading sauce are wrapped up in the "<em>abstraction</em>" of "spread the sauce on the crust". 
					</p>
					<p>
						Programming, or software design in general is a matter of finding ways to communicate effectively with the computer, and (it turns out), with other humans. Luckily, the industry is old enough that a lot of the basic abstractions like "draw an ellipse" have already been <em>implemented</em> by someone, and they are now available for us to use as <dfn>high-level abstractions</dfn>.
					</p>
					<p>
						In the next section, we'll use a few very basic "high-level abstractions" to &hellip; well, move cheese around.
					</p>
				</section><!-- /recipes-within-recipes -->
				<section id="meet-karel">
					<h1>Meet Karel</h1>
					<img style="float:right; margin-right:200px; margin-top:50px;" src="<?php app()->contentWD(); ?>gir.png">
					<blockquote>
						<p>
							<em>(Read in the voice of the movie trailer guy.)</em><br>
							In a world&hellip; <br>
							Where algorithms run rampant&hellip; <br>
							Where walls keep you from your beepers&hellip; <br>
							One robot&hellip; <br>
							Is <strong>OUT. FOR. CHEESE.</strong>
						</p>
					</blockquote>
					<p>
						This is Karel. Or at least, our version of Karel. And this is his story.
					</p>
					<blockquote style="clear:both;">
						<p>
							In the 1970s, a Stanford graduate student named Rich Pattis decided that it would be easier to teach the fundamentals of programming if students could somehow learn the basic ideas in a simple environment free from the complexities that characterize most programming languages. Drawing inspiration from the success of Seymour Papert's LOGO project at MIT, Rich designed an introductory programming environment in which students teach a robot to solve simple problems. <a href="http://en.wikipedia.org/wiki/Karel_the_robot">That robot was named Karel</a>, after the Czech playwright <a href="http://en.wikipedia.org/wiki/Karel_Capek">Karel Capek</a>, whose 1923 play R.U.R. (Rossum's Universal Robots) gave the word <em>robot</em> to the English language.
						</p>
						<small>
							<a href="http://www.stanford.edu/class/cs106a/handouts/karel-the-robot-learns-java.pdf">Karel the Robot Learns Java</a>, [PDF], from Stanford University's <a href="http://www.stanford.edu/class/cs106a/">CS106a</a> Online Course Handouts.
						</small>
					</blockquote>
					<p>
						Karel the Robot has a long history of teaching folks to program. We're going to leverage this, and specifically borrow aspects of the approach taken in Stanford University's CS106A course (one of the first programming courses taken by yours truly). <a href="http://www.stanford.edu/class/cs106a/">The materials for that course are largely available for free online</a> and you are encouraged to check them out. <em>This course</em> is of course a much smaller commitment than the quarter-long Stanford introductory CS course, and will avoid much of the more advanced material covered in CS106A. We will also be covering web-specific topics once we learn some of the basics of programming.
					</p>
					<p>
						The motivation for an approach like this is that programming is not so much about any specific language. It's a <em>way of thinking about problems</em> and a toolkit of patterns, methods, and strategies for solving them. The principle that binds all kinds of programming together is that computers are neurotically precise, and fantasically dumb.
					</p>
					<p>
						The strength of the Karel environment in this respect is its simplicity. Karel lives in a world with "streets" and "avenues"&mdash;a grid. The streets are numbered starting at (1, 1) at the lower left of the world, and move up from there. The world will have different dimensions at different times.
					</p>
					<figure>
						<img src="<?php app()->contentWD();?>karel-grid.png">
					</figure>
					<p>
						Karel walks these streets&hellip;these heartless streets of code. Karel's a problem-solver. You gotta problem, you come see Karel. He don't need much, but he does need you. You are actually the brains behind Karel's genius. He may be cute, but Karel's just a computer, and remember what we learned about computers.
					</p>
					<p>
						Using a very small set of commands, you'll be helping Karel in his tasks.
					</p>
					<div class="row live-exercise" id="karel-1">
						<div class="col-md-4">
							<h4>Goal</h4>
							<p>
								Using the commands <code>move();</code>, and <code>turnLeft();</code> navigate Karel to the blue dot. Try to do it all in one click of the Run button.
							</p>
							<div class="code-container" style="height:200px; width:100%;">
								<div class="pretty-code karel-input" id="karel-1-input" style="height:200px; width:100%;"></div>
							</div>
							<button class="karel-run">Run!</button>
							<button class="karel-reset">Reset</button>
						</div>
						<div class="col-md-5">
							<div class="karel-viewport"></div>
						</div>
						<style type="text/css" media="screen">
							#karel-1 .karel-viewport {
								display:block;
								margin:0 auto;
								width:400px;
								height:200px;
								margin-top:100px;
							}
						</style>
					</div>
					<p>
						In addition to streets and avenues on which Karel can travel, he may on occasion encounter a wall. Walls are impassible.
					</p>
					<p>
						By the way, fun fact: our Karel is a second-cousin twice-removed's former landlord's previous tenant to <a href="http://en.wikipedia.org/wiki/List_of_Invader_Zim_characters#GIR">GIR</a>.
					</p>

					<div class="row live-exercise" id="karel-2" style="clear:both;">
						<div class="col-md-4">
							<h4>Goal</h4>
							<p>
								Using the comands <code>move();</code> and <code>turnLeft();</code>, move Karel from the lower-left to the upper-right.
							</p>
							<div class="code-container" style="height:200px; width:100%;">
								<div class="pretty-code karel-input" id="karel-2-input" style="height:200px; width:100%;"></div>
							</div>
							<button class="karel-run">Run!</button>
							<button class="karel-reset">Reset</button>
						</div>
						<div class="col-md-5">
							<div class="karel-viewport"></div>
						</div>
						<style type="text/css" media="screen">
							#karel-2 .karel-viewport {
								display:block;
								margin:0 auto;
								width:300px;
								height:300px;
							}
						</style>
					</div>
					<p>
						What about this problem was more difficult? How did you solve it?
					</p>
					<div class="answer-container">
						<p>
							Karel has no "turnRight" command but to reach the corner, he needed to be able to turn right. Luckily, turning left three times is equivalent to turning right. You <em>cannot</em> keep this robot down.
						</p>
					</div>
					<p>
						Take note. When you try to walk through a wall, the program will raise an <dfn>error condition</dfn>. This means that the program can no longer carry on its instructions and so it stops running. If this happened to you while solving this problem, congratulations! You just wrote the first of the many, many <dfn>bugs</dfn> you will create in your career!
					</p>
					<p>
						The other thing in Karel's world are what are traditionally called <em>beepers</em>. I, however, prefer cheese.
					</p>
					<figure>
						<img src="<?php app()->contentWD(); ?>cheese.svg" style="width:300px; margin:0 auto; display:block;">
					</figure>
					<p>
						Karel does, too. Many of Karel's tasks involve picking up or putting down cheese. Don't ask why this is so important; it just is.
					</p>
					<div class="row live-exercise" id="karel-3">
						<div class="col-md-4">
							<h4>Goal</h4>
							<p>
								Using the comands <code>move();</code>, <code>pickUpCheese();</code>, and <code>putDownCheese();</code>, have Karel pick up the cheese in (2, 1) and deposit it in (3, 1). Then, have Karel move to the far lower-right corner (4, 1).
							</p>
							<div class="code-container" style="height:200px; width:100%;">
								<div class="pretty-code karel-input" id="karel-3-input" style="height:200px; width:100%;"></div>
							</div>
							<button class="karel-run">Run!</button>
							<button class="karel-reset">Reset</button>
						</div>
						<div class="col-md-5">
							<div class="karel-viewport"></div>
							<div class="karel-cheese-pouch-count"></div>
						</div>
						<style type="text/css" media="screen">
							#karel-3 .karel-viewport {
								display:block;
								margin:0 auto;
								width:300px;
								height:300px;
							}
							#karel-3 .karel-cheese-pouch-count {
								width:300px;
								margin:0 auto;
								color:#777;
								font-size:11px;
							}
						</style>
					</div>
				</section>
				<section id="cheese-collection">
					<h1>Cheese Collection</h1>
					<p>
						A slightly cheesier exercise. At the end, the world should look like this:
					</p>
					<figure>
						<img src="<?php app()->contentWD();?>cheese-end.png" style="width:300px; margin:0 auto; display:block;">
					</figure>
					<div class="row live-exercise" id="karel-4">
						<div class="col-md-4">
							<h4>Goal</h4>
							<p>
								Using the comands <code>move();</code>, <code>turnLeft();</code>, <code>pickUpCheese();</code>, and <code>putDownCheese();</code>, have Karel pick up all the cheese in the world and deposit it in the notch (4, 1). Then, have Karel move to the blue dot.
							</p>
							<div class="code-container" style="height:200px; width:100%;">
								<div class="pretty-code karel-input" id="karel-4-input" style="height:200px; width:100%;"></div>
							</div>
							<button class="karel-run">Run!</button>
							<button class="karel-reset">Reset</button>
						</div>
						<div class="col-md-5">
							<div class="karel-viewport"></div>
						</div>
						<style type="text/css" media="screen">
							#karel-4 .karel-viewport {
								display:block;
								margin:0 auto;
								width:300px;
								height:300px;
							}
						</style>
					</div>
					<p>
						Can you think of any ways to make this process a little more efficient? Are there command sequences you find yourself making repetitively?
					</p>
				</section><!-- /meet-karel -->
			</div>
		</div>
	</div>

<?php 
app()->setFragment('HTMLBodyContent', ob_get_clean()); 

appendSessionBodyTail();

ob_start();
?>
<script type="text/javascript" charset="utf-8" src="<?php app()->contentWD(); ?>exercise-1.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php app()->contentWD(); ?>karel-exercises.js"></script>
<?php
	app()->appendTo('HTMLBodyTail', ob_get_clean());	
?>