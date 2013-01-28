;(function($) {
	window.CheeseQuest = Romano.Application.extend({
	}, 'CheeseQuest');
	window.app = new CheeseQuest();
	
	$(document).ready(function() {

		app.viewport = window.viewport = new Romano.Viewport({
			width: 800,
			height: 600,
			frameRate: 60,
			camera: {
				maxAcceleration: 10,
				damping: .7,
				friction: .2
			}
		}, $('#viewport-container').get(0));

		app.wrappedSpace = new Romano.WrappedSpace(
			{ width: 8000, height: 6000 },
			app.viewport,
			{ x: 0, y: 0 }
		);

		app.karel = app.gir = window.karel = window.gir = new CheeseQuest.Gir(app.viewport);

		$(app.karel).bind('endFrame', function() {
			var p = this.getPosition();
			var vp = this.getViewportPosition();
			var ka = this.getAcceleration();
//			var cp = this.viewport.camera.position;
//			var cv = this.viewport.camera.velocity;
//			var ca = this.viewport.camera.acceleration;
			var s = [];
			s.push('framerate: ' + this.viewport.getFPS().toString().substr(0, 6));
			s.push('karel world: {' + p.x.toString().substr(0, 6) + ', ' + p.y.toString().substr(0, 6) + '}');
			$('#debug').html(s.join('<br/>'));
		});

		$(app.karel).bind('wrapped', function() {
			var p = app.karel.getPosition();
			app.viewport.setPosition(p.x - 400, p.y - 300);
			for (var i = 0; i < app.stars.length; i++) {
				app.stars[i].setViewportPosition(
					Math.random() * app.viewport.width,
					Math.random() * app.viewport.height
				);
			}
		});

		app.karel.setPosition(400, 300);

		app.keyRepeatMask = [];
		app.viewport.keydown(function(event) {
			if (app.keyRepeatMask.indexOf(event.which) != -1) {
				return;
			}
			app.keyRepeatMask.push(event.which);
			switch (event.which) {
				case 38: // up arrow
					app.thrustOn();
				break;
				case 39: // right arrow
					app.karel.rotate(2);
				break;
				case 40: // down arrow
					app.thrustOn();
				break;
				case 37: // left arrow
					app.karel.rotate(-2);
				break;
			}
			return false;
		});
		app.viewport.keyup(function(event) {
			var maskIndex = app.keyRepeatMask.indexOf(event.which);
			if (maskIndex == -1) {
				return;
			}
			app.keyRepeatMask.splice(maskIndex, 1);
			switch (event.which) {
				case 38: // up arrow
					app.thrustOff();
				break;
				case 39: // right arrow
					app.karel.rotate(-2);
				break;
				case 40: // down arrow
					app.thrustOff();
				break;
				case 37: // left arrow
					app.karel.rotate(2);
				break;
			}
			return false;
		});

		app.stars = [];

		for (var i = 0; i < 10; i++) {
			app.stars.push(new CheeseQuest.Star('star-' + i, app.viewport, { 
				position: {
					x: Math.random() * app.viewport.width, 
					y: Math.random() * app.viewport.height 
				}
			}));
		}
		
		app.crystals = [];
		for (var i = 0; i < 10; i++) {
			app.crystals.push(new CheeseQuest.Crystal('crystal-' + i, app.viewport, {
				position: {
					x: Math.random() * app.wrappedSpace.width,
					y: Math.random() * app.wrappedSpace.height,
				}
			}))
		}


		app.saucers = [];
		for (var i = 0; i < 1; i++) {
			app.saucers.push(new CheeseQuest.Saucer('saucer-' + i, app.viewport, {
				position: {
					x: Math.random() * app.wrappedSpace.width,
					y: Math.random() * app.wrappedSpace.height,
				}
			}));
		}

		viewport.run();
		app.drawBackground();
		$(app).trigger('ready');

		app.hud = new Romano.WrappedHUD(app.viewport, app.wrappedSpace, .03);
		$(app.viewport).bind('endFrame', function() {
			app.hud.update();
		})
		
		$(app.karel).bind('pickedUpCrystal', function() {
			$('#crystal-pouch').html(app.karel.crystalPouch.length + ' Crystals Found');
			$('#crystal-count').html((app.crystals.length - app.karel.crystalPouch.length) + ' Crystals To Go');
		});
	});
	
	app.thrust = function() {
		var r = (app.karel.getRotation() - 90);
		app.viewport.addAcceleration(Romano.makeVector(r, 20));
		app.karel.addAcceleration(Romano.makeVector(r, 20));
	}
	
	app.thrustOff = function() {
		$(app.viewport).unbind('beginFrame', app.thrust);
		this.karel.turnJetsOff();
	};
	
	app.thrustOn = function() {
		$(app.viewport).bind('beginFrame', app.thrust);
		this.karel.turnJetsOn();
	};
	
	
	app.drawBackground = function() {
		var w = app.viewport.width - 1;
		var h = app.viewport.height - 1;
		//app.gridSize = w / app.gridDimensions;
		var p = app.viewport.paper;
		

		var rect = p.rect(0, 0, w, h).attr('fill', '#222222');
		rect.toBack();
	};

	
})(jQuery);