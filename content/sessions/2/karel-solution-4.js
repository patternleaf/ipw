
/**
 * Karel the Robot standalone solution template. Copy this document and modify
 * to complete the exercises.
 * 
 */
$(document).ready(function() {

	karelApp.run(function(karel) {
		// define functions we'll be using.
		window.karel = karel;
		karel.moveToWall = function() {
			while (karel.frontIsClear()) {
				karel.move();
			}
		};
		
		karel.turnRight = function() {
			karel.turnLeft();
			karel.turnLeft();
			karel.turnLeft();
		};
		
		karel.turnAround = function() {
			karel.turnLeft();
			karel.turnLeft();
		};
		
		karel.isOnEdgeOfPothole = function() {
			if (karel.isFacingEast()) {
				karel.move();
				karel.turnRight();
				var result = karel.frontIsClear();
				karel.turnRight();
				karel.move();
				karel.turnAround();
				return result;
			}
			return false;
		};
		
		karel.depositCheeseInPothole = function() {
			karel.move();
			karel.turnRight();
			karel.move();
			karel.putDownCheese();
			karel.turnAround();
			karel.move();
			karel.turnRight();
		};
		
		karel.turnLeft();
		karel.move();
		karel.turnRight();
		karel.move();
		while (karel.frontIsClear()) {
			if (karel.isOnEdgeOfPothole()) {
				karel.depositCheeseInPothole();
			}
			else {
				karel.move();
			}
		}

	});
});