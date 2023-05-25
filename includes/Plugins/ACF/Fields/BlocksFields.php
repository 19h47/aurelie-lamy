<?php // phpcs:ignore
/**
 * Blocks Fields
 *
 * @package WordPress
 * @subpackage AurelieLamy
 */

namespace AurelieLamy\Plugins\ACF\Fields;

/**
 * Blocks  Fields
 */
class BlocksFields {
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
		$key            = 'blocks';
		$hide_on_screen = array( 'the_content' );

		$location = array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'page',
				),
				array(
					'param'    => 'page_template',
					'operator' => '!=',
					'value'    => 'templates/athletes-page.php',
				),
			),
		);

		$fields = array(
			array(
				'key'          => 'field_' . $key,
				'label'        => __( 'Blocks', 'aurelielamy' ),
				'name'         => 'blocks',
				'type'         => 'flexible_content',
				'layouts'      => array(
					'layout_' . $key . '_two_columns'   => array(
						'key'        => 'layout_' . $key . '_two_columns',
						'label'      => __( 'Two Columns', 'aurelielamy' ),
						'name'       => 'two_columns',
						'display'    => 'block',
						'sub_fields' => array(
							array(
								'key'        => 'field_' . $key . '_two_columns_columns',
								'name'       => 'columns',
								'type'       => 'group',
								'sub_fields' => array(
									array(
										'key'        => 'field_' . $key . '_two_columns_columns_0',
										'name'       => 0,
										'type'       => 'group',
										'wrapper'    => array( 'width' => 50 ),
										'sub_fields' => array(
											array(
												'key'  => 'field_' . $key . '_two_columns_columns_0_header',
												'name' => 'header',
												'type' => 'group',
												'sub_fields' => array(
													array(
														'key'     => 'field_' . $key . '_two_columns_columns_0_header_image',
														'label'   => __( 'Image', 'aurelielamy' ),
														'name'    => 'image',
														'type'    => 'image',
														'return_format' => 'array',
														'library' => 'all',
														'preview_size' => 'small',
														'wrapper' => array( 'width' => 4 / 12 * 100 ),
													),
													array(
														'key'     => 'field_' . $key . '_two_columns_columns_0_header_title',
														'label'   => __( 'Title', 'aurelielamy' ),
														'name'    => 'title',
														'type'    => 'textarea',
														'rows'    => 2,
														'new_lines' => 'br',
														'placeholder' => __( 'Title', 'aurelielamy' ),
														'wrapper' => array( 'width' => 8 / 12 * 100 ),
													),
													array(
														'key'   => 'field_' . $key . '_two_columns_columns_0_header_subtitle',
														'label' => __( 'Subtitle', 'aurelielamy' ),
														'name'  => 'subtitle',
														'type'  => 'textarea',
														'rows'  => 2,
														'new_lines' => 'br',
														'placeholder' => __( 'Subtitle', 'aurelielamy' ),
													),
												),
											),
											array(
												'key'     => 'field_' . $key . '_two_columns_columns_0_content',
												'label'   => __( 'Content', 'aurelielamy' ),
												'name'    => 'content',
												'type'    => 'wysiwyg',
												'tabs'    => 'all',
												'toolbar' => 'basic',
												'media_upload' => 0,
											),
											array(
												'key'   => 'field_' . $key . '_two_columns_columns_0_link',
												'label' => __( 'Link', 'aurelielamy' ),
												'name'  => 'link',
												'type'  => 'link',
												'return_format' => 'array',
											),
											array(
												'key'  => 'field_' . $key . '_two_columns_columns_0_quote',
												'name' => 'quote',
												'type' => 'group',
												'sub_fields' => array(
													array(
														'key'     => 'field_' . $key . '_two_columns_columns_0_quote_image',
														'label'   => __( 'Image', 'aurelielamy' ),
														'name'    => 'image',
														'type'    => 'image',
														'return_format' => 'array',
														'library' => 'all',
														'preview_size' => 'small',
														'wrapper' => array( 'width' => 5 / 12 * 100 ),
													),
													array(
														'key'     => 'field_' . $key . '_two_columns_columns_0_quote_title',
														'label'   => __( 'Title', 'aurelielamy' ),
														'name'    => 'title',
														'type'    => 'textarea',
														'rows'    => 2,
														'new_lines' => 'br',
														'placeholder' => __( 'Title', 'aurelielamy' ),
														'wrapper' => array( 'width' => 7 / 12 * 100 ),
													),
													array(
														'key'   => 'field_' . $key . '_two_columns_columns_0_quote_name',
														'label' => __( 'Name', 'aurelielamy' ),
														'name'  => 'name',
														'type'  => 'text',
														'placeholder' => __( 'Name', 'aurelielamy' ),
													),
												),
											),
										),
									),
									array(
										'key'        => 'field_' . $key . '_two_columns_columns_1',
										'name'       => 1,
										'type'       => 'group',
										'wrapper'    => array( 'width' => 50 ),
										'sub_fields' => array(
											array(
												'key'  => 'field_' . $key . '_two_columns_columns_1_header',
												'name' => 'header',
												'type' => 'group',
												'sub_fields' => array(
													array(
														'key'     => 'field_' . $key . '_two_columns_columns_1_header_image',
														'label'   => __( 'Image', 'aurelielamy' ),
														'name'    => 'image',
														'type'    => 'image',
														'return_format' => 'array',
														'library' => 'all',
														'preview_size' => 'small',
														'wrapper' => array( 'width' => 4 / 12 * 100 ),
													),
													array(
														'key'     => 'field_' . $key . '_two_columns_columns_1_header_title',
														'label'   => __( 'Title', 'aurelielamy' ),
														'name'    => 'title',
														'type'    => 'textarea',
														'rows'    => 2,
														'new_lines' => 'br',
														'placeholder' => __( 'Title', 'aurelielamy' ),
														'wrapper' => array( 'width' => 8 / 12 * 100 ),
													),
													array(
														'key'   => 'field_' . $key . '_two_columns_columns_1_header_subtitle',
														'label' => __( 'Subtitle', 'aurelielamy' ),
														'name'  => 'subtitle',
														'type'  => 'textarea',
														'rows'  => 2,
														'new_lines' => 'br',
														'placeholder' => __( 'Subtitle', 'aurelielamy' ),
													),
												),
											),
											array(
												'key'     => 'field_' . $key . '_two_columns_columns_1_content',
												'label'   => __( 'Content', 'aurelielamy' ),
												'name'    => 'content',
												'type'    => 'wysiwyg',
												'tabs'    => 'all',
												'toolbar' => 'basic',
												'media_upload' => 0,
											),
											array(
												'key'   => 'field_' . $key . '_two_columns_columns_1_link',
												'label' => __( 'Link', 'aurelielamy' ),
												'name'  => 'link',
												'type'  => 'link',
												'return_format' => 'array',
											),
											array(
												'key'  => 'field_' . $key . '_two_columns_columns_1_quote',
												'name' => 'quote',
												'type' => 'group',
												'sub_fields' => array(
													array(
														'key'     => 'field_' . $key . '_two_columns_columns_1_quote_image',
														'label'   => __( 'Image', 'aurelielamy' ),
														'name'    => 'image',
														'type'    => 'image',
														'return_format' => 'array',
														'library' => 'all',
														'preview_size' => 'small',
														'wrapper' => array( 'width' => 5 / 12 * 100 ),
													),
													array(
														'key'     => 'field_' . $key . '_two_columns_columns_1_quote_title',
														'label'   => __( 'Title', 'aurelielamy' ),
														'name'    => 'title',
														'type'    => 'textarea',
														'rows'    => 2,
														'new_lines' => 'br',
														'placeholder' => __( 'Title', 'aurelielamy' ),
														'wrapper' => array( 'width' => 7 / 12 * 100 ),
													),
													array(
														'key'   => 'field_' . $key . '_two_columns_columns_1_quote_name',
														'label' => __( 'Name', 'aurelielamy' ),
														'name'  => 'name',
														'type'  => 'text',
														'placeholder' => __( 'Name', 'aurelielamy' ),
													),
												),
											),
										),
									),
								),
							),
						),
					),
					'layout_' . $key . '_three_columns' => array(
						'key'        => 'layout_' . $key . '_three_columns',
						'label'      => __( 'Three Columns', 'aurelielamy' ),
						'name'       => 'three_columns',
						'display'    => 'block',
						'sub_fields' => array(
							array(
								'key'        => 'field_' . $key . '_three_columns_columns',
								'name'       => 'columns',
								'type'       => 'group',
								'sub_fields' => array(
									$this->three_columns_column( $key ),
									$this->three_columns_column( $key, 1 ),
									$this->three_columns_column( $key, 2 ),
								),
							),
						),
					),
					'layout_' . $key . '_four_columns'  => array(
						'key'        => 'layout_' . $key . '_four_columns',
						'label'      => __( 'Four Columns', 'aurelielamy' ),
						'name'       => 'four_columns',
						'display'    => 'block',
						'sub_fields' => array(
							array(
								'key'         => 'field_' . $key . '_four_columns_title',
								'label'       => __( 'Title', 'aurelielamy' ),
								'name'        => 'title',
								'type'        => 'textarea',
								'rows'        => 2,
								'new_lines'   => 'br',
								'placeholder' => __( 'Title', 'aurelielamy' ),
							),

							array(
								'key'        => 'field_' . $key . '_four_columns_columns',
								'name'       => 'columns',
								'type'       => 'group',
								'sub_fields' => array(
									$this->four_columns_column( $key ),
									$this->four_columns_column( $key, 1 ),
									$this->four_columns_column( $key, 2 ),
									$this->four_columns_column( $key, 3 ),
								),
							),
						),
					),
					'layout_' . $key . '_content'       => array(
						'key'        => 'layout_' . $key . '_content',
						'label'      => __( 'Content', 'aurelielamy' ),
						'name'       => 'content',
						'display'    => 'block',
						'sub_fields' => array(
							array(
								'key'         => 'field_' . $key . '_content_title',
								'label'       => __( 'Title', 'aurelielamy' ),
								'name'        => 'title',
								'type'        => 'textarea',
								'rows'        => 3,
								'new_lines'   => 'br',
								'placeholder' => __( 'Title', 'aurelielamy' ),
							),
							array(
								'key'          => 'field_' . $key . '_content_content',
								'label'        => __( 'Content', 'aurelielamy' ),
								'name'         => 'content',
								'type'         => 'wysiwyg',
								'tabs'         => 'all',
								'toolbar'      => 'basic',
								'media_upload' => 0,
								'media_upload' => 1,
								'delay'        => 0,
							),
							array(
								'key'           => 'field_' . $key . '_content_link',
								'label'         => __( 'Link', 'aurelielamy' ),
								'name'          => 'link',
								'type'          => 'link',
								'return_format' => 'array',
							),
							array(
								'key'           => 'field_' . $key . '_content_image',
								'label'         => __( 'Image', 'aurelielamy' ),
								'name'          => 'image',
								'type'          => 'image',
								'return_format' => 'array',
								'library'       => 'all',
								'preview_size'  => 'medium',
							),
							array(
								'key'           => 'field_' . $key . '_content_layout',
								'label'         => __( 'Layout', 'aurelielamy' ),
								'name'          => 'layout',
								'type'          => 'radio',
								'instructions'  => __( 'Image layout.', 'aurelielamy' ),
								'choices'       => array(
									'right' => __( 'Right', 'aurelielamy' ),
									'left'  => __( 'Left', 'aurelielamy' ),
								),
								'default_value' => 'left',
								'return_format' => 'value',
								'allow_null'    => 0,
								'other_choice'  => 0,
								'layout'        => 'horizontal',
							),
						),
					),
					'layout_' . $key . '_video'         => array(
						'key'        => 'layout_' . $key . '_video',
						'name'       => 'video',
						'label'      => __( 'Video', 'aurelielamy' ),
						'display'    => 'block',
						'sub_fields' => array(
							array(
								'key'         => 'field_' . $key . '_video_title',
								'label'       => __( 'Title', 'aurelielamy' ),
								'name'        => 'title',
								'type'        => 'textarea',
								'rows'        => 3,
								'new_lines'   => 'br',
								'placeholder' => __( 'Title', 'aurelielamy' ),
							),
							array(
								'key'          => 'field_' . $key . '_video_content',
								'label'        => __( 'Content', 'aurelielamy' ),
								'name'         => 'content',
								'type'         => 'wysiwyg',
								'tabs'         => 'all',
								'toolbar'      => 'basic',
								'media_upload' => 0,
								'delay'        => 0,
							),
							array(
								'key'           => 'field_' . $key . '_video_poster',
								'label'         => __( 'Poster', 'aurelielamy' ),
								'name'          => 'poster',
								'type'          => 'image',
								'wrapper'       => array(
									'width' => 6 / 12 * 100,
								),
								'return_format' => 'array',
								'library'       => 'all',
								'preview_size'  => 'medium',
							),
							array(
								'key'           => 'field_' . $key . '_video_video',
								'label'         => __( 'Video', 'aurelielamy' ),
								'name'          => 'video',
								'type'          => 'file',
								'wrapper'       => array(
									'width' => 6 / 12 * 100,
								),
								'return_format' => 'array',
								'library'       => 'all',
								'mime_types'    => 'mp4, ogg, webm',
							),
						),
					),
					'layout_' . $key . '_contents'      => array(
						'key'        => 'layout_' . $key . '_contents',
						'name'       => 'contents',
						'label'      => __( 'Contents', 'aurelielamy' ),
						'display'    => 'block',
						'sub_fields' => array(

							array(
								'key'         => 'field_' . $key . '_contents_title',
								'label'       => __( 'Title', 'aurelielamy' ),
								'name'        => 'title',
								'type'        => 'textarea',
								'rows'        => 3,
								'placeholder' => __( 'Title', 'aurelielamy' ),
								'new_lines'   => 'br',
							),
							array(
								'key'        => 'field_' . $key . '_contents_contents',
								'label'      => __( 'Contents', 'aurelielamy' ),
								'name'       => 'contents',
								'type'       => 'group',
								'layout'     => 'block',
								'sub_fields' => array(
									array(
										'key'          => 'field_' . $key . '_contents_contents_0',
										'label'        => __( 'Content', 'aurelielamy' ),
										'name'         => 0,
										'type'         => 'wysiwyg',
										'wrapper'      => array(
											'width' => 6 / 12 * 100,
										),
										'tabs'         => 'all',
										'toolbar'      => 'basic',
										'media_upload' => 0,

									),
									array(
										'key'          => 'field_' . $key . '_contents_contents_1',
										'label'        => __( 'Content', 'aurelielamy' ),
										'name'         => 1,
										'type'         => 'wysiwyg',
										'wrapper'      => array(
											'width' => 6 / 12 * 100,
										),
										'tabs'         => 'all',
										'toolbar'      => 'basic',
										'media_upload' => 1,
									),
								),
							),
							array(
								'key'        => 'field_' . $key . '_contents_images',
								'label'      => 'Images',
								'name'       => 'images',

								'type'       => 'group',

								'layout'     => 'block',
								'sub_fields' => array(
									array(
										'key'           => 'field_' . $key . '_contents_images_0',
										'label'         => __( 'Image', 'aurelielamy' ),
										'name'          => 0,
										'type'          => 'image',
										'wrapper'       => array(
											'width' => 4 / 12 * 100,
										),
										'return_format' => 'id',
										'library'       => 'all',
										'preview_size'  => 'medium',
									),
									array(
										'key'           => 'field_' . $key . '_contents_images_1',
										'label'         => __( 'Image', 'aurelielamy' ),
										'name'          => 1,
										'type'          => 'image',
										'wrapper'       => array(
											'width' => 4 / 12 * 100,
										),
										'return_format' => 'id',
										'library'       => 'all',
										'preview_size'  => 'medium',
									),
									array(
										'key'           => 'field_' . $key . '_contents_images_2',
										'label'         => __( 'Image', 'aurelielamy' ),
										'name'          => 2,
										'type'          => 'image',
										'wrapper'       => array(
											'width' => 4 / 12 * 100,
										),
										'return_format' => 'id',
										'library'       => 'all',
										'preview_size'  => 'medium',
									),
								),
							),
						),
					),
					'layout_' . $key . '_key_figures'   => array(
						'key'        => 'layout_' . $key . '_key_figures',
						'name'       => 'key_figures',
						'label'      => __( 'Key Figures', 'aurelielamy' ),
						'display'    => 'block',
						'sub_fields' => array(
							array(
								'key'           => 'field_' . $key . '_key_figures_key_figures',
								'label'         => __( 'Key Figures', 'aurelielamy' ),
								'name'          => 'key_figures',
								'type'          => 'repeater',
								'layout'        => 'block',
								'button_label'  => __( 'Add Key Figure', 'aurelielamy' ),
								'rows_per_page' => 20,
								'sub_fields'    => array(
									array(
										'key'             => 'field_' . $key . '_key_figures_key_figures_title',
										'label'           => __( 'Title', 'aurelielamy' ),
										'name'            => 'title',
										'type'            => 'text',
										'placeholder'     => __( 'Title', 'aurelielamy' ),
										'parent_repeater' => 'field_' . $key . '_key_figures_key_figures',
									),
									array(
										'key'             => 'field_' . $key . '_key_figures_key_figures_content',
										'label'           => __( 'Content', 'aurelielamy' ),
										'name'            => 'content',
										'type'            => 'wysiwyg',
										'tabs'            => 'all',
										'toolbar'         => 'basic',
										'media_upload'    => 0,
										'parent_repeater' => 'field_' . $key . '_key_figures_key_figures',
									),
								),
							),
							array(
								'key'           => 'field_' . $key . '_key_figures_background_color',
								'label'         => __( 'Background Color', 'aurelielamy' ),
								'name'          => 'background_color',
								'type'          => 'select',
								'choices'       => array(
									'#FEECEA' => __( 'Red', 'aurelielamy' ),
									'#FFFFFF' => __( 'White', 'aurelielamy' ),
								),
								'default_value' => '#FFFFFF',
								'return_format' => 'value',
								'multiple'      => 0,
								'allow_null'    => 0,
								'ui'            => 0,
								'ajax'          => 0,
								'placeholder'   => '',
							),
						),
					),
					'layout_' . $key . '_image_contents' => array(
						'key' => 'layout_' . $key . '_image_contents',
						'name' => 'image_contents',
						'label' => __( 'Image & Contents', 'aurelielamy' ),
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_' . $key . '_image_contents_image',
								'label' => __( 'Image', 'aurelielamy' ),
								'name' => 'image',
								'type' => 'image',
								'wrapper' => array( 'width' => 5 / 12 * 100 ),
								'return_format' => 'array',
								'library' => 'all',
								'preview_size' => 'medium',
							),
							array(
								'key' => 'field_' . $key . '_image_contents_contents',
								'label' => __( 'Contents', 'aurelielamy' ),
								'name' => 'contents',
								'type' => 'group',
								'wrapper' => array( 'width' => 7 / 12 * 100 ),
								'layout' => 'block',
								'sub_fields' => array(
									array(
										'key' => 'field_' . $key . '_image_contents_contents_0',
										'label' => __( 'Content', 'aurelielamy' ),
										'name' => 0,
										'type' => 'group',
										'layout' => 'block',
										'sub_fields' => array(
											array(
												'key' => 'field_' . $key . '_image_contents_contents_0_title',
												'label' => __( 'Title', 'aurelielamy' ),
												'name' => 'title',
												'type' => 'textarea',
												'rows' => 2,
												'new_lines' => 'br',
												'placeholder' => __( 'Title', 'aurelielamy' ),
											),
											array(
												'key' => 'field_' . $key . '_image_contents_contents_0_content',
												'label' => __( 'Content', 'aurelielamy' ),
												'name' => 'content',
												'type' => 'wysiwyg',
												'tabs' => 'all',
												'toolbar' => 'basic',
												'media_upload' => 0,
											),
										),
									),
									array(
										'key' => 'field_' . $key . '_image_contents_contents_1',
										'label' => __( 'Content', 'aurelielamy' ),
										'name' => 1,
										'type' => 'group',
										'layout' => 'block',
										'sub_fields' => array(
											array(
												'key' => 'field_' . $key . '_image_contents_contents_1_title',
												'label' => __( 'Title', 'aurelielamy' ),
												'name' => 'title',
												'type' => 'textarea',
												'rows' => 2,
												'new_lines' => 'br',
												'placeholder' => __( 'Title', 'aurelielamy' ),
											),
											array(
												'key' => 'field_' . $key . '_image_contents_contents_1_content',
												'label' => __( 'Content', 'aurelielamy' ),
												'name' => 'content',
												'type' => 'wysiwyg',
												'tabs' => 'all',
												'toolbar' => 'basic',
												'media_upload' => 0,
											),
										),
									),
								),
							),
						),
					)
				),
				'button_label' => __( 'Add Block', 'aurelielamy' ),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group(
				array(
					'key'            => 'group_' . $key,
					'title'          => __( 'Blocks Fields', 'aurelielamy' ),
					'fields'         => $fields,
					'location'       => $location,
					'hide_on_screen' => $hide_on_screen,
					'menu_order'     => 1,
				)
			);

		}
	}

	/**
	 * Three Columns Column
	 *
	 * @param string $key Key.
	 * @param int    $index Index.
	 *
	 * @return array
	 */
	public function three_columns_column( string $key = '', int $index = 0 ) : array {
		return array(
			'key'        => 'field_' . $key . '_three_columns_columns_' . $index,
			'name'       => $index,
			'type'       => 'group',
			'wrapper'    => array( 'width' => 4 / 12 * 100 ),
			'sub_fields' => array(
				array(
					'key'           => 'field_' . $key . '_three_columns_columns_' . $index . '_image',
					'label'         => __( 'Image', 'aurelielamy' ),
					'name'          => 'image',
					'type'          => 'image',
					'return_format' => 'array',
					'library'       => 'all',
					'preview_size'  => 'medium',
				),
				array(
					'key'         => 'field_' . $key . '_three_columns_columns_' . $index . '_title',
					'label'       => __( 'Title', 'aurelielamy' ),
					'name'        => 'title',
					'type'        => 'textarea',
					'rows'        => 2,
					'new_lines'   => 'br',
					'placeholder' => __( 'Title', 'aurelielamy' ),
				),
				array(
					'key'          => 'field_' . $key . '_three_columns_columns_' . $index . '_content',
					'label'        => __( 'Content', 'aurelielamy' ),
					'name'         => 'content',
					'type'         => 'wysiwyg',
					'tabs'         => 'all',
					'toolbar'      => 'basic',
					'media_upload' => 0,
					'delay'        => 0,
				),

			),
		);
	}


	/**
	 * Four Columns Column
	 *
	 * @param string $key Key.
	 * @param int    $index Index.
	 *
	 * @return array
	 */
	public function four_columns_column( string $key = '', int $index = 0 ) : array {
		return array(
			'key'        => 'field_' . $key . '_four_columns_columns_' . $index,
			'name'       => $index,
			'type'       => 'group',
			'wrapper'    => array( 'width' => 3 / 12 * 100 ),
			'sub_fields' => array(
				array(
					'key'           => 'field_' . $key . '_four_columns_columns_' . $index . '_image',
					'label'         => __( 'Image', 'aurelielamy' ),
					'name'          => 'image',
					'type'          => 'image',
					'return_format' => 'array',
					'library'       => 'all',
					'preview_size'  => 'medium',
				),
				array(
					'key'         => 'field_' . $key . '_four_columns_columns_' . $index . '_title',
					'label'       => __( 'Title', 'aurelielamy' ),
					'name'        => 'title',
					'type'        => 'textarea',
					'rows'        => 2,
					'new_lines'   => 'br',
					'placeholder' => __( 'Title', 'aurelielamy' ),
				),
				array(
					'key'         => 'field_' . $key . '_four_columns_columns_' . $index . '_subtitle',
					'label'       => __( 'Subtitle', 'aurelielamy' ),
					'name'        => 'subtitle',
					'type'        => 'text',
					'placeholder' => __( 'Subtitle', 'aurelielamy' ),
				),
				array(
					'key'          => 'field_' . $key . '_four_columns_columns_' . $index . '_content',
					'label'        => __( 'Content', 'aurelielamy' ),
					'name'         => 'content',
					'type'         => 'wysiwyg',
					'tabs'         => 'all',
					'toolbar'      => 'basic',
					'media_upload' => 0,
					'delay'        => 0,
				),

			),
		);
	}
}
