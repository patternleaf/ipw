<h2>More Cheese</h2>
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<p>
				Using the comands <code>move();</code>, <code>turnLeft();</code>, <code>pickUpCheese();</code>, and <code>putDownCheese();</code>, have Karel pick up all the cheese in the world and deposit it in the notch (4, 1). Then, have Karel move to the blue dot.
			</p>
		</div>
		<div class="col-md-5">
			<img src="<?php app()->contentWD();?>/slides/imgs/cheese-end.png" style="width:300px; margin:0 auto; display:block;">
		</div>
	</div>
	<div class="row live-exercise" id="karel-4">
		<div class="col-md-6">
			<div class="code-container" style="height:200px; width:100%;">
				<div class="pretty-code karel-input" id="karel-4-input" style="height:300px; width:100%;"></div>
			</div>
			<button class="karel-run">Run!</button>
			<button class="karel-reset">Reset</button>
		</div>
		<div class="col-md-6">
			<div class="karel-viewport"></div>
		</div>
		<style type="text/css" media="screen">
			#karel-4 .karel-viewport {
				display:block;
				margin:0 auto;
				width:300px;
				height:300px;
			}
		</style>
	</div>
	<div class="row slide">
		<p>
			Can you think of any ways to make this process a little more efficient? Are there command sequences you find yourself making repetitively?
		</p>
	</div>
</div>