<?php
// Your solution goes here!
// For example:
// 
// move();
// move();
// turnLeft();
// 
function moveToWall() {
	while (frontIsClear()) {
		move();
	}
};

function turnRight() {
	turnLeft();
	turnLeft();
	turnLeft();
};

function turnAround() {
	turnLeft();
	turnLeft();
};

function moveToCheeseOrWall() {
	while (frontIsClear()) {
		move();
		if (cheeseIsPresent()) {
			break;
		}
	}
};

function cheeseInFront() {
	$result = false;
	if (frontIsClear()) {
		move();
		$result = cheeseIsPresent();
		turnAround();
		move();
		turnAround();
	}
	return $result;
};

while (!cheeseInFront()) {
	moveToCheeseOrWall();
	if (cheeseIsPresent()) {
		pickUpCheese();
		turnAround();
		move();
		putDownCheese();
	}
	else {
		putDownCheese();
		turnAround();
		move();
	}
}


move();
pickUpCheese();
turnAround();
move();
pickUpCheese();