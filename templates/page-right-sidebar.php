<?php
/**
* Template Name: Right Sidebar
*
*/

//trunck_template_style("page_right_sidebar"); // Enqueues template specific stylesheet if using decoupled CSS files
$context = Timber::get_context();
$post = new TrunckPost();
$context['post'] = $post;
Timber::render( array( 'page-right-sidebar.twig' ), $context );