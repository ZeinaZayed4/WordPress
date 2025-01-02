<?php

/**
 * Function to add my custom styles
 * wp_enqueue_style()
 */

function add_styles()
{
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome', get_tmeplate_directory_uri() . '/assets/css/fontawesome.min.css');
}

/**
 * Function to add my custom scripts
 * wp_enqueue_style()
 */

function add_scripts()
{
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), false, true);
	wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);
}
