<?php
/**
* Template Name: Contact
*
*/

$context = Timber::get_context();
$post = new TrunckPost();
$context['post'] = $post;
Timber::render( array( 'page-contact.twig' ), $context );