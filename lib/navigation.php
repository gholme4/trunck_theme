<?php

// Outputs main menu
function trunck_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}

// Register Navigation
function trunck_register_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'trunck'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'trunck'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'trunck') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}
add_action('init', 'trunck_register_menu'); // Add HTML5 Blank Menu

?>