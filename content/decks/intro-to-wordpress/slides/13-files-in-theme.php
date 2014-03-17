<div class="row">
	<h2>Files in a Theme</h2>
	<p>
		There are two required files. (Note that the only required file in a child theme is <code>style.css</code>).
	</p>
	<ul>
		<li>
			<code>style.css</code> - Your theme's stylesheet. <strong>Required</strong>. 
		</li>
		<li>
			<code>index.php</code> - Homepage, and the template for <em>every other view</em> that isn't explicitly defined. <strong>Required</strong>.
		</li>
	</ul>
	<p>
		Everything else is technically optional. These files are pulled in by WordPress as needed based on convention (e.g., the template tag <code>wp_header()</code> looks for a file called <code>header.php</code>) or just on how your theme is structured. It's all just PHP so you can build your theme however you want and totally ignore WordPress' conventions. Best not to do that until you know what you're doing. <em>In the simplest case</em>, some common files are:
	</p>
	<ul>
		<li>
			<code>header.php</code> - Contains the html and PHP needed to render the top of every page on your site. Generally, the <code>&lt;head></code> tag and everything within it (stylesheet inclusion, js, title) and the top of your site's HTML structure.
		</li>
		<li>
			<code>footer.php</code> - Mirror to <code>header.php</code>, the html and PHP that appears at the bottom of every page of your site.
		</li>
		<li>
			<code>single.php</code> - Code that runs when displaying a single post.
		</li>
		<li>
			<code>page.php</code> - Code that runs when displaying a single page.
		</li>
		<li>
			<code>functions.php</code> - Code that WordPress runs that allows your theme to configure itself: register admin panels, configure things whether it supports featured images per-post, and generally take over WordPress to the extent that it wants to.
		</li>
	</ul>
</div>
