<?php // phpcs:ignore
/**
 * About Page Fields
 *
 * @package WordPress
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
			array(
				'key'        => 'field_' . $key . '_hero',
				'label'      => __( 'Hero', 'aurelielamy' ),
				'name'       => 'hero',
				'type'       => 'group',
				'sub_fields' => array(
					array(
						'key'         => 'field_' . $key . '_hero_heading',
						'label'       => __( 'Heading', 'aurelielamy' ),
						'name'        => 'heading',
						'type'        => 'textarea',
						'new_lines'   => 'br',
						'rows'        => 3,
						'placeholder' => __( 'Heading', 'aurelielamy' ),
					),
					array(
						'key'         => 'field_' . $key . '_hero_content',
						'label'       => __( 'Content', 'aurelielamy' ),
						'name'        => 'content',
						'type'        => 'textarea',
						'new_lines'   => 'wpautop',
						'rows'        => 1,
						'placeholder' => __( 'Content', 'aurelielamy' ),
					),
					array(
						'key'           => 'field_' . $key . '_hero_image',
						'label'         => __( 'Image', 'aurelielamy' ),
						'name'          => 'image',
						'type'          => 'image',
						'return_format' => 'array',
						'library'       => 'all',
					),
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group(
				array(
					'key'            => 'group_' . $key,
					'title'          => __( 'About Page Fields', 'aurelielamy' ),
					'fields'         => $fields,
					'location'       => $location,
					'hide_on_screen' => $hide_on_screen,
				)
			);

		}
	}
}
