
$(document).ready(function() {
	var cells = (10 + Math.floor(Math.random() * 15));
	var nPotholes = 0;
	var walls = [
		{ start: { x: 1, y: 0 }, end: { x: 1, y: 1 } },
		{ start: { x: 1, y: 1 }, end: { x: 2, y: 1 } }
	];
	
	var justMadePothole = false;
	for (var i = 2 ; i < cells; i++) {
		if (Math.random() > 0.5 && !justMadePothole) {
			nPotholes++;
			// create a pothole
			walls.push(
				{ start: { x: i, y: 1 }, end: { x: i, y: 0 } }
			);
			walls.push(
				{ start: { x: i + 1, y: 0 }, end: { x: i + 1, y: 1 } }
			);
			justMadePothole = true;
		}
		else {
			walls.push(
				{ start: { x: i, y: 1 }, end: { x: i + 1, y: 1 } }
			);
			justMadePothole = false;
		}
	}
	window.karelApp = new KarelApp($('#karel-exercise'), {
		gridDimensions: { x: cells, y: 3 },
		height: 250,
		width: cells * 50,
		cheesePouch: nPotholes,
		cheese: [],
		walls: walls,
	});
	$('#karel-exercise .problem-description').html('\
		Fill every pothole with cheese, except for Karel\'s starting pothole. Don\'t miss any and don\'t run into a wall.\
		Karel will always start at (1, 1) and he will always be facing a wall.\
		There will never be two potholes in adjacent cells.\
	');
		
});
