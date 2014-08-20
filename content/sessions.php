<?php
	app()->setFragment('HTMLTitle', 'Intro to Programming for the Web: Sessions');
	app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
	ob_start();
?>
	<div class="jumbotron">
		<div class="container"><h1>Sessions</h1></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<ul class="nav nav-tabs nav-stacked" id="sidebar-nav">
					<li><a href="#session-1">Session 1</a></li>
					<li><a href="#session-2">Session 2</a></li>
					<li><a href="#session-3">Session 3</a></li>
					<li><a href="#session-4">Session 4</a></li>
					<li><a href="#session-5">Session 5</a></li>
					<li><a href="#session-6">Session 6</a></li>
					<li><a href="#session-7">Session 7</a></li>
					<li><a href="#session-8">Session 8</a></li>
					<li><a href="#session-9">Session 9</a></li>
					<li><a href="#session-10">Session 10</a></li>
				</ul>
			</div>
			<div class="col-md-9 session-list">
				<section id="session-1">
					<h1>
						<a href="1">Session 1</a><br>
						<small>Introductions; HTML/CSS Review; Hello, PHP.</small>
						<a class="btn btn-default" href="/sessions/1" role="button">Go &raquo;</a>
					</h1>
					<p>
						In our initial meeting we'll talk about logistics and get our local environments set up for development. After a brief review of HTML and CSS, we'll look at basic PHP syntax and write our first dynamic PHP-powered web pages. Hello, PHP!
					</p>
				</section>
				<section id="session-2">
					<h1>
						<a href="2">Session 2</a><br>
						<small>Input/Output</small>
					</h1>
					<p>
						Next up, we will dive straight into the basic means of interactivity in server-side applications: forms. How do you capture user input? We'll make our dynamic webpage controllable by the user. We'll also build the initial markup for the application we'll be fleshing out over the course of the course: a guestbook.
					</p>
				</section>
				<section id="session-3">

					<h1>
						<a href="3">Session 3</a><br>
						<small>PHP: Variables, Arrays, Data Types</small>
					</h1>
					<p>
						Programming happens by means of a handful of basic data types and operations on those types. Our third session will look at the array (literally) of things one can do with numbers, strings, booleans, and functions. The second assignment will involve some schoolbook-style exercises and also making our guestbook halfway — well, maybe an eighth of the way—functional.
					</p>
				</section>
				<section id="session-4">
					<h1>
						<a href="4">Session 4</a><br>
						<small>More on forms and PHP. File i/o.</small>
					</h1>
					<p>
						Our guestbook is less than useful at this point partly because HTTP is stateless. Most web applications need some way to persist data between page loads, and ours is no different. Our PHP program lives and runs on a computer which happens to have a filesystem, so our first approach to persistence is to store guestbook entries in a file. Reading and writing to a file in PHP is actually pretty easy. The trick will be in picking what to write. Initially, we'll write straight markup.
					</p>
				</section>
				<section id="session-5">

					<h1>
						<a href="5">Session 5</a><br>
						<small></small>
					</h1>
					<p>
						Our guestbook is working! Seemingly. Mostly. But there are some problems. What happens when we want to add a field to the guestbook? What happens if we want to change the style of the entries? How will the server perform with our approach when we get millions of entries (which we undoubtedly will)? Our next step is to take a hard look at the problem of content versus presentation. You may have heard of this concern in terms of CSS and semantic HTML markup. What step can we take to separate the two in this case? We'll review a couple of data formats and settle on JSON for now. We'll also look at some immediate benefits of separating content and presentation, or data and views on that data.
					</p>
				</section>
				<section id="session-6">
					<h1>
						<a href="6">Session 6</a><br>
						<small></small>
					</h1>
					<p>
						So now we've got a respectable data format and we are keeping our data clean of any unseemly presentation concerns. Our guestbook is working. Things are going well. This is the point when you need to ask yourself: “OK, how can things go wrong?” (Actually with experience you'll learn to start asking that question right away.) In this session we'll look at data validation, sanitization, error handling, and user experience. This is arguably the most important session in the course. Most of the <em>effort</em> of programming often seems to come down to handling failure gracefully. Coming to peace with this early on is probably a good career move!
					</p>
				</section>
				<section id="session-7">
					<h1>
						<a href="7">Session 7</a><br>
						<small></small>
					</h1>
					<p>
						Alright, <em>now</em> we've got a guestbook! We can throw anything at it and it responds with grace and equanimity. What more could we possibly do with it? Well after error handling, a major “hidden” concern of programming is not just getting it to work under duress, but designing your programs in ways that enable maintenance, understandability, and, most importantly, re-use. DRY is an acronym that means “don't repeat yourself”. We'll look at what this means in general and for us in particular. The goal for this session will be to create an <em>interface</em> for our <em>implementation</em> of a guestbook datastore, and for our specific guestbook. In a sense, it's taking content vs presentation a step further.
					</p>
				</section>
				<section id="session-8">
					<h1>
						<a href="8">Session 8</a><br>
						<small></small>
					</h1>
					<p>
						We're approaching the finish line now. The next major topic will be migrating our app to use a more robust datastore: a MySQL database. This will enable a number of nice features of the sort that we all expect to find on modern web apps. Luckily, with all the abstraction and design work we've done, this step proves to be pretty painless! Since we so assiduously observed the DRY imperative, the amount of code we have to change is surprisingly small. One catch: there is a little extra work we'll have to do to protect our app from malicious attacks. This isn't a hard step, but it is a critical one.
					</p>
				</section>
				<section id="session-9">
					<h1>
						<a href="9">Session 9</a><br>
						<small></small>
					</h1>
					<p>
						Our app is pretty much complete. It was a long haul for such a simple app but most of the concerns we explored are things every app will need to address in some way. But our app doesn't exist in a vacuum. The web is an ecosystem: full of interconnections and relationships. Can we tap into that in some way? In this session we'll take a look at APIs: how web apps talk to one another. We'll add code to leverage a API, enhancing our app with images and interactivity.
					</p>
				</section>
				<section id="session-10">
					<h1>
						<a href="10">Session 10</a><br>
						<small></small>
					</h1>
					<p>
						Review questions, tie up loose ends.
					</p>
				</section>

			</div>
		</div>
	</div>
<?php
app()->setFragment('HTMLBodyContent', ob_get_clean());
app()->appendTo('HTMLBodyTail', '
	<script type="text/javascript" charset="utf-8">
		$(\'body\').scrollspy();
		// cause bootstrap\'s affix kinda sucks
		var sidebarOrigin = $(\'#sidebar-nav\').offset().top;
		$(window).scroll(function() {
			var $window = $(window);
			if ($window.scrollTop() > sidebarOrigin - 80) {
				$(\'#sidebar-nav\').addClass(\'affixed\');
			}
			else {
				$(\'#sidebar-nav\').removeClass(\'affixed\');
			}
		});

	</script>

');

app()->appendTo('HTMLHeadAdditions', '
	<style type="text/css" media="screen">
		.session-list section {
			border-top:1px solid #ddd;
			padding:.5em 1em 3em;
			margin:0;
		}
		.session-list section:nth-child(even) {
			background:#f8f8f8;
		}
	</style>
');

?>
