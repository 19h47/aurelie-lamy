<?php // phpcs:ignore
/**
 * Fields
 *
 * @package    WordPress
 * @subpackage AurelieLamy/Plugins/ACF/Admin
 */

namespace AurelieLamy\Plugins\ACF\Admin;

/**
 * Fields
 */
class Fields {

	/**
	 * Runs initialization tasks.
	 *
	 * @return void
	 */
	public function run() {
		add_filter( 'acf/fields/relationship/query/key=field_front_page_offers_posts', array( $this, 'relationship' ), 10, 3 );
	}

	/**
	 * Relationship
	 *
	 * @param array      $args    The query args. See WP_Query for available args.
	 * @param array      $field   The field array containing all settings.
	 * @param int|string $post_id The current post ID being edited.
	 */
	public function relationship( array $args, array $field, $post_id ) {

		$args['meta_query'] = array(
			array(
				'key'   => '_wp_page_template',
				'value' => 'templates/offer-page.php',
			),
		);

		return $args;
	}
}
