<h2>Browser Defaults</h2>
<div class="container">
	<ul>
		<li>Ultimately, <em>every</em> element is equivalent in terms of CSS presentation, but not in terms of semantics.</li>
		<li>An <span class="token tag">h1</span> tag can behave like a <span class="token tag">span</span> tag in terms of box model.</li>
		<li>But an <span class="token tag">h1</span> tag cannot (or should not) contain <span class="token tag">li</span> list items. That would be semantically non-sensical.</li>
		<li>Browsers have certain default styles for elements, which are suggested by the spec.</li>
		<li>Sometimes those get in the way of what you need, so you have CSS resets&hellip;</li>
	</ul>
	<div class="slide">
		<pre class="code">
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
}
</pre>
	</div>
</div>