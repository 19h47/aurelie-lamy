<?php // phpcs:ignore
/**
 * Athlete Post Fields
 *
 * @package    WordPress
 * @subpackage AurelieLamy
 */

namespace AurelieLamy\Plugins\ACF\Fields;

/**
 * Athlete Post Fields
 */
class AthletePostFields {

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
		$key            = 'athlete_post';
		$hide_on_screen = array( 'the_content' );

		$location = array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'athlete',
				),
			),
		);

		$fields = array(
			array(
				'key'         => 'field_' . $key . '_position',
				'label'       => __( 'Position', 'aurelielamy' ),
				'name'        => 'position',
				'type'        => 'text',
				'placeholder' => __( 'Position', 'aurelielamy' ),
			),
			array(
				'key'          => 'field_' . $key . '_testimonial',
				'label'        => __( 'Testimonial', 'aurelielamy' ),
				'name'         => 'testimonial',
				'type'         => 'wysiwyg',
				'tabs'         => 'all',
				'toolbar'      => 'basic',
				'media_upload' => 0,
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group(
				array(
					'key'            => 'group_' . $key,
					'title'          => __( 'Athlete Post Fields', 'aurelielamy' ),
					'fields'         => $fields,
					'location'       => $location,
					'hide_on_screen' => $hide_on_screen,
					'menu_order'     => 0,
				)
			);

		}
	}
}
