<?php
/**
 * 404
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage AurelieLamy
 * @since 0.0.0
 */

use Timber\{ Timber };

$templates    = array( 'pages/404.html.twig' );
$data         = Timber::context();
$data['post'] = array(
	'title'   => __( 'Oops! That page can&rsquo;t be found.', 'aurelielamy' ),
	'content' => __( 'It looks like nothing was found at this location.', 'aurelielamy' ),
);

Timber::render( $templates, $data );
