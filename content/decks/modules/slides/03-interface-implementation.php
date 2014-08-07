<h2>What's a module?</h2>
<ul>
	<li class="slide">Usually exposes an <dfn><a href="http://en.wikipedia.org/wiki/Interface_(computing)">interface</a></dfn>.</li>
	<li class="slide">Which is "backed" by an <dfn><a href="http://en.wikipedia.org/wiki/Implementation">implementation</a></dfn>.</li>
</ul>

<p class="slide">
	The interface is usually just the set of functions provided by the module. They're the <em>contract</em> for the module. "I agree to do these things".
</p>

<p class="slide">
	<em>How</em> the module does those things is the implementation, which we as clients of the module need not know.
</p>