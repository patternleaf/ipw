
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
		
		karel.moveToCheeseOrWall = function() {
			while (karel.frontIsClear()) {
				karel.move();
				if (karel.cheeseIsPresent()) {
					break;
				}
			}
		};
		
		karel.cheeseInFront = function() {
			var result = false;
			if (karel.frontIsClear()) {
				karel.move();
				result = karel.cheeseIsPresent();
				karel.turnAround();
				karel.move();
				karel.turnAround();
			}
			return result;
		};
		
		while (!karel.cheeseInFront()) {
			karel.moveToCheeseOrWall();
			if (karel.cheeseIsPresent()) {
				karel.pickUpCheese();
				karel.turnAround();
				karel.move();
				karel.putDownCheese();
			}
			else {
				karel.putDownCheese();
				karel.turnAround();
				karel.move();
			}
		}
		karel.move();
		karel.pickUpCheese();
		karel.turnAround();
		karel.move();
		karel.pickUpCheese();

	});
});