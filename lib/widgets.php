<?php

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Sidebar Widgets', 'fission'),
        'description' => __('Sidebar widget area...', 'fission'),
        'id' => 'sidebar-widget-area',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Footer Widgets', 'fission'),
        'description' => __('Footer widget area...', 'fission'),
        'id' => 'footer-widget-area',
        'before_widget' => '<div id="%1$s" class="%2$s columns medium-4">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}


?>