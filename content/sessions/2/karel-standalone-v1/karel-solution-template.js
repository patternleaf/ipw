
/**
 * Karel the Robot standalone solution template. Copy this document and modify
 * to complete the exercises.
 * 
 */

// This is a standard pattern: wait for the document to document object model to
// be fully interpreted (though not yet necessarily rendered), and then do 
// something.
$(document).ready(function() {
	
	// What we do is take the global karelApp object (created in 
	// karel-problem-x.js) and invoke its run method, passing a function as 
	// argument. In Javascript, functions are first-class datatypes and can be
	// passed around and assigned to variables just like integers or strings.
	//
	// When KarelApp.run invokes the passed function, it passes it a single
	// argument, which is an object that can run Karel's repertoire of commands:
	//
	//		move();
	//		turnLeft();
	//		pickUpCheese();
	//		putDownCheese();
	//		frontIsClear();
	//
	// To invoke these commands, you use the dot syntax on the object passed in:
	//
	//		karel.move();
	//
	//	Or, for example,
	// 
	//		if (karel.frontIsClear()) { 
	//			karel.move();
	//		}
	//
	//
	karelApp.run(function(karel) {
		
		// your solution goes here. for example, to define turnRight:
		karel.turnRight = function() {
			karel.turnLeft();
			karel.turnLeft();
			karel.turnLeft();
		}
		
		// you would then invoke this with:
		// karel.turnRight();
		
	});
});