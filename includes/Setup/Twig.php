<?php // phpcs:ignore
/**
 * Twig
 *
 * @package WordPress
 * @subpackage AurelieLamy/Setup/Theme
 */

namespace AurelieLamy\Setup;

use Twig\Extra\Html\{ HtmlExtension };
use Twig\Extra\Intl\{ IntlExtension };
use Twig\{ TwigFunction };

/**
 * Twig
 */
class Twig {

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function run() : void {
		add_filter( 'timber/twig', array( $this, 'add_functions' ) );
		add_filter( 'timber/twig', array( $this, 'add_extensions' ) );
		add_filter( 'timber/twig/environment/options', array( $this, 'set_environment_options' ), 10, 1 );
	}


	/**
	 * Set options
	 *
	 * @param array $options Array of options.
	 *
	 * @return array $options
	 */
	public function set_environment_options( array $options ) : array {
		$options['cache']       = WP_DEBUG ? false : true;
		$options['auto_reload'] = WP_DEBUG;

		return $options;
	}


	/**
	 * Add extensions
	 *
	 * @param object $twig Twig environment.
	 *
	 * @access public
	 *
	 * @return object $twig
	 */
	public function add_extensions( object $twig ) : object {
		$twig->addExtension( new HtmlExtension() );
		$twig->addExtension( new IntlExtension() );

		return $twig;
	}


	/**
	 * Add functions
	 *
	 * @param object $twig Twig environment.
	 *
	 * @access public
	 *
	 * @return object $twig
	 */
	public function add_functions( object $twig ) : object {
		$twig->addFunction(
			new TwigFunction(
				'html_class',
				function ( $args = '' ) {
					return html_class( $args );
				}
			)
		);

		$twig->addFunction(
			new TwigFunction(
				'body_class',
				function ( $args = '' ) {
					return body_class( $args );
				}
			)
		);

		$twig->addFunction(
			new TwigFunction(
				'set_product_global',
				function( $post ) {
					return set_product_global( $post );
				}
			)
		);

		if ( function_exists( 'sanitize_title' ) ) {
			$twig->addFunction(
				new TwigFunction(
					'sanitize_title',
					function ( string $title, string $fallback_title = '', string $context = 'save' ) : string {
						return sanitize_title( $title, $fallback_title, $context );
					}
				)
			);
		}

		if ( function_exists( 'get_extended' ) ) {
			$twig->addFunction(
				new TwigFunction(
					'get_extended',
					function( $content ) {
						return get_extended( $content );
					}
				)
			);
		}

		if ( function_exists( 'wp_get_document_title' ) ) {
			$twig->addFunction(
				new TwigFunction(
					'wp_get_document_title',
					function() {
						return wp_get_document_title();
					}
				)
			);
		}

		$twig->addFunction(
			new TwigFunction(
				'get_post_meta',
				function( int $post_id, string $key = '', bool $single = false ) {
					return get_post_meta( $post_id, $key, $single );
				}
			)
		);

		$twig->addFunction( new TwigFunction( 'uniqid', 'uniqid' ) );

		$twig->addFunction(
			new TwigFunction(
				'icon',
				function( $icon, $args = array() ) {
					return get_theme_icon( $icon, $args );
				}
			)
		);

		if ( function_exists( 'yoast_breadcrumb' ) ) {
			$twig->addFunction(
				new TwigFunction(
					'yoast_breadcrumb',
					function( $before = '', $after = '', $display = true ) {
						return yoast_breadcrumb( $before, $after, $display );
					}
				)
			);
		}

		if ( function_exists( 'pll_the_languages' ) ) {
			$twig->addFunction(
				new TwigFunction(
					'pll_the_languages',
					function( array $args = array( 'raw' => 1 ) ) {
						return pll_the_languages( $args );
					}
				)
			);
		}

		return $twig;
	}
}
