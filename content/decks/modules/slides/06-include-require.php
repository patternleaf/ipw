<h2>PHP include and require</h2>

<p>
	In PHP the basic method to use a plugin is to use the <a href="http://php.net/include">include</a> function.
</p>

<div class="pretty-code non-editable" data-language="html" id="include-example" style="height:150px; width:700px;">
&lt;?php
include "path/to/file.php"
?>
</div>

<p>
	The contents of <code>file.php</code> will be inserted and evaluated <strong>inline</strong> at the point of inclusion.
</p>
<p>
	You can also have PHP halt execution if a file can't be found by using <a href="http://php.net/require">require</a> instead. 
</p>