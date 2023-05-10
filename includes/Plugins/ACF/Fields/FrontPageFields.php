<?php // phpcs:ignore
/**
 * Front Page Fields
 *
 * @package WordPress
 * @subpackage AurelieLamy
 */

namespace AurelieLamy\Plugins\ACF\Fields;

/**
 * Front Page Fields
 */
class FrontPageFields {
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

		$hide_on_screen = array( 'the_content' );

		$location = array(
			array(
				array(
					'param'    => 'page_type',
					'operator' => '==',
					'value'    => 'front_page',
				),
			),
		);

		$fields = array(
			array(
				'key'        => 'field_front_page_hero',
				'label'      => __( 'Hero', 'aurelie-lamy' ),
				'name'       => 'hero',
				'type'       => 'group',
				'sub_fields' => array(
					array(
						'key'        => 'field_front_page_hero_heading',
						'label'      => __( 'Heading', 'aurelie-lamy' ),
						'name'       => 'heading',
						'type'       => 'group',
						'sub_fields' => array(
							array(
								'key'         => 'field_front_page_hero_heading_0',
								'label'       => __( 'Heading Mobile', 'aurelie-lamy' ),
								'name'        => 0,
								'type'        => 'textarea',
								'new_lines'   => 'br',
								'rows'        => 2,
								'placeholder' => __( 'Heading', 'aurelie-lamy' ),
								'wrapper'     => array( 'width' => 50 ),
							),
							array(
								'key'         => 'field_front_page_hero_heading_1',
								'label'       => __( 'Heading Desktop', 'aurelie-lamy' ),
								'name'        => 1,
								'type'        => 'textarea',
								'new_lines'   => 'br',
								'rows'        => 2,
								'placeholder' => __( 'Heading', 'aurelie-lamy' ),
								'wrapper'     => array( 'width' => 50 ),
							),
						),
					),
					array(
						'key'   => 'field_front_page_hero_link',
						'label' => __( 'Link', 'aurelie-lamy' ),
						'name'  => 'link',
						'type'  => 'link',
					),
					array(
						'key'         => 'field_front_page_hero_content',
						'label'       => __( 'Content', 'aurelie-lamy' ),
						'name'        => 'content',
						'type'        => 'wysiwyg',
						'placeholder' => __( 'Content', 'aurelie-lamy' ),
					),
				),
			),
			array(
				'key'        => 'field_front_page_how_to_play',
				'label'      => __( 'How To Play', 'aurelie-lamy' ),
				'name'       => 'how_to_play',
				'type'       => 'group',
				'sub_fields' => array(
					array(
						'key'         => 'field_front_page_how_to_play_heading',
						'label'       => __( 'Heading', 'aurelie-lamy' ),
						'name'        => 'heading',
						'type'        => 'text',
						'placeholder' => __( 'Heading', 'aurelie-lamy' ),
					),
					array(
						'key'        => 'field_front_page_how_to_play_items',
						'label'      => __( 'Items', 'aurelie-lamy' ),
						'name'       => 'items',
						'type'       => 'group',
						'sub_fields' => array(
							array(
								'key'         => 'field_front_page_how_to_play_heading_items_0',
								'label'       => __( 'Item', 'aurelie-lamy' ),
								'name'        => 0,
								'type'        => 'text',
								'placeholder' => __( 'Item', 'aurelie-lamy' ),
								'wrapper'     => array( 'width' => 100 / 3 ),
							),
							array(
								'key'         => 'field_front_page_how_to_play_heading_items_1',
								'label'       => __( 'Item', 'aurelie-lamy' ),
								'name'        => 1,
								'type'        => 'text',
								'placeholder' => __( 'Item', 'aurelie-lamy' ),
								'wrapper'     => array( 'width' => 100 / 3 ),
							),
							array(
								'key'         => 'field_front_page_how_to_play_heading_items_2',
								'label'       => __( 'Item', 'aurelie-lamy' ),
								'name'        => 2,
								'type'        => 'text',
								'placeholder' => __( 'Item', 'aurelie-lamy' ),
								'wrapper'     => array( 'width' => 100 / 3 ),
							),
						),

					),
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group(
				array(
					'key'            => 'group_front_page',
					'title'          => __( 'Front Page Fields', 'aurelie-lamy' ),
					'fields'         => $fields,
					'location'       => $location,
					'hide_on_screen' => $hide_on_screen,
				)
			);

		}
	}
}
