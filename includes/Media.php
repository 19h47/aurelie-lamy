<?php // phpcs:ignore
/**
 * Media
 *
 * @package WordPress
 * @subpackage AurelieLamy
 */

namespace AurelieLamy;

/**
 * Media
 */
class Media {

	/**
	 * Runs initialization tasks.
	 *
	 * @return void
	 */
	public function run() : void {
		// add_image_size( 'size-1', 146 );
		// add_image_size( 'size-2', 340 );
		// add_image_size( 'size-3', 534 );
		// add_image_size( 'size-4', 728 );
		// add_image_size( 'size-5', 922 );
		add_image_size( 'size-6', 536 );
		add_image_size( 'size-7', 628 );
		// add_image_size( 'size-8', 1504 );
		// add_image_size( 'size-9', 1698 );
		// add_image_size( 'size-10', 1892 );
		// add_image_size( 'size-11', 2086 );
		// add_image_size( 'size-12', 2280 );
		// add_image_size( 'size-full', 2880 );
	}
}
