<?php
/**
 * Les Rapporteuses functions and definitions
 *
 * @package WordPress
 * @subpackage AurelieLamy
 */

// Autoloader.
require_once get_template_directory() . '/vendor/autoload.php';

Timber\Timber::init();
AurelieLamy\Init::run_services();

apply_filters( 'wp_read_audio_metadata', 'audio_metadata' );

function metadata( array $metadata, string $file, string|null $file_format, array $data ) {
	$metadata['test'] = 'test';

	return $metadata;
}
