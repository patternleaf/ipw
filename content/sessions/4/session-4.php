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
						Quick review of everyone's guestbook so far. At this point we should all have a marked-up and styled guestbook that prints out the most recent submission in the appropriate place on the page.
					</p>
				</section>
				<section class="section row" id="lecture">
					<h1>Exercises &amp; Lecture</h1>
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
					<p>
						With your own guestbook code, use <code>$_POST</code> to capture the input values and print them in the proper place in your page. <a href="exercises/2/before.php">For example</a>.
					</p>

					<div class="row">
						<div class="col-md-2">
							<a href="exercises/1/before.php">Before</a>
						</div>
						<div class="code-container col-md-10" style="padding:1em;">
							<div class="pretty-code non-editable" id="exercise-1-before-editor" data-language="php" style="width:100%; height:200px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/1/before.php'); ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"><a href="exercises/1/after.php">After</a></div>
						<div class="code-container col-md-10" style="padding:1em;">
							<div class="pretty-code non-editable" id="exercise-1-after-editor" data-language="php" style="width:100%; height:200px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/1/after.php'); ?></div>
						</div>
					</div>

					
					<h2>Exercise 2</h2>
					<p>
						Think about what things will need to happen to make your guestbook work. For example: "It will need to get the submission data. Then it'll need to add the new submission to the list of existing submissions." And so on. Write pseudo-code in the appropriate places in the guestbook page to sketch out a very basic solution.
					</p>
					<p>
						Convert your pseudocode into functions, but <em>don't implement them yet</em>. We're still sketching. Just like in our Karel exercises, you can define a handful of utility functions before you invoke them to solve the problem. Not everything needs to be in a function, but some things may make more sense as a function.
					</p>
					<p>
						Below is one possible solution.
					</p>
					<div class="answer-container">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="code-container col-md-10" style="padding:1em;">
								<div class="pretty-code non-editable" id="exercise-2-solution-editor" data-language="php" style="width:100%; height:200px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/2/solution.php'); ?></div>
							</div>
						</div>
					</div>
					
					<h2>A Simple Datastore</h2>
					<p>
						In order to persist the messages between page loads and across clients, we'll need to store them on the server. For a first pass, we're going to store the messages as raw HTML in a file on the server's file system.
					</p>

					<h2>Exercise 3</h2>
					<p>
						Check out this set of slides: <a href="/decks/assignment-file-based-guestbook.pdf">[pdf]</a>.
					</p>
					<p>
						Implement the empty functions from exercise 2. Remember that you can apply the same decomposition process to the implementation of functions to work out how to make them meet their "contract".
					</p>
						Using <code><a href="http://php.net/file_get_contents">file_get_contents</a></code> and <code><a href="http://php.net/file_put_contents">file_put_contents</a></code>, make a file-based a storage scheme for your guestbook. 
						For now, we're going to just write the raw markup to a text file and read it back in. You will probably want to use the <code>FILE_APPEND</code> flag when calling <code>file_put_contents</code>.
					</p>
					<p>
						NOTE: You may very likely run into a permissions error when you create a text file. Check your error log!
					</p>
					<div class="answer-container">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<p>
									You can find this version running <a href="/content/sessions/4/exercises/3/solution.php">here</a>.
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="code-container col-md-10" style="padding:1em;">
								<div class="pretty-code non-editable" id="exercise-3-solution-editor" data-language="php" style="width:100%; height:200px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/3/solution.php'); ?></div>
							</div>
						</div>
					</div>
					
					
					<h2>Problems With This Approach</h2>
					<p>
						What are some of the limitations of this implementation?
					</p>
					<div class="answer-container">
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-9">
								<ul>
									<li>
										What if we want to change the style of the guestbook and the markup needs to change?
									</li>
									<li>
										What if we want to add a field to every entry—say, location?
									</li>
									<li>
										Or add avatars based on email address?
									</li>
									<li>
										What if we want to delete or edit a single entry? Or provide other admin functions?
									</li>
									<li>
										What if we need to accommodate millions of entries? How would we implement pagination? Would we have to load the entire file of entries to find the ones we wanted?
									</li>
									<li>
										How would we implement more specific querying by, say date? eg, <code>http://myguestbook.com/guestbook.php?year=2014&month=7</code>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<p>
						We can frame these problems partly as an issue of content versus presentation, or <em>model</em> versus <em>view</em>. There is too much presentation logic in our data store. Ideally we store data <strong>completely</strong> independently of how it is presented.
					</p>
					
					<div class="row">
						<div class="col-md-12">
							<img class="article-img center" src="img/mvc.png">
						</div>
					</div>
					
					<p>
						We need to decide on a <dfn>data format</dfn>.
					</p>
					
					<h2>An Data Format for our Datastore</h2>
					<p>
						We're going to use JSON as a data format. Here are some slides introducing JSON (with a little JavaScript thrown in): <a href="/decks/json-and-wee-javascript.pdf">[pdf]</a>.
					</p>

					<h2>Exercise 5 (JSON + API)</h2>
					<p>
						We're going to make a really simple app using <a href="https://www.flickr.com/services/api/">Flickr's API</a>. The bits and pieces required:
					</p>
					<ul>
						<li>The <a href="https://www.flickr.com/services/api/flickr.photos.search.html">photos.search</a> API method</li>
						<li><a href="http://php.net/http_build_query"><code>http_build_query</code></a></li>
						<li><a href="http://php.net/curl_init"><code>curl_init</code></a>, <a href="http://php.net/curl_setopt"><code>curl_setopt</code></a></li>
						<li><a href="http://php.net/json_decode"><code>json_decode</code></a> and <a href="http://php.net/json_encode"><code>json_encode</code></a></li>
						<li><a href="http://www.flickr.com/services/api/misc.urls.html">How to build a Flickr image URL</a> given an API response</li>
					</ul>
					<p>
						We're going to walk through building the app together. The code is below. Once we've built it, try the following:
					</p>
					<ul>
						<li>Include the owner's name next to the image. (Look for the "extras" field on the request specification.)</li>
						<li>Add an <code>input</code> field which will let the user limit the number of images returned.</li>
						<li><strong>Bonus</strong>: add a <code>select</code> drop-down to your form which will allow users to limit the search to only CC-licensed images. (Check out the licenses field on the request, and <a href="https://www.flickr.com/services/api/flickr.photos.licenses.getInfo.html">this page</a> for license id numbers.)</li>
					</ul>
					
					<div class="row live-exercise">
						<div class="code-container col-md-10" style="padding-right:1em;">
							<div class="pretty-code non-editable" id="exercise-4-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/4/with-images.php'); ?></div>
						</div>
					</div>

					<h2>Exercise 5 + Homework</h2>
					<p>
						Using <code><a href="http://php.net/json_encode">json_encode</a></code> and <code><a href="http://php.net/json_decode">json_decode</a></code>, re-implement the guestbook using JSON as a data format rather than raw markup.
					</p>
					<p>
						<strong>Note!</strong> You should pass <code>true</code> as the second argument to <code>json_decode</code> or it will give you back PHP objects, which we haven't talked about. Passing true will ensure that only associative and linear arrays are returned as the PHP-flavored data structures.
					</p>
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
				<section class="section row" id="homework">
					<h1>Homework</h1>
					
					<p>Finish exercise 5!</p>
					
				</section>
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