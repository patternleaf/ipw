<!doctype html>
<html>
<head>
	<title>Accordion jQuery</title>
	<style type="text/css" media="screen">
	body {
		font-family:Helvetica, sans-serif;
	}
	#accordion {
		width:400px;
	}
	#accordion li {
		background:#777;
		border-radius:5px;
		padding:4px 8px;
		color:white;
		margin:0 0 10px;
	}
	#accordion li h2 {
		cursor:pointer;
	}
	#accordion li h2:hover {
		color:orange;
	}
	#accordion li.collapsed {
		
	}
	#accordion li.expanded {
		
	}
	</style>
</head>
<body>
	<ul id="accordion">
		<li>
			<h2>Item One</h2>
			<p class="content">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</li>
		<li class="visible-on-load">
			<h2>Item Two</h2>
			<p class="content">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</li>
		<li>
			<h2>Item Three</h2>
			<p class="content">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</li>
		<li>
			<h2>Item Four</h2>
			<p class="content">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</li>
		<li>
			<h2>Item Five</h2>
			<p class="content">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</li>
	</ul>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript">
	$(document).on('ready', function() {
		$('#accordion li')
			.not('.visible-on-load')
				.addClass('collapsed')
				.find('.content')
					.slideUp()
					.end()
				.end()
			.find('.visible-on-load')
				.addClass('expanded')
				.find('.content')
					.slideDown()
		;
		$('#accordion li').on('click', function() {
			$('#accordion li')
				.not(this)
				.addClass('collapsed')
				.find('.content')
					.slideUp()
			;
			$(this).addClass('expanded').find('.content').slideDown();
		});
	});

	</script>
</body>
</html>