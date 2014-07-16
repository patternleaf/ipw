;(function($) {
	KarelApp.Cheese = Romano.Sprite.extend({
		init: function(id, viewport, initialState, relativePath) {
			var defaultState = {
				position: { x: 0, y: 0 },
				accel:{ x: 0, y: 0 },
				velocity: { x: 0, y: 0 },
				friction: .57,
				damping: 1,
				maxAcceleration: 3,
				rotationFriction: .9,
				collidable: true
			};
			this._super(
				id, 
				viewport, 
				new Romano.RaphaelRenderer(),
				$.extend(defaultState, (initialState || {}))
			);
			this.renderer.setSource(relativePath + 'js/karel/images/cheese.svg');
			$(this).bind('endFrame', this.onEndFrame._plBind(this));
		},

		onEndFrame: function() {
			/*
			if (Math.random() > .99) {
				this.setAngularMomentum(Math.random() > .5 ? 5 + (Math.random() * 5) : -5 - (Math.random() * 5));
			}
			*/
		}

	}, 'KarelApp.Cheese');

})(jQuery);

