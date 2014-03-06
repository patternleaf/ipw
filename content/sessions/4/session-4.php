<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Session 4');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 4</h1>
			<p class="lead">More PHP: Files, Data Formats, JSON</p>
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
						<p>I'm a huge proponent of designing your code around the data, rather than the other way around, and I think it's one of the reasons git has been fairly successful&hellip;</p>
						<small>Linus Torvalds (<a href="http://programmers.stackexchange.com/questions/163185/torvalds-quote-about-good-programmer">source</a>)</small>
					</blockquote>
				</section>
				<section class="section row" id="review">
					<h1>Review</h1>
					<h2>Guestbook Starter</h2>
					<p>
						Quick review of everyone's guestbook so far. Assignment was to mark up and style a guestbook, and (if you were feeling brave), try to print out the most recent submission in the appropriate place on the page.
					</p>
				</section>
				<section class="section row" id="lecture">
					<h1>Lecture/In-Class Exercises</h1>
					<p>
						We're going to be working on the guestbook for the next several sessions. The ultimate goal is to make it robust, safe, scalable, and to provide a good user experience.
					</p>
					<p>
						For this session, we're going to do the following:
					</p>
					<ul>
						<li>Look again at <code>$_POST</code> and <code>$_GET</code> in PHP.</li>
						<li>Decompose the guestbook.</li>
						<li>Implement the guestbook using a file-based data store and raw markup.</li>
						<li>Switch to using a proper data format.</li>
					</ul>
					
					<h2>Exercise 1</h2>
					<div class="row live-exercise">
						<p class="col-md-3">
							Copy the code to the right and write the PHP necessary to make <a href="exercises/1/solution.php">this little app</a>.
						</p>
						<div class="code-container col-md-8" style="padding-right:1em;">
							<div class="pretty-code non-editable" id="exercise-1-editor" data-language="php" style="width:100%; height:100px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/1/index.php'); ?></div>
						</div>
					</div>
					<p>
						Here is one solution:
					</p>
					<div class="answer-container">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="code-container col-md-8" style="padding-right:1em;">
								<div class="pretty-code non-editable" id="exercise-1-solution-editor" data-language="php" style="width:100%; height:200px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/1/solution.php'); ?></div>
							</div>
						</div>
					</div>
						
					
					<h2>Exercise 2</h2>
					<p>
						With your own guestbook code, use <code>$_POST</code> to capture the input values and print them in the proper place in your page. <a href="exercises/2/before.php">For example</a>.
					</p>
					<div class="answer-container">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-5"><a href="exercises/2/before.php">Before</a></div>
							<div class="col-md-5"><a href="exercises/2/after.php">After</a></div>
						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="code-container col-md-5" style="padding:1em;">
								<div class="pretty-code non-editable" id="exercise-2-before-editor" data-language="php" style="width:100%; height:200px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/2/before.php'); ?></div>
							</div>
							<div class="code-container col-md-5" style="padding:1em;">
								<div class="pretty-code non-editable" id="exercise-2-after-editor" data-language="php" style="width:100%; height:200px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/2/after.php'); ?></div>
							</div>
						</div>
					</div>
					
					
					
					<h2>Exercise 3</h2>
					<p>
						Using function calls but without implementing the functions, decompose your guestbook. Below is one possible solution.
					</p>
					<div class="answer-container">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="code-container col-md-10" style="padding:1em;">
								<div class="pretty-code non-editable" id="exercise-3-solution-editor" data-language="php" style="width:100%; height:200px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/3/solution.php'); ?></div>
							</div>
						</div>
					</div>
					
					<p>
						Probably going to have some deck content here. Slides to come!
					</p>
					
					<h2>Exercise 4</h2>
					<p>
						Implement the empty functions from exercise 3. Using <code><a href="http://php.net/file_get_contents">file_get_contents</a></code> and <code><a href="http://php.net/file_put_contents">file_put_contents</a></code>, make a file-based a storage scheme for your guestbook. 
						For now, we're going to just write the raw markup to a text file and read it back in. Use the <code>FILE_APPEND</code> flag 
						when calling <code>file_put_contents</code>.
					</p>
					<p>
						NOTE: You may very likely run into a permissions error when you create a text file. Check your error log!
					</p>
					<div class="answer-container">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<p>
									You can find this version running <a href="exercises/4/solution.php">here</a>.
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="code-container col-md-10" style="padding:1em;">
								<div class="pretty-code non-editable" id="exercise-4-solution-editor" data-language="php" style="width:100%; height:200px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/4/solution.php'); ?></div>
							</div>
						</div>
					</div>
					
					<!--
					<ul>
						<li>Exercise: Add a Field to Your Guestbook</li>
						<li>Limitations of File-Based Implementation</li>
						<li>Data Formats Generally</li>
						<li>JSON-based Implementation</li>
						<li>Variable Scope</li>
						<li>Error Handling: Validation and Sanitization</li>
						<li>Exercise: Sanitize and Validate, Print Errors</li>
					</ul>
					-->
				</section>
				<p>The rest of this page coming soon!</p>
				<!--
				<section class="section row" id="materials">
					<h1>Materials</h1>
					<p>
						
					</p>
				</section>
				<section class="section row" id="homework">
					<h1>Homework</h1>
					<h2></h2>
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
				-->
			</div>
		</div>
	</div>

<?php 
app()->setFragment('HTMLBodyContent', ob_get_clean()); 

appendSessionBodyTail();
?>