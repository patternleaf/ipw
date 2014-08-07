<h2>Guestbook Module</h2>

<p>
	We're going to make our guestbook app into a module which should be portable.
</p>

<p>
	We need to agree upon an interface. Then we will each implement the interface indepdendently. At the end, we should be able to exchange modules and see that everything still works.
</p>

<h3>Basic Strategy</h3>

<p>
	We'll split the guestbook into two files: <code>index.php</code> and <code>guestbook-app.php</code>
</p>

<ul>
	<li><strong>index.php</strong>: The client of the module, has markup and calls to the guestbook module.</li>
	<li><strong>guestbook-app.php</strong>: The "guts" of the guestbook.</li>
</ul>