
$(document).ready(function() {
	var cells = (10 + Math.floor(Math.random() * 15));
	var nPotholes = 0;
	var walls = [
		{ start: { x: 0, y: 1 }, end: { x: 2, y: 1 } },
	];
	
	var madePothole = false;
	for (var i = 2 ; i < cells; i++) {
		if (Math.random() > 0.8 && !madePothole) {
			nPotholes++;
			// create a pothole
			walls.push(
				{ start: { x: i, y: 1 }, end: { x: i, y: 0 } }
			);
			walls.push(
				{ start: { x: i + 1, y: 0 }, end: { x: i + 1, y: 1 } }
			);
			madePothole = true;
		}
		else {
			walls.push(
				{ start: { x: i, y: 1 }, end: { x: i + 1, y: 1 } }
			);
		}
	}
	window.karelApp = new KarelApp($('#karel-exercise'), {
		gridDimensions: { x: cells, y: 3 },
		height: 250,
		width: cells * 50,
		cheesePouch: nPotholes,
		cheese: [],
		karelStart: { x: 1, y: 2 },
		walls: walls,
	});
	$('#karel-exercise .problem-description').html('\
		Move to the right. If Karel encounters a pothole, place cheese on the left edge of a pothole and stop.\
		Otherwise, continue to the eastern-most wall and then stop without putting down any cheese.\
	');
		
});
