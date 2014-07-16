
$(document).ready(function() {
	window.karelApp = new KarelApp($('#karel-exercise'), {
		gridDimensions: { x: 10, y: 3 },
		height: 250,
		width: 800,
		cheesePouch: 6,
		cheese: [],
		walls: [],
		relativePath: '../'
	});
	$('#karel-exercise .problem-description').html('\
		Place cheese at the left-most and right-most cell of every row.\
	');
		
});
