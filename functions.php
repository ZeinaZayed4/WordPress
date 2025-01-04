<?php

/**
 * Function to add my custom styles
 * wp_enqueue_style()
 */
function add_styles()
{
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css');
	wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
}

/**
 * Function to add my custom scripts
 * wp_enqueue_style()
 */
function add_scripts()
{
	wp_deregister_script('jquery'); // remove registered jquery
	// register a new jquery in footer
	wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, '', true);
	// enqueue the new jquery
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true);
	wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);
}

/**
 * Add actions
 * add_action()
 */
add_action('wp_enqueue_scripts', 'add_styles');
add_action('wp_enqueue_scripts', 'add_scripts');

/**
 * Add custom menu support
 */
function register_custom_menu()
{
	register_nav_menu('bootstrap-menu', __('Navigation Bar'));
}

add_action('init', 'register_custom_menu');
