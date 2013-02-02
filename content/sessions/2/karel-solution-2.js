
/**
 * Karel the Robot standalone solution template. Copy this document and modify
 * to complete the exercises.
 * 
 */
$(document).ready(function() {

	karelApp.run(function(karel) {
		// define functions we'll be using.
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
		
		// here is our solution
		karel.putDownCheese();
		karel.moveToWall();
		karel.putDownCheese();
		karel.turnLeft();
		karel.move();
		karel.putDownCheese();
		karel.turnLeft();
		karel.moveToWall();
		karel.putDownCheese();
		karel.turnRight();
		karel.move();
		karel.putDownCheese();
		karel.turnRight();
		karel.moveToWall();
		karel.putDownCheese();
		
	});
});