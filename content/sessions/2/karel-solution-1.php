<?php
// Your solution goes here!
// For example:
// 
// move();
// move();
// turnLeft();
// 

// Define a couple of useful sub-routines.
function moveToEndOfRow() {
	move();
	move();
	move();
	move();
	move();
	move();
	move();
	move();
	move();
};

function turnRight() {
	turnLeft();
	turnLeft();
	turnLeft();
}

// here is our solution
putDownCheese();
moveToEndOfRow();
putDownCheese();
turnLeft();
move();
putDownCheese();
turnLeft();
moveToEndOfRow();
putDownCheese();
turnRight();
move();
putDownCheese();
turnRight();
moveToEndOfRow();
putDownCheese();
?>