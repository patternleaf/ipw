<h2>Procedures</h2>
<div class="container">
	<div class="row">
		<p>
			Formalize: turn your pseudocode into <dfn>procedures</dfn>.
		</p>
		<div class="col-md-6">
			<img src="<?php app()->contentWD();?>slides/imgs/karel-decomp-1.png">
		</div>
		<div class="col-md-6">
			<div id="psuedo-code-3" class="pretty-code non-editable" data-language="javascript" style="height:400px; width:100%;">// define our toolkit of procedures.
function moveToEndOfRow() {
	move();
	move();
	move();
	move();
	move();
	move();
	move();
}
function moveToEndOfColumn() {
	move();
	move();
}

// *invoke* the functions we just defined.
// 1. move karel to end of the row.
moveToEndOfRow();
// 2. turn karel to the left.
turnLeft();
// 3. move karel to the top of the column.
moveToEndOfColumn();

</div>
		</div>
	</div>
	<div class="row slide">
		<p>Basically: make your own sub-recipes; your own <a href="http://intro-web-programming.dev/decks/intro-to-procedural/#slide-6">abstractions</a>.</p>
	</div>
</div>