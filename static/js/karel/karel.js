;(function($) {
	
	window.KarelApp = function(el, init) {
		this.init(el, init);
	};
	
	KarelApp.instances = [];
	
	KarelApp.prototype.init = function(el, init) {
		var $el = $(el);
		var $viewportContainer = $el.find('.karel-viewport');
		var $input = $el.find('.karel-input');
		var $run = $el.find('button.karel-run');
		var $reset = $el.find('button.karel-reset');
		if ($viewportContainer.length && $input.length && $input.length && $run.length && $reset.length) {
			this.viewport = new Romano.Viewport({
					width: $viewportContainer.width(),
					height: $viewportContainer.height()
				},
				$viewportContainer.get(0),
				new Romano.RaphaelSurface()
			);
			
			this.karel = new KarelApp.Karel(this.viewport, this);
			
			this.cheeseSprites = [];
			this.cheeseCells = [];
			this.walls = init.walls;
			this.viewport.run();
			this.calculateGrid(init.gridDimensions);
			if (init.goal) {
				this.goal = init.goal;
				this.drawGoal();
			}
			this.drawWalls();
			this.drawGrid();
			if (init.cheese) {
				this.cheeseCells = init.cheese;
				this.refreshCheese();
			}
			this.karel.setScale(this.grid.size / 150);	 // trial and error here ...
			this.setKarelCell(init.karelStart);
			this.karel.setDirection('right');
			this.karel.setCheesePouch(init.cheesePouch || 0);
			
			$el.data('karel-instance', this);
			KarelApp.instances.push(this);
			
			$run.click($.proxy(function() {
				var editor = $input.data('editor');
				if (editor) {
					this.run(editor.getValue());
				}
				return false;
			}, this));
			$reset.click($.proxy(function() {
				this.reset();
				return false;
			}, this));
			
			$(this).trigger('ready');
		}
		else {
			throw new Romano.Exception('Could not initialize Karel.', el);
		}
	};
	
	KarelApp.prototype.getKarelCell = function() {
		return this.karelCell;
	};
	
	KarelApp.prototype.calculateGrid = function(dimensions) {
		var larger, scale, size;
		var w = (this.viewport.width - 1);
		var h = (this.viewport.height - 1);
		if (dimensions.x > dimensions.y) {
			larger = dimensions.x;
			scale = larger / w;
			size = w / larger;
		}
		else {
			larger = dimensions.y;
			scale = larger / h;
			size = h / larger;
		}
		this.grid = {
			x: dimensions.x,
			y: dimensions.y,
			size: size,
			scale: scale
		};
	};
	
	KarelApp.prototype.drawGrid = function() {
		var s = this.grid.size;
		var w = s * this.grid.x;
		var h = s * this.grid.y;
		var p = this.viewport.getSurface().raphael;
		var gridAttr = {
			'stroke-dasharray': ['-'],
			'stroke': '#bbb',
			'stroke-width': 1
		};
		for (var i = 0, x = 0; i <= this.grid.x; i++, x += this.grid.size) {
			p.path('M' + x + ',' + h + 'L' + x + ',0').attr(gridAttr).toBack();
		}
		for (var j = 0, y = 0; j <= this.grid.y; j++, y += this.grid.size) {
			p.path('M0,' + y + 'L' + w + ',' + y).attr(gridAttr).toBack();
		}
	};
	
	// wall coordinates start at 0 at the left wall and 0 on the bottom wall.
	KarelApp.prototype.drawWalls = function() {
		var s = this.grid.size;
		var w = s * this.grid.x;
		var h = s * this.grid.y;
		var p = this.viewport.getSurface().raphael;
		var wallAttr = {
			'stroke': '#666',
			'stroke-width': 2
		};
		
		// outer walls
		p.path('M0,0L' + w + ',' + 0 + ',L' + w + ',' + h + 'L0,' + h + 'L0,0').attr(wallAttr).toBack();
		
		for (var i = 0; i < this.walls.length; i++) {
			var w = $.extend({}, this.walls[i]);
			w.start = this.toKarelCell(w.start);
			w.end = this.toKarelCell(w.end);
			p.path('M' + (w.start.x * s) + ',' + (w.start.y * s) + 'L' + (w.end.x * s) + ',' + (w.end.y * s))
				.attr(wallAttr)
				.toBack();
			
		}
	};
	
	KarelApp.prototype.drawGoal = function() {
		var p = this.viewport.getSurface().raphael;
		var g = this.toKarelCell(this.goal);
		var x = (g.x * this.grid.size) - (this.grid.size / 2);
		var y = (g.y * this.grid.size) + (this.grid.size / 2);
		p.circle(x, y, this.grid.size * .1).attr({ fill: '#4444ff' }).toBack();
	};
	
	KarelApp.prototype.refreshCheese = function() {
		for (var i = 0; i < this.cheeseSprites.length; i++) {
			this.cheeseSprites[i].remove();
		}
		this.cheeseSprites = [];
		for (i = 0; i < this.cheeseCells.length; i++) {
			var cell = this.toKarelCell(this.cheeseCells[i]);
			var c = new KarelApp.Cheese('cheese-' + i, this.viewport, {
				// the image's origin is off
				position: { 
					x: cell.x * this.grid.size - (this.grid.size * .9),
					y: cell.y * this.grid.size + (this.grid.size / 4)
				}
			});
			c.setScale(this.grid.size / 350);	// more trial and error here ...
			
			// ugh
			c.renderer.toBack();
			
			this.cheeseSprites.push(c);
		}
	};
	
	KarelApp.prototype.cheeseExistsInCell = function(cell) {
		for (var i = 0; i < this.cheeseCells.length; i++) {
			if (cell.x == this.cheeseCells[i].x && cell.y == this.cheeseCells[i].y) {
				return true;
			}
		}
		return false;
	};
	
	KarelApp.prototype.removeCheeseInCell = function(cell) {
		for (var i = 0; i < this.cheeseCells.length; i++) {
			if (cell.x == this.cheeseCells[i].x && cell.y == this.cheeseCells[i].y) {
				//console.log('removing cheese in cell ', cell);
				this.cheeseCells.splice(i, 1);
				break;
			}
		}
		this.refreshCheese();
	};
	
	KarelApp.prototype.placeCheeseInCell = function(cell) {
		this.cheeseCells.push(cell);
		this.refreshCheese();
	};
	
	/* not working yet
	KarelApp.prototype.drawCoordinates = function() {
		var p = this.viewport.getSurface().raphael;
		for (var x = 1; x < this.grid.x; x++) {
			for (var y = 1; y < this.grid.y; y++) {
				var cellAddress = this.toKarelCell({ x: x, y: y });
				var location = { x: x - 1, y: y - 1 };
				//var location = { x: x, y: y };
				location.x *= this.grid.size;
				location.y *= this.grid.size;
				location.x += (this.grid.size / 2);
				location.y += (this.grid.size / 2);
				p.text(location.x, location.y, '(' + x + ', ' + y + ')');
			}
		}
	};
	*/
	
	// experimental -- haven't really figured out the right conventions.
	KarelApp.prototype.toKarelCell = function(cell) {
		var c = $.extend({}, cell);
		c.y = this.grid.y - c.y;
		//c.x -= 1;
		return c;
	};
	
	KarelApp.prototype.toViewportCell = function(cell) {
		var c = $.extend({}, cell);
		c.y = this.grid.y + c.y;
		return c;
	};
	
	KarelApp.prototype.wallIsInWay = function(startCell, endCell) {
		var moveLine = {
			start: this.toKarelCell(startCell),
			end: this.toKarelCell(endCell)
		};
		
		// this is all still sketchy wrt coordinate systems :(
		moveLine.start.x = moveLine.start.x * this.grid.size - (this.grid.size / 2);
		moveLine.start.y = moveLine.start.y * this.grid.size  + (this.grid.size / 2);
		moveLine.end.x = moveLine.end.x * this.grid.size - (this.grid.size / 2);
		moveLine.end.y = moveLine.end.y * this.grid.size + (this.grid.size / 2);

		for (var i = 0; i < this.walls.length; i++) {
			var w = {
				start: this.toKarelCell(this.walls[i].start),
				end: this.toKarelCell(this.walls[i].end)
			};
			w.start.x = w.start.x * this.grid.size;
			w.start.y = w.start.y * this.grid.size;
			w.end.x = w.end.x * this.grid.size;
			w.end.y = w.end.y * this.grid.size;
			
			if (this.linesIntersect(moveLine, w)) {
				//console.log('wall in way');
				return true;
			}
		}
		return false;
	};
	
	// adapted from http://www.kevlindev.com/gui/math/intersection/Intersection.js
	// @return bool. Only tests for strict intersection. False if coincident or other.
	KarelApp.prototype.linesIntersect = function(l1, l2) {
		var a1 = l1.start;
		var a2 = l1.end;
		var b1 = l2.start;
		var b2 = l2.end;
		
		// var p = this.viewport.getSurface().raphael;
		// p.path('M' + a1.x + ',' + a1.y + 'L' + a2.x + ',' + a2.y).attr({ stroke: '#ff0000' });
		// p.path('M' + b1.x + ',' + b1.y + 'L' + b2.x + ',' + b2.y).attr({ stroke: '#00ff00' });
		
		var result = false;
    
		var ua_t = (b2.x - b1.x) * (a1.y - b1.y) - (b2.y - b1.y) * (a1.x - b1.x);
		var ub_t = (a2.x - a1.x) * (a1.y - b1.y) - (a2.y - a1.y) * (a1.x - b1.x);
		var u_b  = (b2.y - b1.y) * (a2.x - a1.x) - (b2.x - b1.x) * (a2.y - a1.y);

		if ( u_b != 0 ) {
			var ua = ua_t / u_b;
			var ub = ub_t / u_b;

			if ( 0 <= ua && ua <= 1 && 0 <= ub && ub <= 1 ) {
				result = true;
				/*
				result.points.push(
					new Point2D(
						a1.x + ua * (a2.x - a1.x),
						a1.y + ua * (a2.y - a1.y)
					)
				);
				*/
			} else {
				result = false;
			}
		} else {
			if ( ua_t == 0 || ub_t == 0 ) {
				// coincident
				result = false;
			} else {
				// parallel
				result = false;
			}
		}
		return result;
	};

	KarelApp.prototype.reset = function() {
		this.setKarelCell({ x: 1, y: 1 });
		this.karel.setDirection('right');
	};
	
	KarelApp.prototype.setKarelCell = function(cell) {
		// in karel world, y starts at 1 at the bottom and goes up.
		// x also starts at 1 instead of 0.
		var originalCell = { x: cell.x, y: cell.y };
		cell.y = this.grid.y - cell.y;
		cell.x -= 1;
		var x = (cell.x * this.grid.size) + (this.grid.size / 2);
		var y = (cell.y * this.grid.size) + (this.grid.size / 2);
		
		// bounds check
		if (cell.x >= 0 && cell.y >= 0 && cell.x < this.grid.x && cell.y < this.grid.y) {
			this.karel.setPosition({ x: x, y: y });
			this.karelCell = originalCell;
		}
	};
	
	KarelApp.prototype.run = function(content) {
		var instance = this;
		
		var turnLeft = function() {
			instance.karel.turnLeft();
		};
		var move = function() {
			try {
				instance.karel.move();
			}
			catch (e) {
				if (e instanceof KarelApp.WallException) {
					alert('You ran into a wall! Reset and try again!');
				}
			}
		};
		var pickUpCheese = function() {
			try {
				instance.karel.pickUpCheese();
			}
			catch (e) {
				if (e instanceof KarelApp.NoCheeseInCellException) {
					alert('There\'s no cheese in that cell!');
				}
			}
		};
		var putDownCheese = function() {
			try {
				instance.karel.putDownCheese();
			}
			catch (e) {
				if (e instanceof KarelApp.NoCheeseInPouchException) {
					alert('Karel\'s cheese pouch is empty!');
				}
				else {
					console.log(e);
				}
			}
		};
		try {
			eval(content);
		}
		catch (e) {
			alert('Oops! The computer couldn\'t understand your commands.');
		}
	};
	
	KarelApp.WallException = function() {
		Error.apply(this, ['You ran into a wall!']);
	};
	KarelApp.WallException.prototype = new Error();
	KarelApp.NoCheeseInCellException = function() {
		Error.apply(this, ['There\'s no cheese here!']);
	};
	KarelApp.NoCheeseInCellException.prototype = new Error();
	KarelApp.NoCheeseInPouchException = function() {
		Error.apply(this, ['You have no cheese left!']);
	};
	KarelApp.NoCheeseInPouchException.prototype = new Error();
	
/*		
	$(document).ready(function() {
		app.viewport = window.viewport = new Romano.Viewport({
				width: 300,
				height: 300
			}, $('#viewport-container').get(0),
			new Romano.RaphaelSurface()
		);
		
		app.karel = app.gir = window.karel = window.gir = new app.Karel(app.viewport);

		app.crystals = [];

		viewport.run();
		app.drawGrid();
		
		$(app).trigger('ready');
	});
	
	app.reset = function() {

		app.karel.reset();
		var temp = app.crystals.splice(0);
		app.crystals = [];
		for (var i = 0; i < temp.length; i++) {
			temp[i].remove();
		}
		app.currentTime = new Date().valueOf();
		app.gLastInvocation = 0;
		$('#crystals-on-board').html(0);
		$('#crystals-in-pouch').html(0);
		$(app).trigger('wasReset');
	};
	
	app.gridSize = 50;
	app.gridDimensions = {
		x: 6,
		y: 5
	};
	app.drawGrid = function() {
		var w = app.viewport.width;
		var h = app.viewport.height - 1;
		//app.gridSize = w / app.gridDimensions;
		//var p = app.viewport.paper;
		var p = app.viewport.getSurface().raphael;

		for(var i = 1; i <= w; i += app.gridSize) {
			p.path('M' + i + ',' + h + 'L' + i + ',0')
				.attr({
					'stroke-dasharray': ['-'],
					'stroke': '#888',
					'stroke-width': 1
				})
				.toBack();
		}
		for(var i = 0; i <= h; i += app.gridSize) {
			p.path('M0,' + i + 'L' + w + ',' + i)
				.attr({
					'stroke-dasharray': ['-'],
					'stroke': '#888',
					'stroke-width': 1
				})
				.toBack();
		}
	};
	
	app.makeCrystal = function(gridX, gridY) {
		var c = new app.Crystal('crystal-' + gridX + '-' + gridY, app.viewport, { 
			position: {
				x: gridX * app.gridSize, 
				y: gridY * app.gridSize 
			}
		})
		$(c).bind('pickedUp', function() {
			var onBoard = parseInt($('#crystals-on-board').html(), 10);
			onBoard = isNaN(onBoard) ? 0 : onBoard;
			var inPouch = parseInt($('#crystals-in-pouch').html(), 10);
			inPouch = isNaN(inPouch) ? 0 : inPouch;
			$('#crystals-on-board').html(onBoard - 1);
			$('#crystals-in-pouch').html(inPouch + 1);
		});
		$(c).bind('putDown', function() {
			var onBoard = parseInt($('#crystals-on-board').html(), 10);
			onBoard = isNaN(onBoard) ? 0 : onBoard;
			var inPouch = parseInt($('#crystals-in-pouch').html(), 10);
			inPouch = isNaN(inPouch) ? 0 : inPouch;
			$('#crystals-on-board').html(onBoard + 1);
			$('#crystals-in-pouch').html(inPouch - 1);
		});
		$(c).bind('removed', (function() {
			var i = this.crystals.indexOf(c);
			if (i >= 0) {
				this.crystals.splice(i, 1);
			}
		})._plBind(this));
		$(c).trigger('putDown');
		app.crystals.push(c);
	};
	
	app.getNumCrystalsOnBoard = function() {
		var onBoard = parseInt($('#crystals-on-board').html(), 10);
		onBoard = isNaN(onBoard) ? 0 : onBoard;
		return onBoard;
	};
	
	app.distributeCrystalsRandomly = function(n, mask) {
		var crystalMask = new Array(app.gridDimensions.x);
		for (var x = 0; x < app.gridDimensions.x; x++) {
			crystalMask[x] = new Array(app.gridDimensions.y);
			for (var y = 0; y < app.gridDimensions.y; y++) {
				crystalMask[x][y] = true;
			}
		}
		crystalMask[0][4] = false;	// where karel starts
		var nPlaced = 0;
		var max = (app.gridDimensions.x * app.gridDimensions.y);
		while (nPlaced < n && nPlaced < max) {
			var next = { 
				x: Math.round(Math.random() * (app.gridDimensions.x - 1)), 
				y: Math.round(Math.random() * (app.gridDimensions.y - 1)) 
			};
			if ((!mask || mask[next.x][next.y]) && crystalMask[next.x][next.y]) {
				crystalMask[next.x][next.y] = false;
				app.makeCrystal(next.x, next.y);
				nPlaced++;
			}
		}
	};
	
	app.currentTime = new Date().valueOf();
	app.gLastInvocation = 0;
	app.timeFunctions = true;
	app.timedFunction = function(f) {
		return function() {
			var obj = this;
			var args = arguments;
			if (app.timeFunctions && $('#toggle-animate').attr('checked')) {
				setTimeout(function() {
					try {
						return f.apply(obj, args);
					}
					catch (e) {
						$('#output').html('<strong>' + e.name + '</strong>: ' + e.message).addClass('error');
					}
					//app.gLastInvocation = new Date().valueOf();
				}, app.currentTime);
				app.currentTime += 500;
			}
			else {
				return f.apply(obj, args);
			}
		};
	};
	
	app.clearTimedFunctions = function() {

	};
	
	app.log = app.timedFunction(function(result) {
		if (typeof result == 'object') {
			result = result.toString();
		}
		$('#output').removeClass('error').html('<span style="color:#888;">OUTPUT:</span> ' + result);
	});
	
	
	Romano.Sprite.prototype.getCell = function() {
		var pos = this.getPosition();
		return {
			x: Math.round(pos.x / app.gridSize),
			y: Math.round(pos.y / app.gridSize)
		};
	};
	
	Romano.Sprite.prototype.putInCell = function(gridX, gridY) {
		this.setPosition(gridX * app.gridSize, gridY * app.gridSize);
		return this;
	};
	
	
	jQuery(document).ready(function() {

		var insertAtCursor = function(myField, myValue) {
			if (document.selection) {
				myField.focus();
				sel = document.selection.createRange();
				sel.text = myValue;
		  	}
			else if (myField.selectionStart || myField.selectionStart == '0') {
				var startPos = myField.selectionStart;
				var endPos = myField.selectionEnd;
				myField.value = myField.value.substring(0, startPos) + myValue + myField.value.substring(endPos, myField.value.length);
				myField.selectionStart = myField.selectionEnd = endPos + 1;
			} else {
				myField.value += myValue;
			}
		}

		$('#run-text').click(function() {
			var js = $('#console-text').val();
			$('#output').html('&nbsp;').removeClass('error');
			try {
				app.currentTime = 0;
				eval(js);
			}
			catch (e) {
				$('#output').html('<strong>' + e.name + '</strong>: ' + e.message).addClass('error');
			}
		});
		$('#console-text').keydown(function(event) {
			switch (event.which) {
				case 9:
					insertAtCursor(this, "\t");
					return false;
				break;
				case 13:
					if (event.shiftKey) {
						$('#run-text').click();
						return false;
					}
				break;
			}
		});
		
		$('#toggle-animate').change(function() {
			app.timeFunctions = $(this).attr('checked');
			app.currentTime = 0;
		});
		$('#reset').click(function(){
			app.reset();
		});
	});
*/
})(jQuery);