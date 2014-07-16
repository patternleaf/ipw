<?php
// Your solution goes here!
// For example:
// 
// move();
// move();
// turnLeft();
// 

// define functions we'll be using.
function moveToWall() {
	while (frontIsClear()) {
		move();
	}
}

function turnRight() {
	turnLeft();
	turnLeft();
	turnLeft();
}

function turnAround() {
	turnLeft();
	turnLeft();
}

function isOnEdgeOfPothole() {
	if (isFacingEast()) {
		move();
		turnRight();
		$result = frontIsClear();
		turnRight();
		move();
		turnAround();
		return result;
	}
	return false;
}

function depositCheeseInPothole() {
	move();
	turnRight();
	move();
	putDownCheese();
	turnAround();
	move();
	turnRight();
}

turnLeft();
move();
turnRight();
move();
while (frontIsClear()) {
	if (isOnEdgeOfPothole()) {
		depositCheeseInPothole();
	}
	else {
		move();
	}
}
?>