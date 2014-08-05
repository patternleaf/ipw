<?php

$a = 10;
$b = 20;


// Modify this function so that this program prints out "30"
function foo() {
	global $b;
	$b += $a;
}

function bar() {
	global $b;
	echo $b;
}


foo();

?>

<h1><?php bar() ?></h1>