<!doctype html>
<html>
<head>
	<title>Guestbook</title>
	<meta charset="UTF-8">
</head>
<body>
	<header>
		<h1>Guestbook</h1>
	</header>
	<section id="guest-signatures">
		<ul>
			<li>
				<h3>Hi there</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<div class="byline">Some Person</div>
				<div class="dateline">10:03pm, August 24, 2012</div>
			</li>
			<li>
				<h3>What's up?</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<div class="byline">Some Other Person</div>
				<div class="dateline">7:43pm, August 25, 2012</div>
			</li>
		</ul>
	</section>
	<section id="submit">
		<h2>Hi! Leave a note!</h2>
		<form>
			<label>
				<span>Name:</span>
				<input type="text" name="name">
			</label>
			<label>
				<span>Title:</span>
				<input type="text" name="title">
			</label>
			<label>
				<span>Message:</span>
				<textarea name="message"></textarea>
			</label>
			<input type="submit" value="Say It!">
		</form>
	</section>
</body>
</html>