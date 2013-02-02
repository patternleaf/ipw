
/**
 * Karel the Robot standalone solution template. Copy this document and modify
 * to complete the exercises.
 * 
 */
$(document).ready(function() {

	karelApp.run(function(karel) {
		
		// define functions we'll be using.
		karel.moveToEndOfRow = function() {
			karel.move();
			karel.move();
			karel.move();
			karel.move();
			karel.move();
			karel.move();
			karel.move();
			karel.move();
			karel.move();
		};
		
		karel.turnRight = function() {
			karel.turnLeft();
			karel.turnLeft();
			karel.turnLeft();
		}
		
		// here is our solution
		karel.putDownCheese();
		karel.moveToEndOfRow();
		karel.putDownCheese();
		karel.turnLeft();
		karel.move();
		karel.putDownCheese();
		karel.turnLeft();
		karel.moveToEndOfRow();
		karel.putDownCheese();
		karel.turnRight();
		karel.move();
		karel.putDownCheese();
		karel.turnRight();
		karel.moveToEndOfRow();
		karel.putDownCheese();
		
	});
});