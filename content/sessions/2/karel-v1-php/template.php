<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Karel the Robot</title>
	<link rel="stylesheet/less" href="../less/styles.less" type="text/css">
	<script src="../js/less-1.3.3.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="../js/jquery-1.8.3.js"></script>
	<script type="text/javascript" src="../js/romano/dependencies/raphael-1.3.2.js"></script>
	<script type="text/javascript" src="../js/romano/classes/Romano.js"></script>
	<script type="text/javascript" src="../js/romano/classes/Sprite.js"></script>
	<script type="text/javascript" src="../js/romano/classes/Surface.js"></script>
	<script type="text/javascript" src="../js/romano/classes/Renderer.js"></script>
	<script type="text/javascript" src="../js/romano/classes/RaphaelSurface.js"></script>
	<script type="text/javascript" src="../js/romano/classes/RaphaelRenderer.js"></script>
	<script type="text/javascript" src="../js/romano/classes/Viewport.js"></script>

	<script type="text/javascript" src="../js/karel/karel.js"></script>
	<script type="text/javascript" src="../js/karel/classes/Karel.js"></script>
	<script type="text/javascript" src="../js/karel/classes/Cheese.js"></script>
	
</head>
<body>

	<div id="karel-exercise">
		<h1>Your Task:</h1>
		<p class="problem-description"></p>
		<div class="karel-viewport"></div>
		<div class="karel-cheese-pouch-count"></div>
	</div>

	<script type="text/javascript" src="karel-problem-<?php echo KAREL_PROBLEM_NUMBER;?>.js"></script>
	
	<?php
		include('PHP2js.php');
		ob_start();
		if (isset($_GET['solved']) && file_exists('../../karel-solution-'.KAREL_PROBLEM_NUMBER.'.php')) {
			new PHP2js('../../karel-solution-'.KAREL_PROBLEM_NUMBER.'.php');
		}
		else {
			new PHP2js('solution.php');
		}
		$solution = ob_get_clean();
	?>
	
	<script>
		
		$(document).ready(function() {
			
			karelApp.run(function(karel) {
				
				$.each([ 
					'turnLeft', 
					'move',
					'pickUpCheese',
					'putDownCheese',
					'frontIsClear',
					'cheeseIsPresent',
					'isFacingSouth',
					'isFacingNorth',
					'isFacingEast',
					'isFacingWest'
				], function(i, name) {
					window[name] = karel[name];
				});
			
			<?php echo $solution; ?>
		
			});
		});
	</script>

</body>
</html>