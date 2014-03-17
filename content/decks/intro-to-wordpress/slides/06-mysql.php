<div class="row">
	<h2>Brief Aside: mySQL</h2>
	<p>How you create a new database for WordPress depends on your hosting situation</p>
	<ul>
		<li><a href="http://www.phpmyadmin.net/home_page/index.php">phpMyAdmin</a> is common</li>
		<li>
			least common denominator: a command-line mysql client
		</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-6">
		<p>Assuming you have a mysql user and password with db creation permissions&hellip;</p>
		<pre class="pretty-code non-editable" id="mysql-code" data-language="shell" style="height:300px">
># mysql -u<span style="background:#753424">{username}</span> -p -h<span style="background:#753424">{host}</span>
Enter password:

...

mysql> show databases;

...

mysql> create database my_wp_database;

...

mysql> show databases;

...

mysql> exit;
Bye
</pre>
	</div>
</div>