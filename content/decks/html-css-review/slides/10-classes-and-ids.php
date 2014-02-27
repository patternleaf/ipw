<h2>Classes and IDs</h2>

<?php app()->printCommon('exercise-switcher', array(
	'instance_id' => 'classes-and-ids',
	'container_attributes' => 'has-solution',
	'height' => '200px',
	'source_path' => __DIR__.'/../exercises/classes-and-ids.php',
	'solution_path' => __DIR__.'/../exercises/classes-and-ids-solution.php',
	'language' => 'html',
	'prompt' => 'Without changing any styles, add classes to this markup until it matches the solution output. Pick a track as the current track and add the appropriate id.',
	'output_markup' => '<iframe seamless class="output-target" style="width:100%; height:100%;"></iframe>'
));?>