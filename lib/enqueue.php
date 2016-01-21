<?php
function trunck_css() {

	// Enqueue the main Stylesheet.
	if (ENVIRONMENT == "development")
	{
		wp_enqueue_style( 'trunck-main-stylesheet', get_stylesheet_directory_uri() . '/css/screen.css', array(), "1.0", "screen" );
	}
	else
	{
		wp_enqueue_style( 'trunck-main-stylesheet', get_stylesheet_directory_uri() . '/css/screen.min.css', array(), "1.0", "screen" );
	}

	wp_enqueue_style( 'trunck-print-stylesheet', get_stylesheet_directory_uri() . '/css/print.min.css', array(), "1.0", "print" );

}
add_action( 'wp_enqueue_scripts', 'trunck_css' );

function trunck_js () {
	wp_enqueue_script( 'trunck-modernizr', get_stylesheet_directory_uri() . '/js/modernizr.js', array(), "1.0");

	wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '2.1.3', true);

	// Enqueue the main JS file.
	if (ENVIRONMENT == "development")
	{
		wp_enqueue_script( 'trunck-js', get_stylesheet_directory_uri() . '/js/script.js', array("jquery"), "1.0", true);
	}
	else
	{
		wp_enqueue_script( 'trunck-js', get_stylesheet_directory_uri() . '/js/script.min.js', array("jquery"), "1.0", true);
	}
}

add_action( 'wp_enqueue_scripts', 'trunck_js' );

?>