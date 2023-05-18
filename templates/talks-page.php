<?php
/**
 * Template Name: Talks Page
 *
 * @package AurelieLamy
 */

use Timber\{ Timber };

$data = Timber::context();

Timber::render( 'pages/talks-page.html.twig', $data );
