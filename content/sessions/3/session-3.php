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
					<p>
						Also: if you were going to write some pseudocode for your guestbook, what might that look like?
					</p>
				</section>
				<section class="section row" id="in-class">
					<h1>Exercises &amp; Lecture</h1>
					<p>
						First a little review&hellip;
					</p>
					<ul>
						<li><a href="/decks/variables-in-php.pdf">Deck [pdf]: Variables in PHP</a></li>
						<li><a href="/decks/arrays-in-php.pdf">Deck [pdf]: Arrays in PHP</a></li>
					</ul>
					<h2>Exercise 1</h2>
					<p>
						Write an HTML/PHP page that prints out the string 'pickle' 20 times. Use a <code>for</code> loop.
					</p>
					<div class="row">
						<div class="code-container col-md-12" style="padding:1em;">
							<div class="pretty-code non-editable" id="exercise-1-starter" data-language="php" style="width:100%; height:200px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/1/starter.php'); ?></div>
						</div>
					</div>
					
					<h2>Exercise 2</h2>
					<p>
						Write an HTML/PHP page that prints out pickles and their country of origin. 
						Use a definition list (<code>dl</code>) to render the data and the <code>$pickleOrigins</code> associative array as the data source.
					</p>
					
					<div class="row">
						<div class="code-container col-md-12" style="padding:1em;">
							<div class="pretty-code non-editable" id="exercise-2-starter" data-language="php" style="width:100%; height:200px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/2/starter.php'); ?></div>
						</div>
					</div>
					<h2>Exercise 3</h2>
					<p>
						Write the PHP necessary to drill into the given data structure until you get to the nested array one of whose values is (natch) "pickles". Then iterate over that array and print all of its values in an ordered list. Render the "pickles" item in a huge font, green, and all uppercase to make sure everyone knows that pickles are rad.
					</p>
					<div class="row">
						<div class="code-container col-md-12" style="padding:1em;">
							<div class="pretty-code non-editable" id="exercise-3-starter" data-language="php" style="width:100%; height:200px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/3/starter.php'); ?></div>
						</div>
					</div>
					<h2>More Lecture: Forms</h2>
					<ul>
						<li><a href="/decks/http-form-input-with-php.pdf">Deck [pdf]: HTTP Form input with PHP</a></li>
					</ul>

					<h2>Exercise 4</h2>
					<p>
						Write a form in an HTML5 document that lets a user submit a number. Upon submission, the page should print out "pickle" the number of times requested by the user. Start with this form:
					</p>
					<div class="row">
						<div class="code-container col-md-12" style="padding:1em;">
							<div class="pretty-code non-editable" id="exercise-4-starter" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/4/starter.php'); ?></div>
						</div>
					</div>
					<p>
						Questions: Where should the PHP go? Does it make a difference? What should happen if the page is loaded but not on account of someone submitting the form?
					</p>
					
					<h2>Exercise 5</h2>
					<p>
						Make the form in your guestbook functional: have it print a submitted entry in-place in the list of messages. Don't try to save the message yet.
					</p>
					
					<h2>Supplementary</h2>
					<ul>
						<li><a href="/decks/client-server-internet.pdf">Deck [pdf]: The client-Server structure of the internet</a>.</li>
						<li><a href="/decks/client-server-internet.pdf">Deck [pdf]: PHP and the internet</a>.</li>
					</ul>
				</section>
				
				<section class="section row" id="homework">
					<h1>Homework</h1>
					<h2>Guestbook - Basic File-Based</h2>
					<p>
						Check out this <a href="/decks/assignment-file-based-guestbook.pdf">quick deck [pdf]</a>.
					</p>
					<p>
						The obvious problem with our guestbook following exercise 5 is that the data from a submission does not <em>persist</em> past a single page load. This is what is meant when we say that HTTP as a protocol is <dfn>stateless</dfn>. What we need is a server-side <dfn>datastore</dfn>. We're going to start with a naive datastore and gradually improve it.
					</p> 
					<p>
						For the assignment, we're going to use two PHP functions, 
						<code><a href="http://php.net/file_get_contents">file_get_contents</a></code> and 
						<code><a href="http://php.net/file_put_contents">file_put_contents</a></code> to manage the datastore of guestbook messages.
					</p>
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