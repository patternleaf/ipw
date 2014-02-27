<h2>Basic Markup</h2>

<?php app()->printCommon('exercise-switcher', array(
	'instance_id' => 'basic-markup',
	'container_attributes' => 'has-solution',
	'height' => '200px',
	'source_path' => __DIR__.'/../exercises/basic-markup.php',
	'solution_path' => __DIR__.'/../exercises/basic-markup-solution.php',
	'language' => 'html',
	'prompt' => 'Markup this code using HTML 5. Assume existing <span class="token tag">doctype</span> and wrapping <span class="token tag">html</span> tags. Refer to any sources you like.',
	'output_markup' => '<iframe seamless class="output-target" style="width:100%; height:100%;"></iframe>'
));?>