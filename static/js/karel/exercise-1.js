;(function($){
	var setup = function() {

		var locations = [
			{ x: 3, y: 4 },
			{ x: 0, y: 2 },
			{ x: 2, y: 0 }
		];
		$.each(locations, function(i, cell) {
			app.makeCrystal(cell.x, cell.y);
		});
		$('#crystals-in-pouch').html(0);
	};
	
	$(app).bind('ready', setup);
	$(app).bind('wasReset', setup);


	
})(jQuery);