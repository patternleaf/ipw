;(function($, undefined) {
	window.ipw = {};
	
	ipw.evalPHP = function(php, onSuccess, onError) {
		$.ajax({
			url: '/api/',
			data: {
				action: 'eval',
				php: php
			},
			success: function(data, textStatus, jqXHR) {
				onSuccess(data);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				onError(textStatus, errorThrown);
			}
		});
	};
})(jQuery)