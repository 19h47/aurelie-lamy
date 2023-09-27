<?php // phpcs:ignore
/**
 * Proficiency Page Fields
 *
 * @package    WordPress
 * @subpackage AurelieLamy
 */

namespace AurelieLamy\Plugins\ACF\Fields;

/**
 * Proficiency Page Fields
 */
class ProficiencyPageFields {

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
		$key            = 'proficiency_page';
		$hide_on_screen = array( 'the_content' );

		$location = array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'templates/proficiency-page.php',
				),
			),
		);

		$fields = array(
			get_hero_group_fields(
				$key,
				array(
					'key'           => 'field_' . $key . '_hero_layout',
					'label'         => __( 'Layout', 'aurelielamy' ),
					'name'          => 'layout',
					'type'          => 'radio',
					'choices'       => array(
						'full' => __( 'Full', 'aurelielamy' ),
						'grid' => __( 'Grid', 'aurelielamy' ),
					),
					'default_value' => 'grid',
					'return_format' => 'value',
					'layout'        => 'vertical',

				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group(
				array(
					'key'            => 'group_' . $key,
					'title'          => __( 'Talks Page Fields', 'aurelielamy' ),
					'fields'         => $fields,
					'location'       => $location,
					'hide_on_screen' => $hide_on_screen,
					'menu_order'     => 0,
				)
			);

		}
	}
}
