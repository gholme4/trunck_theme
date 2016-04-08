<?php

$version = "1.0";

// Loads single CSS file on all pages
function trunck_css() {

	// Enqueue the main Stylesheet.
	if (ENVIRONMENT == "development")
	{
		wp_enqueue_style( 'trunck-main-stylesheet', get_stylesheet_directory_uri() . '/css/screen.css', array(), $version, "screen" );
	}
	else
	{
		wp_enqueue_style( 'trunck-main-stylesheet', get_stylesheet_directory_uri() . '/css/screen.min.css', array(), $version, "screen" );
	}

	wp_enqueue_style( 'trunck-print-stylesheet', get_stylesheet_directory_uri() . '/css/print.min.css', array(), $version, "print" );

	wp_enqueue_style( 'trunck-theme-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), $version, "screen" );

}
add_action( 'wp_enqueue_scripts', 'trunck_css' );

// Loads global CSS file and template specific CSS file
function trunck_modular_css() {

	// Enqueue the main Stylesheet.
	if (ENVIRONMENT == "development")
	{
		wp_enqueue_style( 'trunck-main-stylesheet', get_stylesheet_directory_uri() . '/css/global.screen.css', array(), $version, "screen" );
		error_log("page slug: " . get_page_template_slug());
	}
	else
	{
		wp_enqueue_style( 'trunck-main-stylesheet', get_stylesheet_directory_uri() . '/css/global.screen.min.css', array(), $version, "screen" );
	}

	wp_enqueue_style( 'trunck-print-stylesheet', get_stylesheet_directory_uri() . '/css/print.min.css', array(), $version, "print" );

	wp_enqueue_style( 'trunck-theme-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), $version, "screen" );

}
//add_action( 'wp_enqueue_scripts', 'trunck_modular_css' );

function trunck_js () {
	wp_enqueue_script( 'trunck-modernizr', get_stylesheet_directory_uri() . '/js/modernizr.js', array(), "1.0");

	wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '2.2.3', true);

	// Enqueue the main JS file.
	if (ENVIRONMENT == "development")
	{
		wp_enqueue_script( 'trunck-js', get_stylesheet_directory_uri() . '/js/script.js', array("jquery"), $version, true);
	}
	else
	{
		wp_enqueue_script( 'trunck-js', get_stylesheet_directory_uri() . '/js/script.min.js', array("jquery"), $version, true);
	}
}

add_action( 'wp_enqueue_scripts', 'trunck_js' );


function trunck_template_style ($slug) {
	if (ENVIRONMENT == "development")
	{
		wp_enqueue_style( $slug . '-stylesheet', get_stylesheet_directory_uri() . '/css/templates/' . $slug . '.css', array('trunck-main-stylesheet'), $version, "screen" );
	}
	else
	{
		wp_enqueue_style( $slug . '-stylesheet', get_stylesheet_directory_uri() . '/css/templates/' . $slug . '.min.css', array('trunck-main-stylesheet'), $version, "screen" );
	}
}
?>