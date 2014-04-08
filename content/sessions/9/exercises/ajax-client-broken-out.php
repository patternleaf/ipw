<html>
	<head>
		<title>Simple AJAX Demo</title>
		<style type="text/css" media="screen">
			#target {
				width:80%;
				height:400px;
				border:1px solid #555;
			}
		</style>
	</head>
	<body>
		<h1>Simple AJAX</h1>
		<h2>Pick Your Lorem</h2>
		<form id="ajax-selector">
			<h2>Select source</h2>
			<label><input type="radio" name="lorem-type" value="traditional">Traditional</label></br>
			<label><input type="radio" name="lorem-type" value="cupcake">Cupcake</label></br>
			<label><input type="radio" name="lorem-type" value="lorizzle">Lorizzle</label></br>
			<button id="fetch" type="submit" value="Fetch">Fetch</button>
		</form>
		<div id="target">
		</div>
		<script src="jquery-2.1.0.min.js"></script>
		<script>
			var onReady = function() {
				$('#ajax-selector').on('submit', onFormSubmit);
			};

			var onFormSubmit = function() {
				$.get('ajax-server.php', { "lorem-type": $('input:checked').val() }, onFetchSuccess);
				return false;
			};

			var onFetchSuccess = function(response) {
				$('#target').html(response);
			};
			$(document).on('ready', onReady);
		</script>
	</body>
</html>
