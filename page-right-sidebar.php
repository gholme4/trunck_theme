<?php
/**
* Template Name: Right Sidebar
*
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render( array( 'template-right-sidebar.twig', 'page.twig' ), $context );