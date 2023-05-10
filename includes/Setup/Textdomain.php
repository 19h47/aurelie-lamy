<?php // phpcs:ignore
/**
 * Textdomain
 *
 * @package WordPress
 * @subpackage AurelieLamy/Setup/Textdomain
 */

namespace AurelieLamy\Setup;

/**
 * Supports
 */
class Textdomain {

	/**
	 * Runs initialization tasks.
	 *
	 * @return void
	 */
	public function run() : void {
		add_action( 'after_setup_theme', array( $this, 'add_theme_textdomain' ) );
	}


	/**
	 * Add theme textdomain
	 *
	 * @return void
	 */
	public function add_theme_textdomain() : void {
		load_theme_textdomain( get_theme_text_domain(), get_template_directory() . '/languages' );
	}
}
