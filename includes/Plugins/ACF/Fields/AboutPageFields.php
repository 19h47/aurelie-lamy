<?php // phpcs:ignore
/**
 * About Page Fields
 *
 * @package    WordPress
 * @subpackage AurelieLamy
 */

namespace AurelieLamy\Plugins\ACF\Fields;

/**
 * About Page Fields
 */
class AboutPageFields {

	/**
	 * Runs initialization tasks.
	 *
	 * @return void
	 */
	public function run() {
		add_action( 'acf/init', array( $this, 'fields' ) );
	}

	/**
	 * Registers the field group.
	 *
	 * @return void
	 */
	public function fields() {
		$key            = 'about_page';
		$hide_on_screen = array( 'the_content' );

		$location = array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'templates/about-page.php',
				),
			),
		);

		$fields = array(
			get_hero_group_fields( $key ),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group(
				array(
					'key'            => 'group_' . $key,
					'title'          => __( 'About Page Fields', 'aurelielamy' ),
					'fields'         => $fields,
					'location'       => $location,
					'hide_on_screen' => $hide_on_screen,
					'menu_order'     => 0,
				)
			);

		}
	}
}
