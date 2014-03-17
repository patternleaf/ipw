<div class="row">
	<h2>Parts of a Theme</h2>
	<ul>
		<li>Regular HTML</li>
		<li>"template tags" (actually just PHP)</li>
		<li>"The Loop"</li>
		<li>And a bunch of WordPress conventions and best practices.</li>
	</ul>
	<p><strong>Conventions?</strong></p>
	<p>
		For example, if you want to override the template used for just the about page, and the about page's <dfn>slug</dfn> is "about", you can just create a file called <code>page-about.php</code> and WordPress will use that template. The <a href="https://codex.wordpress.org/Template_Hierarchy">template hierarchy</a> gives you a lot of flexibility.
	</p>
	<p><strong>Best Practices?</strong></p>
	<p>
		For example, you can include scripts into the header in lots of different ways, but the preferred way is to use template tag (née PHP function) <a href="http://codex.wordpress.org/Function_Reference/wp_enqueue_script"><code>wp_enqueue_script</code></a>.
	</p>
</div>
