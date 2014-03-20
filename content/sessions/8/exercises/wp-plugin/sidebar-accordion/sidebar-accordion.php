<?php
/**
 * Plugin Name: Sidebar Accordion
 */

function sidebar_accordion_add_script() {
	wp_enqueue_script(
		'sidebar_accordion',
		plugins_url('sidebar-accordion/sidebar-accordion.js'),
		array('jquery')
	);
}
add_action('init', 'sidebar_accordion_add_script');
