<?php
/**
 * Aurelie Lamy functions and definitions
 *
 * @package WordPress
 * @subpackage AurelieLamy
 */

// Autoloader.
require_once get_template_directory() . '/vendor/autoload.php';

Timber\Timber::init();
AurelieLamy\Init::run_services();
