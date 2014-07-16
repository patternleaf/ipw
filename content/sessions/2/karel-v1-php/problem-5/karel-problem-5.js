
$(document).ready(function() {

	var xCells = (5 + Math.floor(Math.random() * 10));
	var yCells = 3;
	window.karelApp = new KarelApp($('#karel-exercise'), {
		gridDimensions: { x: xCells, y: yCells },
		height: yCells * 50,
		width: xCells * 50,
		cheesePouch: 2,
		cheese: [],
		walls: [],
		relativePath: '../'
	});
	$('#karel-exercise .problem-description').html('\
	Write a program wherein Karel finds the <em>horizontal</em> midpoint of the world, regardless of the horizontal size of the world.<br>\
	For example, in a world that is 7 cells across, at the end of the program Karel should be in cell (4, 1).<br>\
	In worlds with an even number of horizontal cells, Karel can wind up in either of the two mid-point cells.<br>\
	Karel will always start at (1, 1), facing east.<br>\
	Karel\'s cheese pouch will contain just enough cheese to solve the problem (hint hint), if you don\'t leave any cheese lying around.\
	');


});
