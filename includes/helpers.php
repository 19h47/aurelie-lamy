<?php // phpcs:ignore
/**
 * Les Rapporteuses helpers function
 *
 * @package Les Rapporteuses
 */


/**
 * Retrieve the classes for the html element as an array.
 *
 * @param  string|array $class One or more classes to add to the class list.
 * @return array Array of classes.
 * @access public
 */
function get_html_class( $class = '' ) : array {
	$classes = array();
	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}
	$classes = array_map( 'esc_attr', $classes );
	/**
	 * Filter the list of CSS html classes for the current post or page.
	 *
	 * @param array  $classes An array of html classes.
	 * @param string $class   A comma-separated list of additional classes added to the html.
	 */
	$classes = apply_filters( 'html_class', $classes, $class );

	return array_unique( $classes );
}


/**
 * Display the classes for the html element.
 *
 * @param string|array $class One or more classes to add to the class list.
 * @return string
 */
function html_class( $class = '' ) : string {
	// Separates classes with a single space, collates classes for html element.
	return 'class="' . join( ' ', get_html_class( $class ) ) . '"';
}


/**
 * List webfonts used by the theme.
 *
 * Returns an array of name and url.
 *
 * @since  1.0.0
 * @return array
 * @access public
 */
function get_webfonts() : array {
	return array(
		'montserrat' => '//fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,600;1,500&display=swap',
	);
}



/**
 * Hero group fields
 *
 * @param string $key Key.
 *
 * @return array
 */
function get_hero_group_fields( string $key = '' ) : array {
	return array(
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
				'key'          => 'field_' . $key . '_hero_content',
				'label'        => __( 'Content', 'aurelielamy' ),
				'name'         => 'content',
				'type'         => 'wysiwyg',
				'tabs'         => 'all',
				'toolbar'      => 'basic',
				'media_upload' => 0,
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
	);
}
