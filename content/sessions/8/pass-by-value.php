<?php

function foo($list) {
	$list[0] = 'Kosher Dill';
}

$pickleNames = array(
	'Gherkin',
	'Polish',
	'Hungarian',
	'Swedish'
);

foo($pickleNames);
echo '<pre>';
print_r($pickleNames);
echo '</pre>';