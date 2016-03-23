<?php
/**
* Template Name: Homepage
*
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['latest_posts'] = Timber::get_posts(
	array(
		'post_type' => 'post',
		'posts_per_page' => 3
	)
);
Timber::render( array( 'page-home.twig'), $context );