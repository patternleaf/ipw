<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Session 4');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 5</h1>
			<p class="lead">Data Formats, JSON, RESTful APIs</p>
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
						<p>If debugging is the process of removing bugs, then programming must be the process of putting them in.</p>
						<small><a href="http://en.wikipedia.org/wiki/Edsger_Dijkstra">Edsger Dijkstra</a></small>
					</blockquote>
				</section>
				<section class="section row" id="review">
					<h1>Review</h1>
					<p>
						Review file-based, markup-store guestbooks.
					</p>
				</section>
				<section class="section row" id="lecture">
					<h1>Lecture/In-Class Exercises</h1>
					<p>
						Problems with the scheme we've adopted. Solutions?
					</p>
					<p>
						For this session, we're going to look at the following:
					</p>
					<ul>
						<li>Talk about <dfn>JSON</dfn>.</li>
						<li>Take a look at the Flickr <dfn>API</dfn>.</li>
						<li>The <code>-></code> operator in PHP.</li>
						<li><a href="http://php.net/json_decode"><code>json_decode</code></a> and <a href="http://php.net/json_encode"><code>json_encode</code></a></li>
						<li>Build a little app that consumes a JSON API.</li>
						<li>Re-implement the guestbook using JSON as the data format.</li>
					</ul>
					
					<p>
						If that all goes well, we'll:
					</p>
					
					<ul>
						<li>Discuss <dfn>santization</dfn> and <dfn>validation</dfn>.</li>
						<li>Introduce the notion of variable <dfn>scope</dfn>.</li>
						<li>Start working on implementing a santization and validation scheme for our guestbook.</li>
					</ul>
					
					<h2>JSON + API Exercise</h2>
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
							<div class="pretty-code non-editable" id="exercise-1-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/exercises/json-api/with-images.php'); ?></div>
						</div>
					</div>
					
				</section>
				<section class="section row" id="homework">
					<h1>Homework</h1>
					<ol>
						<li>
							Finish above exercises and work on converting guestbook to use JSON as the data format.
						</li>
						<li>
							Consider a personal project. Come prepared to present your idea. Please provide some kind of visual aid.
						</li>
						<li>
							Consider possible directions from here out:
							<ul>
								<li>WordPress</li>
								<li>JavaScript/jQuery</li>
								<li>Server-side apps (PHP, APIs, building a RESTful interface)</li>
							</ul>
						</li>
					</ol>
				</section>
				<section class="section row" id="goals">
					<h1>Goals</h1>

					<div class="col-md-9">
						<p>
							We will shoot for covering the following:
						</p>
						
						<ul>
							<li>JSON</li>
							<li>json_encode and json_decode</li>
							<li>Basic API usage from a PHP script.</li>
							<li>Variable scope.</li>
							<li>Validation and sanitization.</li>
						</ul>
					</div>
					<?php /* 
					<div class="col-md-3">
						<img src="img/leo.png" style="width:100%">
					</div>
					*/?>
				</section>
			</div>
		</div>
	</div>

<?php 
app()->setFragment('HTMLBodyContent', ob_get_clean()); 

appendSessionBodyTail();
?>