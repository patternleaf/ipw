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
				
				<p>The first session is about getting our environment setup and reviewing HTML and CSS. </p>
					
				<section class="section" id="lecture">
					<h1>Lecture</h1>
					<p>
						Lecture content for this session is found in the <a href="/decks">decks</a>.
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
				<section class="section" id="homework">
					<h1>Homework</h1>
					<p>
						For these two exercises, use your HTTP server environment. The URL of the pages when you load them in your browser should start with <code>http://</code>, not <code>file://</code>.
					</p>
					<h3>Moby Dick</h3>
					<ol>
						<li>
							Download <a href="1/moby-dick-edited.txt">this plain text file</a>, make it accessible from your server, and turn it into an HTML5 document. You might look at <a href="http://www.sitepoint.com/a-basic-html5-template/">an HTML template</a> as a starting point.
						</li>
						<li>
							Mark it up as you see fit based on the semantics of HTML5 tags. Refer to the <a href="http://joshduck.com/periodic-table.html">Periodic Table of the Elements</a> of whatever source you prefer. 
						</li>
						<li>
							Make sure your markup <a href="http://validator.w3.org">validates</a>.
						</li>
						<li>
							Find an image and embed it into the document.
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
					<h3>Pizza Recipe</h3>
				
					<p>
						Download <a href="pizza-test.zip">pizza-test.zip</a>. Expand the archive. Inside you'll find some jpeg images, an HTML file, and a folder called "notes". The HTML file contains a recipe which is marked up with reasonably semantic HTML, but no CSS styling. The "notes" folder contains some images ("comps") show a desired look for the page.
					</p>

					<p>
						Your job is to add CSS to this page such that it looks like the comps. **You should not need to change the markup** to achieve the desired look. 
					</p>

					<ol>
						<li>There are some pixel measurements specified in the comps which should be used.</li>
						<li>Note that some elements have ids and there are a couple of classes. Those can be used to good effect via CSS selectors.</li>
						<li>
							There are probably a few different ways to achieve the look. The solution I picked involves the following CSS properties: <code>width, margin, border, border-bottom, padding, clear, background-color, float, display</code>
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
						First, a working development environment&mdash;either local or remote. And hopefully you'll have some idea how to answer the following.
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
