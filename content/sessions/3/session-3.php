<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Session 3');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 3</h1>
			<p class="lead">arrays, http, forms, POST and GET</p>
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
						<p>Controlling complexity is the essence of computer programming.</p>
						<small>Brian Kernighan</small>
					</blockquote>
				</section>
				<section class="section row" id="review">
					<h1>Review</h1>
					<h2>Karel</h2>
					<p>
						Review Karel solutions from <a href="../2">Session 2</a>. How did you use decomposition, iteration, augmentation, and conditionals to solve the problems?
					</p>
					<h2>
						Guestbook
					</h2>
					<p>
						Let's look at our answers to:
					</p>
					<ul>
						<li>What are the parts of a guestbook?</li>
						<li>What might the markup for a guestbook look like?</li>
					</ul>
				</section>
				<section class="section row" id="lecture">
					<h1>Lecture</h1>
					<p>
						A little review&hellip;
					</p>
					<ul>
						<li><a href="/decks/variables-in-php.pdf">Deck [pdf]: Variables in PHP</a></li>
						<li><a href="/decks/arrays-in-php.pdf">Deck [pdf]: Arrays in PHP</a></li>
					</ul>
					<h2>Exercise 1</h2>
					<p>
						Write an HTML/PHP page that prints out the string 'pickle' 20 times. Use a <code>for</code> loop.
					</p>
					<h2>Exercise 2</h2>
					<p>
						Write an HTML/PHP page that prints out pickles and their country of origin. 
						Use a definition list (<code>dl</code>) and the following associative array as the data source.
					</p>
					<code style="white-space:pre">$pickleOrigins = array(
	‘Gherkin’ => ‘West Indian’,
	‘Polish’ => ‘Poland’,
	‘Hungarian’ => ‘Hungary’,
	‘Swedish’ => ‘Sweden’
);</code>
					<h2>Exercise 3</h2>
					<p>
						Copy the php below into a file on your server. Write the PHP necessary to drill into the data structure until you get to the nested array one of whose values is (natch) "pickles". Then iterate over that array and print all of its values in an ordered list.
					</p>
					<div class="row">
						<div class="code-container col-md-12" style="padding:1em;">
							<div class="pretty-code non-editable" id="exercise-2-data" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/materials/test-data/quick-stats.php'); ?></div>
						</div>
					</div>
					<ul>
						<li><a href="/decks/http-form-input-with-php.pdf">Deck [pdf]: HTTP Form input with PHP</a></li>
					</ul>
					<h2>Exercise 3</h2>
					<p>
						
					</p>
				</section>
				<section class="section row" id="materials">
					<h1>Materials</h1>
					<p>
						If you don't wish to markup your own guestbook, you can view the source for this <a href="http://intro-web-programming.dev/sessions/3/materials/starter-file-based/index-no-style.php">guestbook starter file</a> and copy and paste that into a file on your own server.
					</p>
				</section>
				<section class="section row" id="homework">
					<h1>Homework</h1>
					<h2>Guestbook - Markup &amp; Form Submission</h2>
					<ol>
						<li>
							Markup a simple guestbook usign HTML5. (Alternatively, use a <a href="http://intro-web-programming.dev/sessions/3/materials/starter-file-based/index-no-style.php">prefab one</a>.)Style it in some way you like with either a framework or by hand.
						</li>
						<li>
							Be sure to include a form in the guestbook. At a minimum the form should allow the user to leave their name, message, and a title.
						</li>
						<li>
							Use PHP to capture the form input on the server (using <code>$_POST</code>) and print out the submission at the appropriate place in your page on response.
						</li>
						<li>
							We won't be <em>saving</em> the submission just yet. We'll do that Wednesday.
						</li>
					</ul>
				</section>
				<section class="section row" id="goals">
					<h1>Goals</h1>

					<div class="col-md-9">
						<p>
							We'll be reviewing and/or covering the following:
						</p>
						
						<ul>
							<li>Printing PHP's output to the webpage</li>
							<li>Where and when does PHP run?</li>
							<li>Functions proper: arguments and return values.</li>
							<li>Language reference (php.net)</li>
							<li>Variables</li>
							<li>Arrays in PHP: linear and associative</li>
							<li><code>get</code> vs <code>post</code> HTTP methods</li>
						</ul>
					</div>
					<div class="col-md-3">
						<img src="img/leo.png" style="width:100%">
					</div>
				</section>
			</div>
		</div>
	</div>

<?php 
app()->setFragment('HTMLBodyContent', ob_get_clean()); 

appendSessionBodyTail();
?>