<h2>Selector Language</h2>
<div class="container">
	<div class="row">
		<div class="slide">
			<figure class="diagram col-md-6">
		<pre class="code" style="font-size:0.7em;">
<span class="token selector">h1#masthead</span> {
  background:url(logo.png);
}
		</pre>
				<figcaption>"With id of". <a href="http://www.w3.org/TR/css3-selectors/#id-selectors">See the spec</a>.</figcaption>
			</figure>
		</div>
		<div class="slide">
			<figure class="diagram col-md-6">
		<pre class="code" style="font-size:0.7em;">
<span class="token selector">.unimportant</span>,
<span class="token selector">.help</span> {
  color:gray;
}
		</pre>
				<figcaption>Multiple selectors can trigger a single rule.</figcaption>
			</figure>
		</div>
		
		
	</div>
	<div class="row">
		<div class="slide">
			<figure class="diagram col-md-12">
		<pre class="code" style="font-size:0.7em;">
<span class="token selector">a:hover</span> { ... }
<span class="token selector">span[hello="Cleveland"]</span> { ... }
<span class="token selector">img:nth-of-type(2n+1)</span> { ... }
		</pre>
				<figcaption><a href="http://www.w3.org/TR/css3-selectors/">Lots of other possibilities</a>.</figcaption>
			</figure>
		</div>
	</div>
</div>
