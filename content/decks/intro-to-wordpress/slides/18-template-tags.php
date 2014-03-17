<div class="row">
	<h2>The Query and The Loop</h2>
	<ul>
		<li>By default, when WordPress renders any page, there is a main <em>query</em> and a resulting main <em><a href="http://codex.wordpress.org/The_Loop">loop</a></em>.
		<li>The query is determined by the URL, primarily. Are we looking at the about page or at the archives for November?</li>
		<li>The loop is a PHP <code>while</code> loop that loops through all the posts returned by the query.</li>
		<li>For single pages and single posts, there will only be one post in the result.</li>
	</ul>
</div>
<div class="row slide">
	<div class="col-md-6">
		<h3>The World's Simplest Index.php</h3>
		<div class="pretty-code non-editable" data-language="php" style="width:600px; height:300px;" id="simplest-loop">
&lt;?php
get_header();
if (have_posts()) :
   while (have_posts()) :
      the_post();
         the_content();
   endwhile;
endif;
get_sidebar();
get_footer(); 
?>
		</div>
	</div>
	<div class="col-md-6">
		<p style="margin-top:20%">Taken from <a href="http://codex.wordpress.org/The_Loop_in_Action">The Loop in Action</a> on the codex.</p>
	</div>
</div>