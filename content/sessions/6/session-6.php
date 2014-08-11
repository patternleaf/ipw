<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Session 6');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 6</h1>
			<p class="lead">Variable Scope, Sanitization, Validation, and Error Handling</p>
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
						<p>Any fool can write code that a computer can understand. Good programmers write code that humans can understand.</p>
						<small><a href="http://en.wikipedia.org/wiki/Martin_Fowler">Martin Fowler</a></small>
					</blockquote>
				</section>
				
				<section class="section row" id="review">
					<h1>Review</h1>
					<p>
						Any further questions about the transition to JSON-based guestbooks.
					</p>
				</section>
				<section class="section row" id="lecture">
					<h1>Lecture/In-Class Exercises</h1>
					<p>
						For this session, we're going to look at the following:
					</p>
					<ul>
						<li><a href="http://php.net/include">including files in php</a></li>
						<li>Creating your own <dfn><a href="http://en.wikipedia.org/wiki/Modular_programming">modules</a></dfn>, <a href="http://en.wikipedia.org/wiki/Separation_of_concerns">separation of concerns</a>.</li>
						<li><a href="http://us2.php.net/manual/en/language.exceptions.php">Exceptions</a> and <dfn>failure modes</dfn>.</li>
						<li>Further decompose the guestbook: library, error handling, edge cases.</li>
						<li><a href="http://en.wikipedia.org/wiki/Scope_(computer_science)">Variable scope</a>.</li>
						<li>Implement <a href="http://en.wikipedia.org/wiki/Data_sanitization#Preventing_code_injection">sanitization</a>, <a href="http://en.wikipedia.org/wiki/Data_validation">validation</a>, and a nice UX for when <a href="http://en.wikipedia.org/wiki/Error_handling">things go wrong</a> in the guestbook.</li>
					</ul>

					<h2>Modules/Separation of Concerns/Including Files</h2>
						
					<p>
						Check out <a href="/decks/modules">this deck</a>.
					</p>
					<p>
						Our first job will be to make a guestbook app module. We must agree upon an interface. Here it is:
					</p>
					<dl class="interface-definition">
						<dt><code><span class="return-type">bool</span> guestbookWasSigned(<span  class="argument-name">void</span>)</code></dt>
						<dd>Returns true if the guestbook was signed</dd>
						
						<dt><code><span class="return-type">void</span> addEntryToGuestbook(<span class="argument-name">entry</span>)</code></dt>
						<dd>Stores the passed <code>entry</code> in the datastore.</dd>

						<dt><code><span class="return-type">void</span> printEntries([<span class="argument-name">containerTag</span> = "li"])</code></dt>
						<dd>Echos the guestbook contents. Each entry will be wrapped in <code>containerTag</code>s if one is passed. Uses <code>&lt;li></code>s by default.</dd>
					</dl>
					
					<p>To fill out with slides/content/exercises: </p>
					<ul>
						<li>Including Files</li>
						<li>Error Handling</li>
						<li><a href="/decks/data-sanitization-and-validation-guestbook.pdf">Sanitization and Validation in PHP</a></li>
						<li><a href="/decks/variable-scope-php.pdf">Variable Scope</a></li>
						<li>Exceptions</li>
					</ul>
					
				</section>

				<section class="section row" id="materials">
					<h1>Materials</h1>
					
					<h2>Guestbook Progression</h2>
					
					<h3>No JSON - "<a href="http://www.youtube.com/watch?v=GcatQSyRK6c">Previously, on LOST</a>"</h3>
					<p>
						<a href="guestbook/no-json/index.php">Working Example</a>
					</p>
					<div class="row live-example">
						<div class="code-container col-md-10" style="padding-right:1em;">
							<div class="pretty-code non-editable" id="no-json-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/guestbook/no-json/index.php'); ?></div>
						</div>
					</div>

					<h3>Inline JSON</h3>
					<p>
						<a href="guestbook/json-inline/index.php">Working Example</a>
					</p>
					<div class="row live-example">
						<div class="code-container col-md-10" style="padding-right:1em;">
							<div class="pretty-code non-editable" id="json-inline-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/guestbook/json-inline/index.php'); ?></div>
						</div>
					</div>
					
					<p>
						Check out <code>include</code>, <code>require</code>, <code>include_once</code>, and <code>require_once</code>.
					</p>
					
					<h3>Guestbook "Module"</h3>
					<p>
						<a href="guestbook/json-with-include/index.php">Working Example</a>
					</p>
					<div class="row live-example">
						<p style="padding-left:1em"><code>index.php</code></p>
						<div class="code-container col-md-10" style="padding-right:1em;">
							<div class="pretty-code non-editable" id="module-index-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/guestbook/json-with-include/index.php'); ?></div>
						</div>
					</div>
					<div class="row live-example">
						<p style="padding-left:1em"><code>guestbook-app.php</code></p>
						<div class="code-container col-md-10" style="padding-right:1em;">
							<div class="pretty-code non-editable" id="module-include-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/guestbook/json-with-include/guestbook-app.php'); ?></div>
						</div>
					</div>
					
					<p>
						Chat about error handling. What could go wrong?
					</p>
					
					<h3>Guestbook &mdash; Error Handling with Globals</h3>
					<p>
						<a href="guestbook/error-handling/globals/index.php">Working Example</a>
					</p>
					<div class="row live-example">
						<p style="padding-left:1em"><code>index.php</code></p>
						<div class="code-container col-md-10" style="padding-right:1em;">
							<div class="pretty-code non-editable" id="globals-index-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/guestbook/error-handling/globals/index.php'); ?></div>
						</div>
					</div>
					<div class="row live-example">
						<p style="padding-left:1em"><code>guestbook-app.php</code></p>
						<div class="code-container col-md-10" style="padding-right:1em;">
							<div class="pretty-code non-editable" id="globals-include-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/guestbook/error-handling/globals/guestbook-app.php'); ?></div>
						</div>
					</div>
					
					<h3>Guestbook &mdash; Error Handling with Exceptions</h3>
					<p>
						<a href="guestbook/error-handling/exceptions/index.php">Working Example</a>
					</p>
					<div class="row live-example">
						<p style="padding-left:1em"><code>index.php</code></p>
						<div class="code-container col-md-10" style="padding-right:1em;">
							<div class="pretty-code non-editable" id="exceptions-index-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/guestbook/error-handling/exceptions/index.php'); ?></div>
						</div>
					</div>
					<div class="row live-example">
						<p style="padding-left:1em"><code>guestbook-app.php</code></p>
						<div class="code-container col-md-10" style="padding-right:1em;">
							<div class="pretty-code non-editable" id="exceptions-include-editor" data-language="php" style="width:100%; height:300px;"><?php echo app()->escapedFileContents(__DIR__.'/guestbook/error-handling/exceptions/guestbook-app.php'); ?></div>
						</div>
					</div>
					
				</section>

				
				<section class="section row" id="homework">
					<h1>Homework</h1>
					<ol>
						<li>
							Finish implementing sanitization, validation, and error handling in your guestbook.
						</li>
					</ol>
				</section>
				<section class="section row" id="goals">
					<h1>Goals</h1>
					<div class="col-md-9">
						<ul>
							<li>Modules, Separation of Concerns</li>
							<li><code>include</code>, <code>require</code>, <code>include_once</code>, and <code>require_once</code></li>
							<li>Sanitzation and validation generally and in PHP specifically.</li>
							<li>Variable scope.</li>
							<li>What can go wrong? Possible error modes.</li>
							<li>Exceptions.</li>
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