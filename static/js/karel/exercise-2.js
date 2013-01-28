;(function($){
	var setup = function() {

		app.distributeCrystalsRandomly(6);
		$('#crystals-in-pouch').html(0);
		$('#toggle-animate').removeAttr('checked');
	};
	
	$(app).bind('ready', setup);
	$(app).bind('wasReset', setup);


	
})(jQuery);