<h2>Sub-Recipes</h2>
<div class="row">
	<ul>
		<li>A computer is layer after layer of <dfn>abstraction</dfn>.</li>
		<li class="slide">
			<p>Example: <code>spreadSauce()</code> is not something the computer knows how to do.</p>
			<div id="spreadsauce-code" class="pretty-code non-editable" data-language="javascript" style="height:100px; width:400px;">function spreadSauce() {
	fill(200, 120, 100);
	ellipse(100, 100, 160, 160);
}</div>
		</li>
		<li class="slide">
			<p>Neither does it know <a href="https://github.com/processing-js/processing-js/blob/master/src/Processing.js#L8568">how to draw an ellipse</a>.</p>
			<div id="ellipse-code" class="pretty-code non-editable" data-language="javascript" style="height:200px; width:600px;">Drawing2D.prototype.ellipse = function(x, y, width, height) {
	x = x || 0;
	y = y || 0;

	if (width <= 0 && height <= 0) {
		return;
	}

	if (curEllipseMode === PConstants.RADIUS) {
		width *= 2;
		height *= 2;
	} else if (curEllipseMode === PConstants.CORNERS) {
		width = width - x;
		height = height - y;
		x += width / 2;
		y += height / 2;
	} else if (curEllipseMode === PConstants.CORNER) {
		x += width / 2;
		y += height / 2;
	}

	// Shortcut for drawing a 2D circle
	if (width === height) {
		curContext.beginPath();
		curContext.arc(x, y, width / 2, 0, PConstants.TWO_PI, false);
		executeContextFill();
		executeContextStroke();
	} else {
		var w = width / 2,
			h = height / 2,
			C = 0.5522847498307933,
			c_x = C * w,
			c_y = C * h;

		p.beginShape();
		p.vertex(x + w, y);
		p.bezierVertex(x + w, y - c_y, x + c_x, y - h, x, y - h);
		p.bezierVertex(x - c_x, y - h, x - w, y - c_y, x - w, y);
		p.bezierVertex(x - w, y + c_y, x - c_x, y + h, x, y + h);
		p.bezierVertex(x + c_x, y + h, x + w, y + c_y, x + w, y);
		p.endShape();
	}
};
			</div>
		</li>
		<li class="slide">It's <del>elephants</del> abstractions all the way down.</li>
	</ul>
</div>