<?php

require_once('wp-bootstrap-navwalker.php');

// Add featured image support
add_theme_support('post-thumbnails');

/**
 * Function to add my custom styles
 * wp_enqueue_style()
 */
function add_styles()
{
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css');
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
 * Add custom menu support
 */
function register_custom_menu()
{
	register_nav_menus(array(
		'bootstrap-menu' => 'Navigation Bar',
		'footer-menu' => 'Footer Menu'
	));
}

function bootstrap_menu()
{
	wp_nav_menu(array(
		'theme_location' => 'bootstrap-menu',
		'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0',
		'container' => false,
		'depth' => 2,
		'walker' => new WP_Bootstrap_Navwalker(),
	));
}

/**
 * Customize the excerpt word length and read more dots
 */
function extend_excerpt_length($length) {
	return 65;
}
add_filter('excerpt_length', 'extend_excerpt_length');

function extend_change_dots($more) {
	return '...';
}
add_filter('excerpt_more', 'extend_change_dots');

add_action('wp_enqueue_scripts', 'add_styles');
add_action('wp_enqueue_scripts', 'add_scripts');
add_action('init', 'register_custom_menu');
