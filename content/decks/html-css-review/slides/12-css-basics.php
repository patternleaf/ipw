<h2>CSS: Basic Rule</h2>
<div class="container">
	<p>
		Hover over the parts of the rule.
	</p>
	<figure class="diagram col-md-9" id="css-basic-rule-diagram">
<pre class="code" style="font-size:1.1em;">
<span class="token selector" data-name="Selector">h1</span> {
  <span class="token css-property" data-name="Property">font-size</span>:<span class="token css-value" data-name="Property Value">24px</span>;
  <span class="token css-property" data-name="Property">font-weight</span>:<span class="token css-value" data-name="Property Value">bold</span>;
}
</pre>
	<figcaption></figcaption>
	</figure>
</div>
<?php app()->appendTo('HTMLBodyTail', '
	<script type="text/javascript">
	$(\'#css-basic-rule-diagram\').find(\'span.token\').each(function() {
		var $caption = $(\'#css-basic-rule-diagram\').find(\'figcaption\');
		$(this).hover(function() {
			$(this).addClass(\'inverse\');
			$caption.html($(this).data(\'name\'));
		}, function() {
			$(this).removeClass(\'inverse\');
			$caption.html(\'\');
		});
	});
	</script>
');
?>