<?php
/**
* Template Name: Full Width
*
*/

$context = Timber::get_context();
$post = new TrunckPost();
$context['post'] = $post;
Timber::render( array( 'page-full-width.twig' ), $context );