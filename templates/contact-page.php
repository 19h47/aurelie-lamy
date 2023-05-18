<?php
/**
 * Template Name: Contact Page
 *
 * @package AurelieLamy
 */

use Timber\{ Timber };

$data = Timber::context();

Timber::render( 'pages/contact-page.html.twig', $data );
