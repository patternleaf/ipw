<?php

$entries = array(
	array(
		'name' => 'Eric',
		'title' => 'My guesbook entry',
		'message' => 'My message content.'
	),
	array(
		'name' => 'Eric',
		'title' => 'My other, mispelled guesrbook entry',
		'message' => 'My other message content.'
	)
);


echo json_encode($entries);
