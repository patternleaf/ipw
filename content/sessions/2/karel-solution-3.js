
/**
 * Karel the Robot standalone solution template. Copy this document and modify
 * to complete the exercises.
 * 
 */
$(document).ready(function() {

	karelApp.run(function(karel) {
		return;
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
		}

		karel.turnAround = function() {
			karel.turnLeft();
			karel.turnLeft();
		};

		karel.isOnLedge = function() {
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
		
		while (karel.frontIsClear()) {
			if (karel.isOnLedge()) {
				karel.putDownCheese();
				break;
			}
			else {
				karel.move();
			}
		}
		
	});
});