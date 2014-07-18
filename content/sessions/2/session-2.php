<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Session 2');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 2</h1>
			<p class="lead">Decomposition, Abstraction, Augmentation, Iteration, Conditions</p>
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
						<p>Problem solving is the essence of programming; the rules are just a minor concern along the way.</p>
						<small>
							<a href="http://www.stanford.edu/class/cs106a/materials/karel-the-robot-learns-java.pdf">Karel the Robot Learns Java</a> [PDF], from Stanford University's <a href="http://www.stanford.edu/class/cs106a/">CS106a</a> Online Course Handouts.
						</small>
					</blockquote>
				</section>
				<section class="section" id="review">
					<h1>Review</h1>
					<p>
						Review solutions from <a href="../1">Session 1</a>. 
					</p>
					<ul>
						<li><a href="../1/solutions/moby-dick/moby-dick-edited-styled.html">Moby Dick</a></li>
						<li><a href="../1/solutions/pizza-test/pizza.html">Pizza</a></li>
					</ul>
				</section>
				<section class="section" id="lecture">
					<h1>Lecture</h1>
					<p>
						Lecture content for this session is found in the <a href="/decks">decks</a>.
					</p>
					<ul>
						<li><a href="/decks/intro-to-procedural">Deck: Intro to Procedural Programming</a></li>
					</ul>
				</section>
				<section class="section" id="materials">
					<h1>Materials</h1>
					<p>
						Download the <a href="karel-v1-php.zip">Karel Standalone Package</a>. Unpack it and serve it from your server. The index.php file should load out of the box without errors. <strong>If it doesn't, let me know!</strong> Don't spend time debugging problems you shouldn't have to solve.
					</p>
					<p>
						Supplemental: the old keynote slides <a href="class-2.pdf">can be downloaded here [pdf]</a>. The currently available deck doesn't cover quite as much. :(
					</p>

				</section>
				<section class="section" id="homework">
					<h1>Homework</h1>
					<h2>Karel</h2>
					<div class="row">
						<div class="col-md-10">
							<p>
								There are 5 Karel problems in the download. Tackle as many as you feel able to, but <strong>at least</strong> #1 and #2. <strong>DO</strong> ask questions and <strong>DON'T</strong> bang your head against a wall any more than you feel is appropriate. :)
							</p>
							<p>
								To complete each exercise, edit the solution.php file in each folder (eg, <code>localhost:8888/karel-v1-php/problem-1/solution.php</code>). Reload the index.php file as you add commands to see the result.
							</p>
							<p>
								Keep your PHP console open to see errors, and use <code>error_log</code> to help debug. 							</p>
							<p>
								<strong>Important note</strong>: The Karel exercises were built in JavaScript and designed to be solved in JavaScript. Here we're using an <em>extraordinarily</em> hacky method to transform PHP into JavaScript. There should be enough here to solve the problems, but none of PHP's built-in functions will be available, and any abnormal syntax may not provide very good error messages.
							</p>
						</div>
						<div class="col-md-2">
							<img src="img/gir.png">
						</div>
					</div>
					
					<div class="row">
						<h2>Guestbook</h2>
						<p>
							We'll be learning PHP and web app programming via a simple guestbook application. For Monday please put together the markup and basic styling for a guestbook. 
						</p>
						<ul>
							<li>What are the parts of a guestbook?</li>
							<li>What would semantic markup for a guestbook be? There's no single right answer.</li>
						</ul>
						<p><a href="/content/sessions/3/materials/starter-file-based/index-simply-styled.php">Here's an example</a> of a simply styled, reasonably semantic guestbook.</p> Note that it has a couple of lorem-ipsum messages so that we can tell what they will look like. Also note that <a href="http://validator.w3.org/check?uri=http%3A%2F%2Fipw.patternleaf.com%2Fcontent%2Fsessions%2F3%2Fmaterials%2Fstarter-file-based%2Findex-simply-styled.php&charset=%28detect+automatically%29&doctype=Inline&group=0">it validates</a>. Yours should, too!
					</div>
				</section>
				<section class="section" id="goals">
					<h1>Goals</h1>
					<div class="row">
						<div class="col-md-9">
							<p>
								You should have some idea about the following problem-solving and programming concepts.
							</p>
							
							<ul>
								<li>Decomposition</li>
								<li>Abstraction</li>
								<li>Condition(al)</li>
								<li>Iteration</li>
							</ul>
						</div>
						<div class="col-md-3">
							<img src="img/cajun-man.png" style="width:100%">
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

<?php 
app()->setFragment('HTMLBodyContent', ob_get_clean()); 

appendSessionBodyTail();
?>