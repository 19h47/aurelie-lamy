<?php // phpcs:ignore
/**
 * Podcast Post Fields
 *
 * @package    WordPress
 * @subpackage AurelieLamy
 */

namespace AurelieLamy\Plugins\ACF\Fields;

/**
 * Podcast Post Fields
 */
class PodcastPostFields {

	/**
	 * Runs initialization tasks.
	 *
	 * @return void
	 */
	public function run() {
		add_action( 'acf/include_fields', array( $this, 'fields' ) );
	}

	/**
	 * Registers the field group.
	 *
	 * @return void
	 */
	public function fields() {
		$key            = 'podcast_post';
		$hide_on_screen = array( 'the_content' );

		$location = array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'podcast',
				),
			),
		);

		$fields = array(
			array(
				'key'            => 'field_' . $key . '_duration',
				'label'          => __( 'Duration', 'aurelielamy' ),
				'name'           => 'duration',
				'type'           => 'time_picker',
				'display_format' => 'g:i a',
				'return_format'  => 'g:i a',
			),
			array(
				'key'           => 'field_' . $key . '_file',
				'label'         => __( 'File', 'aurelielamy' ),
				'name'          => 'file',
				'type'          => 'file',
				'return_format' => 'array',
				'library'       => 'all',
				'mime_types'    => 'mp3, wav, ogg',
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'            => 'group_' . $key,
					'title'          => __( 'Podcast Post Fields', 'aurelielamy' ),
					'fields'         => $fields,
					'location'       => $location,
					'hide_on_screen' => $hide_on_screen,
					'menu_order'     => 0,
				)
			);
		}
	}
}
