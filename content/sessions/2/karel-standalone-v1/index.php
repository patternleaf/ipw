<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Karel the Robot</title>
	<link rel="stylesheet/less" href="less/styles.less" type="text/css">
	<script src="js/less-1.3.3.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
	<script type="text/javascript" src="js/romano/dependencies/raphael-1.3.2.js"></script>
	<script type="text/javascript" src="js/romano/classes/Romano.js"></script>
	<script type="text/javascript" src="js/romano/classes/Sprite.js"></script>
	<script type="text/javascript" src="js/romano/classes/Surface.js"></script>
	<script type="text/javascript" src="js/romano/classes/Renderer.js"></script>
	<script type="text/javascript" src="js/romano/classes/RaphaelSurface.js"></script>
	<script type="text/javascript" src="js/romano/classes/RaphaelRenderer.js"></script>
	<script type="text/javascript" src="js/romano/classes/Viewport.js"></script>

	<script type="text/javascript" src="js/karel/karel.js"></script>
	<script type="text/javascript" src="js/karel/classes/Karel.js"></script>
	<script type="text/javascript" src="js/karel/classes/Cheese.js"></script>
	
</head>
<body>

	<div id="karel-exercise">
		<p class="problem-description"></p>
		<div class="karel-viewport"></div>
		<div class="karel-cheese-pouch-count"></div>
		<button class="karel-reset">Reset</button>
	</div>

<?php /*
	
	Update these script tags to load each problem and its solution. For 
	example, to solve problem 2, copy the solution template file, rename it to 
	karel-solution-2.js, and update the following two lines to:
	
	<script type="text/javascript" src="karel-problem-2.js"></script>
	<script type="text/javascript" src="karel-solution-2.js"></script>

*/?>
	<script type="text/javascript" src="karel-problem-1.js"></script>
	<script type="text/javascript" src="karel-solution-template.js"></script>

</body>
</html>