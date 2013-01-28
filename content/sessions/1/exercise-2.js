;(function($) {
	$(document).ready(function() {
		var k1 = new KarelApp($('#karel-1'), {
			gridDimensions: { x: 8, y: 3 },
			karelStart: { x: 1, y: 1 },
			cheese: [],
			walls: [],
			goal: { x: 8, y: 3 }
		});
		var k2 = new KarelApp($('#karel-2'), {
			gridDimensions: { x: 5, y: 5 },
			karelStart: { x: 1, y: 1 },
			cheese: [],
			walls: [
				{ start: { x: 3, y: 0 }, end: { x: 3, y: 3 } },
				{ start: { x: 3, y: 3 }, end: { x: 5, y: 3 } },
				
				{ start: { x: 0, y: 4 }, end: { x: 2, y: 4 } },
				{ start: { x: 2, y: 4 }, end: { x: 2, y: 5 } },
			],
			goal: { x: 5, y: 5 }
		});

		var k3 = new KarelApp($('#karel-3'), {
			gridDimensions: { x: 4, y: 4 },
			karelStart: { x: 1, y: 1 },
			cheese: [
				{ x: 2, y: 1 },
			],
			walls: [],
			goal: { x: 5, y: 5 }
		});

	});
})(jQuery);