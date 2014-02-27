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
					<div class="row">
						<p>
							Download the <a href="karel-standalone-v1.zip">Karel Standalone Package</a>. Unpack it and serve it from your server. The index.php file should load out of the box without errors. <strong>If it doesn't, let me know!</strong> Don't spend time debugging problems you shouldn't have to solve.
						</p>
						<p>
							Supplemental: the old keynote slides <a href="class-2.pdf">can be downloaded here [pdf]</a>. The currently available deck doesn't go far enough. :(
						</p>
					</div>
				</section>
				<section class="section" id="homework">
					<h1>Homework</h1>
					<h2>Karel</h2>
					<div class="row">
						<div class="col-md-10">
							<p>
								There are 4 Karel problems in the download. Tackle as many as you feel able to, but <strong>at least</strong> #1. There are techniques we'll talk about which will help with #3 and #4. <strong>DO</strong> ask questions and <strong>DON'T</strong> bang your head against a wall any more than you feel is appropriate. :)
							</p>
							<p>
								The process for doing a problem is the following:
							</p>
							<ol>
								<li>
									Edit index.php to include <code>karel-problem-<em>n</em></code> where <em>n</em> is the problem number. Only include one problem file at a time!
								</li>
								<li>
									Copy the file <code>karel-solution-template.js</code> and name it <code>karel-solution-<em>n</em>.js</code>, matching the problem number.
								</li>
								<li>
									Include that solution file in index.php as well. (Only include one solution file too, of course.)
								</li>
								<li>
									Edit <code>karel-solution-<em>n</em>.js</code> to solve the problem. As you're working, save the file and reload in the browser to see the results.
								</li>
							</ol>
							<p>
								<strong>Keep the browser console open to see errors</strong>. You can use <code>console.log</code> (or any of the more advanced JS debugging facilities if you're familiar with them) to help debug.
							</p>
						</div>
						<div class="col-md-2">
							<img src="img/gir.png">
						</div>
					</div>
					
					<div class="row">
						<h2>Guestbook</h2>
						<p>
							We'll be spending time learning PHP, and web app programming via a simple guestbook application. Start thinking about the following questions:
						</p>
						<ul>
							<li>What are the parts of a guestbook?</li>
							<li>What might the markup for a guestbook look like?</li>
						</ul>
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