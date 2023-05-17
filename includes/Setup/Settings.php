<?php // phpcs:ignore
/**
 * Settings
 *
 * @package WordPress
 * @subpackage AurelieLamy
 */

namespace AurelieLamy\Setup;

/**
 * Supports
 */
class Settings {

	/**
	 * Runs initialization tasks.
	 *
	 * @return void
	 */
	public function run() : void {
		add_action( 'admin_init', array( $this, 'settings_api_init' ) );
		add_action( 'init', array( $this, 'register_settings' ) );
	}


	/**
	 * Register settings
	 *
	 * @return void
	 */
	public function settings_api_init() : void {
		add_settings_section(
			'contacts',
			'',
			array( $this, 'contacts_callback_function' ),
			'reading'
		);

		add_settings_field(
			'public_email',
			__( 'Public Email Address', 'aurelielamy' ),
			array( $this, 'email_callback_function' ),
			'reading',
			'contacts',
			array(
				'name'        => 'public_email',
				'label'       => __( 'Email', 'aurelielamy' ),
				'description' => __( 'This address is used for public purposes.', 'aurelielamy' ),
				'placeholder' => 'artvandelay@vandelayindustries.com',
			)
		);

		add_settings_section(
			'socials',
			'',
			array( $this, 'socials_callback_function' ),
			'general'
		);

		add_settings_field(
			'linkedin',
			__( 'LinkedIn', 'aurelielamy' ),
			array( $this, 'text_callback_function' ),
			'general',
			'socials',
			array(
				'name'        => 'linkedin',
				'placeholder' => 'https://www.linkedin.com/artvandelay',
				'description' => __( 'Enter the LinkedIn URL here.', 'aurelielamy' ),
			)
		);

		add_settings_field(
			'instagram',
			__( 'Instagram', 'aurelielamy' ),
			array( $this, 'text_callback_function' ),
			'general',
			'socials',
			array(
				'name'        => 'instagram',
				'placeholder' => 'https://instagram.com/artvandelay',
				'description' => __( 'Enter the Instagram URL here.', 'aurelielamy' ),
			)
		);
	}


	/**
	 * Socials callback function
	 *
	 * @return void
	 */
	public function socials_callback_function() : void {
		echo '';
	}


	/**
	 * Contacts callback function
	 *
	 * @return void
	 */
	public function contacts_callback_function() : void {
		echo '';
	}


	/**
	 * Dropdown pages callback function
	 *
	 * @param array $args Arguments.
	 *
	 * @see https://developer.wordpress.org/reference/functions/wp_dropdown_pages/
	 *
	 * @return void
	 */
	public function dropdown_pages_callback_function( array $args ) : void {
		wp_dropdown_pages(
			array(
				'selected' => get_option( $args['name'] ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'name'     => $args['name'], // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			)
		);

		if ( $args['description'] ) {
			echo wp_kses_post( '<p class="description">' . $args['description'] . '</p>' );
		}
	}


	/**
	 * Text callback function
	 *
	 * @param array $args Args.
	 *
	 * @return void
	 */
	public function text_callback_function( array $args ) : void {
		wp_form_controls_input(
			array(
				'name'        => $args['name'],
				'value'       => get_option( $args['name'] ),
				'placeholder' => $args['placeholder'],
				'description' => isset( $args['description'] ) && ! empty( $args['description'] ) ? $args['description'] : $args['placeholder'],
			),
		);
	}


	/**
	 * Email callback function
	 *
	 * @param array $args Args.
	 *
	 * @return void
	 */
	public function email_callback_function( $args ) : void {
		wp_form_controls_input(
			array(
				'type'        => 'email',
				'name'        => $args['name'],
				'value'       => get_option( $args['name'] ),
				'placeholder' => $args['placeholder'],
				'description' => $args['description'],
				'attributes'  => array(
					'pattern'      => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$',
					'autocomplete' => 'email',
					'aria-label'   => $args['label'],
				),
			)
		);
	}


	/**
	 * URL callback function
	 *
	 * @param array $args Args.
	 *
	 * @return void
	 */
	public function url_callback_function( $args ) : void {
		wp_form_controls_input(
			array(
				'type'        => 'url',
				'name'        => $args['name'],
				'value'       => get_option( $args['name'] ),
				'placeholder' => $args['placeholder'],
				'description' => $args['description'],
			)
		);
	}


	/**
	 * Textarea callback function
	 *
	 * @param array $args Arguments.
	 *
	 * @see https://core.trac.wordpress.org/browser/tags/5.6/src/wp-includes/post-template.php#L1163
	 * @return void
	 */
	public function textarea_callback_function( array $args ) : void {
		wp_form_controls_textarea( $args );
	}


	/**
	 * Register settings
	 *
	 * @see https://developer.wordpress.org/reference/functions/register_setting/
	 *
	 * @return void
	 */
	public function register_settings() : void {
		$args = array(
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => null,
		);

		foreach ( array( 'public_email', 'instagram', 'linkedin' ) as $setting ) {
			register_setting( 'general', $setting, $args );
		}
	}
}
