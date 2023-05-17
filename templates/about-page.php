<?php
/**
 * Template Name: About Page
 *
 * @package AurelieLamy
 */

use Timber\{ Timber };

$data = Timber::context();

Timber::render( 'pages/about-page.html.twig', $data );
