<?php // phpcs:ignore
/**
 * Init
 *
 * @package    WordPress
 * @subpackage AurelieLamy/Plugins/ACF/Admin
 */

namespace AurelieLamy\Plugins\ACF\Admin;

use Timber\Timber;

/**
 * Init
 */
class Init {

	/**
	 * Runs initialization tasks.
	 *
	 * @return void
	 */
	public function run() {
		add_action( 'acf/init', array( $this, 'add_options_theme' ) );

		add_action( 'wp_ajax_load_more_motivations', array( $this, 'load_more_motivations' ) );
		add_action( 'wp_ajax_nopriv_load_more_motivations', array( $this, 'load_more_motivations' ) );
	}

	/**
	 * Add options pages
	 */
	public function add_options_theme() {
	}

	/**
	 * Load More Motivations
	 */
	public function load_more_motivations() {
		if ( ! isset( $_GET['nonce'] ) && ! wp_verify_nonce( sanitize_key( $_GET['nonce'] ), 'security' ) ) {
			return false;
		}

		if ( ! isset( $_GET['postId'] ) ) {
			return;
		}

		$post_id              = (int) $_GET['postId']; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$offset               = (int) $_GET['offset'] ?? 0; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$motivations_per_page = (int) $_GET['motivationsPerPage'] ?? 5; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

		$items = get_field( 'motivations', $post_id )['list'];

		$context          = Timber::get_context();
		$context['items'] = array_slice( $items, (int) $offset, $motivations_per_page );

		$html = wp_json_encode( Timber::compile( 'components/collection-motivation.html.twig', $context ) );

		wp_send_json(
			array(
				'html'       => $html,
				'foundPosts' => count( $items ),
			)
		);

		wp_die();
	}
}
