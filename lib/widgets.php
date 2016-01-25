<?php

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Sidebar Widgets', 'trunck'),
        'description' => __('Sidebar widget area...', 'trunck'),
        'id' => 'sidebar-widget-area',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Footer Widgets', 'trunck'),
        'description' => __('Footer widget area...', 'trunck'),
        'id' => 'footer-widget-area',
        'before_widget' => '<div id="%1$s" class="%2$s columns medium-4">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}


?>