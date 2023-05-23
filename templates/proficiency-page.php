<?php
/**
 * Template Name: Proficiency Page
 *
 * @package AurelieLamy
 */

use Timber\{ Timber };

$data = Timber::context();

Timber::render( 'pages/proficiency-page.html.twig', $data );
