<div class="row">
	<h2>Child Themes</h2>
	<p>Child themes allow you take a theme as a base and override its templates, css, and overall behavior.</p>

	<h3>To Make a Child Theme</h3>
	<ol>
		<li>Create a new folder in <code>{wp-install-root}/wp-content/themes</code>. Name it something in lowercase and use dashes instead of spaces.</li>
		<li>In that folder create a file called <code>style.css</code>.</li>
		<li>
			Put the code below in.
		</li>
	</ol>
	<p>Full instructions can be found <a href="https://codex.wordpress.org/Child_Themes">on the codex</a>.</p>

	<div class="pretty-code non-editable" id="wp-child-theme" style="height:300px; width:700px;">/*
Theme Name: {Your Theme Name}
Description: A description of your theme.
Author: {Your Name}
Template: {folder name of the theme you're overriding}
*/

@import url("../{folder name of the theme you're overriding}/style.css");
	</div>

</div>
