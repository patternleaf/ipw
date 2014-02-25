<?php
if (empty($options)) {
	$options = array(
		'container_attributes' => 'has-solution',
		'height' => '200px',
		'source_path' => '',
		'solution_path' => '',
		'language' => 'html',
		'prompt' => ''
	);
}
foreach ($options as $key => $value) {
	if (!isset($key)) {
		extract(array($key => $value));
	}
}
?>
<div class="live-exercise container interactive <?php echo $container_attributes; ?>">
	<div class="row">
		<p class="col-md-10">
			<?php echo $prompt; ?>
		</p>
	</div>
	
	<div class="row">
		<div class="btn-group btn-group-lg exercise-switcher col-md-5" data-target-exercise="basic-markup">
			<button type="button" class="btn btn-default switcher-user">Your Code</button>
			<button type="button" class="btn btn-default switcher-solution">Solution</button>
		</div>
	</div>
	
	<div class="row">
		<div class="code-container col-md-6" style="">
			<div id="<?php echo $editor_id; ?>-code" data-language="<?php echo $language ?>" class="pretty-code user-code" style="height:<?php echo $height ?>; width:100%;"><?php app()->escapedFileContents($source_path); ?></div>
			
<?php if (isset($solution_path) && !empty($solution_path)) : ?>
			<div id="<?php echo $editor_id; ?>-solution" data-language="<?php echo $language ?>" class="pretty-code solution-code" style="height:<?php echo $height ?>; width:100%;"><?php app()->escapedFileContents($solution_path); ?></div>
		</div>
<?php endif; ?>

		<div class="col-md-1" style="text-align:center; position:relative; height:<?php echo $height ?>;">
			<span class="glyphicon glyphicon-arrow-right" style="position:absolute; top:40%;"></span>
		</div>
		<div class="output-container col-md-5">
			<div class="exercise-output well" style="height:<?php echo $height ?>;">
				<iframe seamless class="output-target" style="width:100%; height:100%;"></iframe>
			</div>
		</div>
	</div>

</div>