<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Session 1');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
include_once(__DIR__.'/../common.php');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 1</h1>
			<p class="lead">Introductions; HTML/CSS Review</p>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-md-3 session-sidebar">
				<ul class="nav nav-tabs nav-stacked" id="sidebar-nav">
				</ul>
			</div>
			<div class="col-md-9 session-content">
				

				<section class="section" id="lecture">
					<h1>Lecture/In-Class</h1>
					<p>
						The first session is about getting our environment setup and reviewing HTML and CSS. Lecture content for this session is found in the <a href="/decks">decks</a>.
					</p>
					<ul>
						<li><a href="/decks/introductions">Deck: Introductions</a></li>
						<li><a href="/decks/environment-setup">Deck: Environment Setup</a></li>
						<li><a href="/decks/html-css-review">Deck: HTML/CSS Review</a></li>
					</ul>
				</section>

				<section class="section" id="reading">
					<h1>Reading</h1>
					<ul>
						<li><a href="http://programmers.stackexchange.com/a/46760">Things to know and look for before making your site public</a> on Stack Overflow. This is a really good overview of how <em>much</em> can go into a thoroughly-thought-out web project.
						</li>
						<li>
							<a href="http://learnpythonthehardway.org/book/intro.html">The Hard Way is Easier</a>. We aren't using Python in this course, but I agree with many of the sentiments expressed here.
						</li>
					</ul>
				</section>
				
				<section class="section" id="class-goal">
					<h1>Class Goal</h1>
					<p>
						<a href="/content/sessions/1/class-goal/guestbook-restful/index.php" target="_blank">Here is an example of what we'll be building</a>. Things to note:
						
						<ul>
							<li>Error conditions are handled—try putting in an invalid email address.</li>
							<li>If your submission fails, the form is pre-filled when it reloads.</li>
							<li>URLs are nice and <a href="http://en.wikipedia.org/wiki/RESTful">RESTful</a>.</li>
							<li>The code structured in a decoupled, <a href="http://en.wikipedia.org/wiki/Don't_repeat_yourself">DRY</a> way.</li>
						</ul>
						
						You can take a look at the PHP code for the app below. This does not show the HTML (presentation) side of things, but is code for a general "guestbook" app that could be presented in many ways. Hopefully by the end of the course you'll be able to write something like this yourself!
					</p>
					<div class="row">
						<div class="code-container col-md-12" style="padding:1em; border:1px solid #ccc;">
							<div class="pretty-code non-editable" id="exercise-4-solution-editor" data-language="php" style="width:100%; height:400px;"><?php echo app()->escapedFileContents(__DIR__.'/class-goal/guestbook-restful/guestbook-app.php'); ?></div>
						</div>
					</div>
					
				</section>

				
				<section class="section" id="homework">
					<h1>Homework</h1>
					<p>
						For these exercises, use your HTTP server environment. The URL of the pages when you load them in your browser should start with <code>http://</code>, not <code>file://</code>.
					</p>
					<h3>1. Moby Dick</h3>
					<ol>
						<li>
							Download <a href="moby-dick-edited.txt">this plain text file</a>, make it accessible from your server, and turn it into an HTML5 document. You might look at <a href="http://www.sitepoint.com/a-basic-html5-template/">an HTML template</a> as a starting point.
						</li>
						<li>
							Mark it up as you see fit based on the semantics of HTML5 tags. Refer to the <a href="http://joshduck.com/periodic-table.html">Periodic Table of the Elements</a> of whatever source you prefer. 
						</li>
						<li>
							Make sure your markup <a href="http://validator.w3.org">validates</a>.
						</li>
						<li>
							Find an image and embed it into the document. (Try <a href="https://www.flickr.com/search/?q=whale&l=cc&ss=2&ct=6&mt=all&w=all&adv=1">searching on flickr's CC-licensed images</a>, maybe?)
						</li>
						<li>
							Use a CSS reset to void your browser's default styling. Find one you like or <a href="http://html5doctor.com/html-5-reset-stylesheet/">try this one</a>.
						</li>
						<li>
							Recover some minimal amount of styling&mdash;headers, paragraphs, and so on.
						</li>
						<li>
							Make sure everything still <a href="http://validator.w3.org">validates</a>.
						</li>
					
					</ol>
				
					<p>
						The text file comes from <a href="http://www.gutenberg.org">Project Gutenberg</a>. Note that it does <strong>not</strong> contain the complete text of Moby Dick. :)
					</p>
					
					<h3>2. Hello, PHP</h3>
					
					<p>
						Follow the instructions <a href="/decks/intro-to-php">here</a>. More on this later.
					</p>
					
					<h3>3. (Optional for CSS Pratice) Pizza Recipe</h3>
				
					<p>
						Download <a href="pizza-test.zip">pizza-test.zip</a>. Expand the archive. Inside you'll find some jpeg images, an HTML file, and a folder called "notes". The HTML file contains a recipe which is marked up with reasonably semantic HTML, but no CSS styling. The "notes" folder contains some images ("comps") show a desired look for the page.
					</p>

					<p>
						Your job is to add CSS to this page such that it looks like the comps. <strong>You should not need to change the markup</strong> to achieve the desired look. 
					</p>

					<ol>
						<li>There are some pixel measurements specified in the comps which should be used.</li>
						<li>Note that some elements have ids and there are a couple of classes. Those can be used to good effect via CSS selectors.</li>
						<li>
							There are probably a few different ways to achieve the look. The solution I picked involves the following CSS properties: <code>width, margin, border, border-bottom, padding, clear, background-color, float, display</code>
						</li>
						<li>
							Don't worry if the 7 in step 7 is rendered over the image. The comps were screenshots from Firefox which renders differently than WebKit (Safari and Chrome).
						</li>
						<li>
							There's a place in the header with a note "YOUR CSS GOES IN HERE". Your CSS goes in there. :)
						</li>
					</ol>
				
					<p>Don't forget to <a href="http://validator.w3.org">validate</a> the result!</p>
				</section>
				
				<section class="section" id="goals">
					<h1>Goals</h1>
					<p>
						First, a working development environment&mdash;either local or remote. A sense of what the class will be covering.
					</p>
					<p>
						Hopefully you'll have some idea how to answer the following.
					</p>
					<ul>
						<li>what is semantic markup?</li>
						<li>what does "presentation versus content" mean?</li>
						<li>what is special about the div and span tags?</li>
						<li>what is different between the div tag and the span tag?</li>
						<li>what is special about the id and class attributes?</li>
						<li>what is different between the id attribute and the class attribute?</li>
						<li>what is a CSS selctor?</li>
						<li>what does a CSS rule look like?</li>
						<li>how do you select an element with class "foo"?</li>
						<li>how do you select an element with id "bar"?</li>
						<li>what is the CSS "box model"?</li>
						<li>what is the "display" property used for?</li>
						<li>what is the "position" property used for?</li>
					</ul>
				</section>
			</div>
		</div>
	</div>

<?php 
app()->setFragment('HTMLBodyContent', ob_get_clean()); 

appendSessionBodyTail();
