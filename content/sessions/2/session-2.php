<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Web Programming: Session 2');
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
							<a href="http://www.stanford.edu/class/cs106a/handouts/karel-the-robot-learns-java.pdf">Karel the Robot Learns Java</a>, [PDF], from Stanford University's <a href="http://www.stanford.edu/class/cs106a/">CS106a</a> Online Course Handouts.
						</small>
					</blockquote>
					<p style="clear:both;">
						Some introductory text.
					</p>
				</section>
				<section id="decomposition" style="clear:both;">
					<h1>Decomposition</h1>
					<p>
						Divide and conquer: take larger problem, break it up into smaller, bite-sized tasks.
					</p>
				</section>
			</div>
		</div>
	</div>

<?php 
app()->setFragment('HTMLBodyContent', ob_get_clean()); 

appendSessionBodyTail();
?>