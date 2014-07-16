
$(document).ready(function() {
	var cells = (4 + Math.floor(Math.random() * 6));
	window.karelApp = new KarelApp($('#karel-exercise'), {
		gridDimensions: { x: cells, y: 3 },
		height: 250,
		width: cells * 80,
		cheesePouch: 6,
		cheese: [],
		walls: [],
		relativePath: '../'
	});
	$('#karel-exercise .problem-description').html('\
		Place cheese at the left-most and right-most cell of every row. The width of the world may be different on every run.\
	');
		
});
