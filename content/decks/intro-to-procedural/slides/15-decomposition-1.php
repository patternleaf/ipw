<h2>Decomposition</h2>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<ul>
				<li>Go back to first problem.</li>
				<li>In English, what are we trying to do?</li>
				<li><em>Move Karel to the blue dot.</em></li>
				<li>How might we <span class="color-highlight">break the big problem into smaller chunks</span>?</li>
				<li><strong>Divide and Conquer</strong></li>
			</ul>
		</div>
		<div class="col-md-6">
			<img src="<?php app()->contentWD();?>slides/imgs/karel-decomp-1.png">
		</div>
	</div>
	<div class="row slide">
		<div class="col-md-12">
			<p>One route:</p>
			<ol>
				<li>Move Karel to the end of the row.</li>
				<li>Turn Karel to the left.</li>
				<li>Move Karel to the top of the column.</li>
			</ol>
		</div>
	</div>
</div>