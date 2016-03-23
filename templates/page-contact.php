<?php
/**
* Template Name: Contact
*
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render( array( 'page-contact.twig' ), $context );