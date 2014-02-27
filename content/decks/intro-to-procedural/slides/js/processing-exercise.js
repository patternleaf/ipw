$(document).ready(function() {
	var runExample = function() {
		var editor = $('#exercise-1-input').data('editor');
		if (editor) {
			var content = editor.getValue();
			var ex = function(processing) {
				var errorTriggered = false;
				var center = {
					x: 100,
					y: 100
				};
				var pepperoniLocs = [];
				var generatePepperoniLocs = function() {
					for (var i = 0; i < processing.random(10, 20); i++) {
						pepperoniLocs[i] = {
							x: center.x + processing.random(-60, 60),
							y: center.y + processing.random(-60, 60)
						};
					}
				};
				var cheeseLocs = [];
				var generateCheeseLocs = function() {
					for (var i = 0; i < processing.random(50, 80); i++) {
						cheeseLocs[i] = {
							x: center.x + processing.random(-55, 55),
							y: center.y + processing.random(-55, 55),
							r: processing.random(360) * (180 / processing.PI)
						}
					}
				};
				var makeCrust = function() {
					processing.fill(220, 200, 180);
					processing.ellipse(center.x, center.y, 180, 180);
				};
				var spreadSauce = function() {
					processing.fill(200, 120, 100);
					processing.ellipse(center.x, center.y, 160, 160);
				};
				var slicePepperoni = function() {
					generatePepperoniLocs();
					processing.fill(240, 120, 100);
					for (var i = 0; i < pepperoniLocs.length; i++) {
						processing.ellipse(
							pepperoniLocs[i].x,
							pepperoniLocs[i].y,
							10, 10
						);
					}
				};
					
				var sliceCheese = function() {
					generateCheeseLocs();
					processing.fill(240, 240, 220);
					for (var i = 0; i < cheeseLocs.length; i++) {
						processing.pushMatrix();
						processing.translate(cheeseLocs[i].x, cheeseLocs[i].y);
						processing.rotate(cheeseLocs[i].r);
						processing.rect(0, 0, 5, 13);
						processing.popMatrix();
					}
				};

				processing.setup = function() {
					processing.size(200, 200);
					processing.noLoop();
				};
				processing.draw = function() {
					processing.background(230);
					try {
						if (!errorTriggered) {
							eval(content);
						}
					}
					catch (e) {
						errorTriggered = true;
						alert('Oops! The computer couldn\'t understand your recipe.');
					}
				};
			};
			$('#exercise-1-output').replaceWith('<canvas id="exercise-1-output">');
			var $canvas = $('#exercise-1-output');
			var processingInstance = new Processing($canvas.get(0), ex);
		}
		return false;
	};
	$('button#exercise-1-eval').click(runExample);
	runExample();
});