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
}

function turnAround() {
	turnLeft();
	turnLeft();
};

function isOnLedge() {
	if (isFacingEast()) {
		move();
		turnRight();
		$result = frontIsClear();
		turnRight();
		move();
		turnAround();
		return $result;
	}
	return false;
};

while (frontIsClear()) {
	if (isOnLedge()) {
		putDownCheese();
		break;
	}
	else {
		move();
	}
}
?>