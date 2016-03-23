<?php
/**
* Template Name: Right Sidebar
*
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render( array( 'page-right-sidebar.twig' ), $context );