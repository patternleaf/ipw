(function($) {
	KarelApp.Karel = Romano.Sprite.extend({
		init: function(viewport, appInstance) {
			var defaultState = {
				position: { x: 0, y: 0 },
				accel:{ x: 0, y: 0 },
				velocity: { x: 0, y: 0 },
				friction: .2,
				damping: .7,
				maxAcceleration: 10,
				scale: { x: .6, y: .6 },
				rotationDamping: .3,
				shouldCheckCollisions: false
			};
			this._super(
				'karel', 
				viewport,
				new Romano.RaphaelRenderer(),
				defaultState
			);

			this.body = new Romano.Sprite('gir-body', viewport, new Romano.RaphaelRenderer(), {
				position: { x: -20, y: 0 }
			});
			this.body.getRenderer().setSource('js/karel/images/gir-body.svg');
			this.head = new Romano.Sprite('gir-head', viewport, new Romano.RaphaelRenderer(), {
				position: { x: -20, y: -60 },
				rotationCenter: { x: 25, y: 50 }
			});
			this.head.getRenderer().setSource('js/karel/images/gir-head.svg');
			this.leftJet = new Romano.Sprite('gir-left-jet', viewport, new Romano.RaphaelRenderer(), {
				position: { x: -20, y: 56 },
				rotationCenter: { x: 0, y: 0 }
			});
			this.leftJet.getRenderer().setSource('js/karel/images/flame-1.svg', function(sprite) {
				sprite.setRotationCenter(0, 0);
				sprite.setScale(1, 0);
			});

			this.rightJet = new Romano.Sprite('gir-right-jet', viewport, new Romano.RaphaelRenderer(), {
				position: { x: -2, y: 58 }, 
				rotationCenter: { x: 0, y: 0 }
			});
			this.rightJet.getRenderer().setSource('js/karel/images/flame-1.svg', function(sprite) {
				sprite.setRotationCenter(0, 0);
				sprite.setScale(1, 0);
			});

			this.addChild(this.leftJet);
			this.addChild(this.rightJet);
			this.addChild(this.body);
			this.addChild(this.head);

			this.head.setRotationCenter(25, 50);
			this.leftJet.setRotationCenter(0, 0);

			this.setRotation(0);
			this.cheesePouch = 0;
			this.direction = 'left';
			
			this.jetsOn = false;
			this.rotationAccel = 0;

			this.appInstance = appInstance;
			//this.debug = { bbox: true, position: true };

			$(this).bind('beginCollision', this.handleCollision._plBind(this));
			$(this).bind('endFrame', (function() {
				this.addAngularMomentum(Math.min(this.rotationAccel, 3));
			})._plBind(this));
		},
		
		beginFrame: function() {
			//this.surface.
			//console.dir(this.friction)
		},
		
		handleCollision: function(event, collidee) {
			// console.log('player colliding with ' + collidee.id);
			// if (collidee instanceof CheeseQuest.Cheese) {
			// 	this.cheesePouch.push(collidee);
			// 	$(this).trigger('pickedUpCheese');
			// 	collidee.hide();
			// }
		},

		turnJetsOn: function() {
			this.jetsOn = true;
			setTimeout((function() {
				if (this.jetsOn) {
					var f = arguments.callee;
					this.rightJet.setScale(1, Math.random());
					this.leftJet.setScale(1, Math.random());
					this.jetTimer = setTimeout(f._plBind(this), 50);
				}
			})._plBind(this), 50);
		},

		turnJetsOff: function() {
			this.jetsOn = false;
			this.rightJet.setScale(1, 0);
			this.leftJet.setScale(1, 0);
		},

		rotate: function(amt) {
			this.rotationAccel += amt;
			//this.head.addAngularMomentum(amt);
			//this.addAngularMomentum(amt);
		},
		
		// @param cheese number
		setCheesePouch: function(cheese) {
			this.cheesePouch = cheese;
			$(this).trigger('cheesePouchCountChanged', [this.cheesePouch]);
		},
		
		// @return number
		getCheesePouch: function() {
			return this.cheesePouch;
		},
		
		pickUpCheese: function() {
			var cell = this.appInstance.getKarelCell();
			if (this.appInstance.cheeseExistsInCell(cell)) {
				this.appInstance.removeCheeseInCell(cell);
				this.cheesePouch++;
				$(this).trigger('cheesePouchCountChanged', [this.cheesePouch]);
			}
			else {
				throw new KarelApp.NoCheeseInCellException();
			}
		},
		
		putDownCheese: function() {
			var cell = this.appInstance.getKarelCell();
			if (this.cheesePouch > 0) {
				this.appInstance.placeCheeseInCell(cell);
				this.cheesePouch--;
				$(this).trigger('cheesePouchCountChanged', [this.cheesePouch]);
			}
			else {
				throw new KarelApp.NoCheeseInPouchException();
			}
		},
		
		getCellAddressInFront: function() {
			var cell = this.appInstance.getKarelCell();
			var frontCell;
			switch (this.direction) {
				case 'up':
					frontCell = { x: cell.x, y: cell.y + 1 };
				break;
				case 'right':
					frontCell = { x: cell.x + 1, y: cell.y };
				break;
				case 'left':
					frontCell = { x: cell.x - 1, y: cell.y };
				break;
				case 'down':
					frontCell = { x: cell.x, y: cell.y - 1 };
				break;
			}
			return frontCell;
		},
		
		move: function() {
			if (this.frontIsClear()) {
				var nextCell = this.getCellAddressInFront();
				this.appInstance.setKarelCell(nextCell);
			}
			else {
				throw new KarelApp.WallException();
			}
		},
		
		turnLeft: function() {
			switch (this.direction) {
				case 'up':
					this.setDirection('left');
				break;
				case 'right':
					this.setDirection('up');
				break;
				case 'left':
					this.setDirection('down');
				break;
				case 'down':
					this.setDirection('right');
				break;
			}
		},
		
		frontIsClear: function() {
			var cell = this.appInstance.getKarelCell();
			var nextCell = this.getCellAddressInFront();
			return !(this.appInstance.wallIsInWay(cell, nextCell));
		},
		
		// @return string
		getDirection: function() {
			return this.direction;
		},

		setDirection: function(direction) {
			switch (direction) {
				case 'up':
					this.direction = 'up';
					this.setRotation(270);
					this.setScale(-1 * Math.abs(this.scale.x), this.scale.y);
				break;
				case 'down':
					this.direction = 'down';
					this.setRotation(90);
					this.setScale(-1 * Math.abs(this.scale.x), this.scale.y);
				break;
				case 'left':
					this.direction = 'left';
					this.setRotation(0);
					this.setScale(Math.abs(this.scale.x), this.scale.y);
				break;
				case 'right':
					this.direction = 'right';
					this.setRotation(0);
					this.setScale(-1 * Math.abs(this.scale.x), this.scale.y);
				break;
			}
		}

	}, 'KarelApp.Karel');


/*
	app.Karel = function(parent, initialState) {
		var defaultState = {
			position: { x: 0, y: 297 },
			accel:{ x: 0, y: 0 },
			velocity: { x: 0, y: 0 },
			friction: .57,
			damping: .8,
			maxAcceleration: 3
		};
		Romano.Sprite.apply(this, ['karel', parent, $.extend(defaultState, (initialState || {}))]);
		this.setSource('/code/karel/images/gir.svg');
		this.direction = 'right';
		this.setRotation(0);
		this.setScale(-.6, .6);
		this.crystalPouch = [];
		
		$(this).bind('collision', this.handleCollision._plBind(this));
		
	};
	$.extend(app.Karel.prototype, Romano.Sprite.prototype);
	
	app.Karel.prototype.reset = function() {
		this.setPosition(0, 297);
		this.setRotation(0);
		this.direction = 'right';
		this.setScale(-.6, .6);
		this.nCrystals = 0;
	};
	
	app.Karel.prototype.handleCollision = function(event, collidee) {
		console.log('karel colliding with ' + collidee.id);
	};
	
	app.Karel.prototype.moveForward = app.timedFunction(function() {
		var pos = this.getPosition();
		var center = this.getRotationCenter();
		switch (this.direction) {
			case 'up':
				if (pos.y + center.y - app.gridSize > 0) {
					this.setPosition(pos.x, pos.y - app.gridSize);
				}
			break;
			case 'right':
				if (pos.x + app.gridSize + center.x < app.gridSize * app.gridDimensions.x) {
					this.setPosition(pos.x + app.gridSize, pos.y);
				}
			break;
			case 'left':
				if (pos.x + center.x - app.gridSize > 0) {
					this.setPosition(pos.x - app.gridSize, pos.y );
				}
			break;
			case 'down':
				if (pos.y + app.gridSize + center.y < app.gridSize * app.gridDimensions.y) {
					this.setPosition(pos.x, pos.y + app.gridSize);
				}
			break;
		}
	});
	
	app.Karel.prototype.rotateClockwise = app.timedFunction(function() {
		switch (this.direction) {
			case 'up':
				this.direction = 'right';
				this.setRotation(0);
				this.setScale(-.6, .6);
			break;
			case 'right':
				this.direction = 'down';
				this.setRotation(90);
				this.setScale(-.6, .6);
			break;
			case 'left':
				this.direction = 'up';
				this.setRotation(270);
				this.setScale(-.6, .6);
			break;
			case 'down':
				this.direction = 'left';
				this.setRotation(0);
				this.setScale(.6, .6);
			break;
		}
	});

	app.Karel.prototype._isOverACrystal = function() {
		for (var i = 0; i < app.crystals.length; i++) {
			//console.debug(app.crystals[i].getCell(), this.getCell());
			var crystalCell = app.crystals[i].getCell();
			var karelCell = this.getCell();
			if (crystalCell.x == karelCell.x && crystalCell.y == karelCell.y && app.crystals[i].isVisible()) {
				return app.crystals[i];
			}
		}
		return null;
	};
	
	app.Karel.prototype.isOverACrystal = app.timedFunction(app.Karel.prototype._isOverACrystal);
	
	app.Karel.prototype.pickUpCrystal = app.timedFunction(function() {
		var crystal = this._isOverACrystal();
		if (crystal) {
			$(crystal).trigger('pickedUp', [this]);
			this.crystalPouch.push(crystal);
			$(this).trigger('crystalPickedUp', [crystal]);
		}
		else {
			throw new Error('There is no crystal in this cell!');
		}
	});
	app.Karel.prototype.putDownCrystal = app.timedFunction(function() {
		var crystal = this._isOverACrystal();
		if (crystal) {
			throw new Error('You can only put down a crystal in an empty grid cell!');
		}
		if (this.crystalPouch.length) {
			var crystal = this.crystalPouch.pop();
			var cell = this.getCell();
			crystal.putInCell(cell.x, cell.y).setID('crystal-' + cell.x + '-' + cell.y).show();
			$(crystal).trigger('putDown', [this]);
			$(this).trigger('crystalPutDown', [crystal]);
		}
		else {
			throw new Error('You have no crystals!');
		}
	});
*/	
})(jQuery);
