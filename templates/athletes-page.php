<?php
/**
 * Template Name: Athletes Page
 *
 * @package AurelieLamy
 */

use Timber\{ Timber };

$data = Timber::context();

Timber::render( 'pages/athletes-page.html.twig', $data );
