<?php // phpcs:ignore
/**
 * Themes
 *
 * @package    WordPress
 * @subpackage AurelieLamy/Setup/Theme
 */

namespace AurelieLamy\Setup;

use Timber\{ Timber, Site };
use Twig\Extra\Html\{ HtmlExtension };
use Twig\Extra\Intl\{ IntlExtension };
use Twig\{ TwigFunction };
use AurelieLamy\Models\{ PodcastPost };

use WP_Post;

Timber::init();
Timber::$dirname = array( 'views', 'templates', 'dist' );

/**
 * Theme
 */
class Theme extends Site {


	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function run(): void {
		add_filter( 'timber/context', array( $this, 'add_socials_to_context' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/context', array( $this, 'add_to_theme' ) );
		add_filter( 'timber/post/classmap', array( $this, 'add_post_classmap' ) );
	}


	/**
	 * Add to theme
	 *
	 * @param array $context Timber context.
	 */
	public function add_to_theme( array $context ): array {
		$manifest = get_theme_manifest();

		$context['theme']->manifest = array();

		foreach ( $manifest as $label => $path ) {
			$context['theme']->manifest[ $label ] = get_template_directory_uri() . '/' . $path;
		}

		return $context;
	}


	/**
	 * Add socials to context
	 *
	 * @param  array $context Timber context.
	 * @return array
	 */
	public function add_socials_to_context( array $context ): array {
		// Share and Socials links.
		$socials = array(
			array(
				'title' => 'LinkedIn',
				'slug'  => 'linkedin',
				'name'  => __( 'Share on LinkedIn', 'aurelielamy' ),
				'link'  => 'https://www.linkedin.com/sharing/share-offsite/?url=',
				'url'   => get_option( 'linkedin' ),
				'color' => '#0077b5',
			),
			array(
				'title' => __( 'Instagram', 'aurelielamy' ),
				'slug'  => 'instagram',
				'url'   => get_option( 'instagram' ),
			),
		);

		foreach ( $socials as $social ) {
			if ( ! empty( $social['url'] ) ) {
				$context['socials'][ $social['slug'] ] = $social;
			}

			if ( ! empty( $social['link'] ) ) {
				$context['shares'][ $social['slug'] ] = $social;
			}
		}

		return $context;
	}


	/**
	 * Add to context
	 *
	 * @param array $context Timber context.
	 *
	 * @return array
	 * @since  1.0.0
	 */
	public function add_to_context( array $context ): array {
		global $wp;

		$context['current_url']  = home_url( add_query_arg( array(), $wp->request ) );
		$context['public_email'] = get_option( 'public_email' );

		$context['privacy_policy_url'] = get_privacy_policy_url();

		return $context;
	}

	/**
	 * Add post classmap
	 *
	 * @param array $classmap Classmap.
	 *
	 * @return array
	 */
	public function add_post_classmap( $classmap ): array {
		$custom_classmap = array(
			'podcast' => PodcastPost::class,
		);

		return array_merge( $classmap, $custom_classmap );
	}
}
