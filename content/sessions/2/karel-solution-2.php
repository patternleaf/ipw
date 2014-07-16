<?php
// Your solution goes here!
// For example:
// 
// move();
// move();
// turnLeft();
// 

// Define a couple of sub-routines.
function moveToWall() {
	while (frontIsClear()) {
		move();
	}
};

function turnRight() {
	turnLeft();
	turnLeft();
	turnLeft();
}

// here is our solution
putDownCheese();
moveToWall();
putDownCheese();
turnLeft();
move();
putDownCheese();
turnLeft();
moveToWall();
putDownCheese();
turnRight();
move();
putDownCheese();
turnRight();
moveToWall();
putDownCheese();

