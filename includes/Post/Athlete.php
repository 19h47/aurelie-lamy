<?php // phpcs:ignore
/**
 * Class Athlete
 *
 * PHP version 7.4.1
 *
 * @author     Jérémy Levron <jeremylevron@19h47.fr> (https://19h47.fr)
 * @package    WordPress
 * @subpackage AurelieLamy
 */

namespace AurelieLamy\Post;

use WP_Post;

/**
 * Athlete class
 *
 * @file   inc/Post/Athlete.php
 * @author Jérémy Levron <jeremylevron@19h47.fr> (https://19h47.fr)
 */
class Athlete {



	/**
	 * Runs initialization tasks.
	 *
	 * @access public
	 */
	public function run() {
		add_action( 'init', array( $this, 'register' ), 10, 0 );
		add_action( 'admin_head', array( $this, 'css' ) );
		add_action( 'manage_athlete_posts_custom_column', array( $this, 'render_custom_columns' ), 10, 2 );

		add_filter( 'post_updated_messages', array( $this, 'updated_messages' ), 10, 1 );
		add_filter( 'bulk_post_updated_messages', array( $this, 'bulk_updated_messages' ), 10, 2 );
		add_filter( 'manage_athlete_posts_columns', array( $this, 'add_custom_columns' ) );
	}


	/**
	 * CSS
	 *
	 * @return bool
	 */
	public function css(): bool {
		global $typenow;

		if ( 'athlete' !== $typenow ) {
			return false;
		}

		?>
		<style>
			.fixed .column-thumbnail {
				vertical-align: top;
				width: 80px;
			}

			.column-thumbnail a, .column-thumbnail div {
				background-color: #EBEBEB;
				display: block;
				width: 80px;
				height: 80px;
			}
			.column-thumbnail a img {
				display: inline-block;
				vertical-align: middle;
				width: 100%;
				height: 100%;
				object-fit: cover;
				object-position: center;
			}
		</style>
		<?php

		return true;
	}


	/**
	 * Add custom columns
	 *
	 * @param  array $columns Array of columns.
	 * @return array $new_columns
	 * @link   https://developer.wordpress.org/reference/hooks/manage_post_type_posts_columns/
	 */
	public function add_custom_columns( array $columns ): array {
		$new_columns = array();

		unset( $columns['date'] );

		foreach ( $columns as $key => $value ) {
			if ( 'title' === $key ) {
				$new_columns['thumbnail'] = __( 'Thumbnail', 'aurelielamy' );
			}

			$new_columns[ $key ] = $value;
		}
		return $new_columns;
	}


	/**
	 * Render custom columns
	 *
	 * @param string $column_name The column name.
	 * @param int    $post_id     The ID of the post.
	 * @link  https://developer.wordpress.org/reference/hooks/manage_post-post_type_posts_custom_column/
	 *
	 * @return void
	 */
	public function render_custom_columns( string $column_name, int $post_id ): void {
		switch ( $column_name ) {
			case 'thumbnail':
				$thumbnail = get_the_post_thumbnail( $post_id, 'medium' );
				$html      = '—';

				if ( $thumbnail ) {
					$html  = '<a href="' . esc_attr( get_edit_post_link( $post_id ) ) . '">';
					$html .= $thumbnail;
					$html .= '</a>';
				} else {
					$html = '<div></div>';
				}

				echo wp_kses_post( $html );
				break;
		}
	}


	/**
	 * Updated messages
	 *
	 * @param  array $messages Post updated messages. For defaults see $messages declarations above.
	 * @return array $message
	 * @link   https://developer.wordpress.org/reference/hooks/post_updated_messages/
	 * @access public
	 */
	public function updated_messages( array $messages ): array {
		global $post;

		$post_ID     = isset( $post_ID ) ? (int) $post_ID : 0;
		$preview_url = get_preview_post_link( $post );

		/* translators: Publish box date format, see https://secure.php.net/date */
		$scheduled_date = date_i18n( __( 'M j, Y @ H:i' ), strtotime( $post->post_date ) );

		$view_link_html = sprintf(
			' <a href="%1$s">%2$s</a>',
			esc_url( get_permalink( $post_ID ) ),
			__( 'View Athlete', 'aurelielamy' )
		);

		$scheduled_link_html = sprintf(
			' <a target="_blank" href="%1$s">%2$s</a>',
			esc_url( get_permalink( $post_ID ) ),
			__( 'Preview Athlete', 'aurelielamy' )
		);

		$preview_link_html = sprintf(
			' <a target="_blank" href="%1$s">%2$s</a>',
			esc_url( $preview_url ),
			__( 'Preview Athlete', 'aurelielamy' )
		);

		$messages['athlete'] = array(
			0 => '', // Unused. Messages start at index 1.
			1 => __( 'Athlete updated.', 'aurelielamy' ) . $view_link_html,
			2 => __( 'Custom field updated.', 'aurelielamy' ),
			3 => __( 'Custom field deleted.', 'aurelielamy' ),
			4 => __( 'Athlete updated.', 'aurelielamy' ),
			/* translators: %s: date and time of the revision */
      5  => isset( $_GET['revision'] ) ? sprintf( __( 'Athlete restored to revision from %s.', 'aurelielamy' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore
		6     => __( 'Athlete published.', 'aurelielamy' ) . $view_link_html,
		7     => __( 'Athlete saved.', 'aurelielamy' ),
		8     => __( 'Athlete submitted.', 'aurelielamy' ) . $preview_link_html,
      9  => sprintf( __( 'Athlete scheduled for: %s.', 'aurelielamy' ), '<strong>' . $scheduled_date . '</strong>' ) . $scheduled_link_html, // phpcs:ignore
		10    => __( 'Athlete draft updated.', 'aurelielamy' ) . $preview_link_html,
		);

		return $messages;
	}


	/**
	 * Bulk updated messages
	 *
	 * @param array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
	 * @param array $bulk_counts   Array of item counts for each message, used to build internationalized strings.
	 *
	 * @see https://developer.wordpress.org/reference/hooks/bulk_post_updated_messages/
	 *
	 * @return array $bulk_counts
	 */
	public function bulk_updated_messages( array $bulk_messages, array $bulk_counts ): array {
		$bulk_messages['athlete'] = array(
			/* translators: %s: Number of athletes. */
			'updated'   => _n( '%s athlete updated.', '%s athletes updated.', $bulk_counts['updated'], 'aurelielamy' ),
			'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 athlete not updated, somebody is editing it.', 'aurelielamy' ) :
			/* translators: %s: Number of athletes. */
			_n( '%s athlete not updated, somebody is editing it.', '%s athletes not updated, somebody is editing them.', $bulk_counts['locked'], 'aurelielamy' ),
			/* translators: %s: Number of athletes. */
			'deleted'   => _n( '%s athlete permanently deleted.', '%s athletes permanently deleted.', $bulk_counts['deleted'], 'aurelielamy' ),
			/* translators: %s: Number of athletes. */
			'trashed'   => _n( '%s athlete moved to the Trash.', '%s athletes moved to the Trash.', $bulk_counts['trashed'], 'aurelielamy' ),
			/* translators: %s: Number of athletes. */
			'untrashed' => _n( '%s athlete restored from the Trash.', '%s athletes restored from the Trash.', $bulk_counts['untrashed'], 'aurelielamy' ),
		);

		return $bulk_messages;
	}


	/**
	 * Register Custom Post Type
	 *
	 * @return void
	 * @access public
	 */
	public function register(): void {
		$labels = array(
			'name'                     => _x( 'Athletes', 'athlete type generale name', 'aurelielamy' ),
			'singular_name'            => _x( 'Athlete', 'athlete type singular name', 'aurelielamy' ),
			'add_new'                  => _x( 'Add New', 'athlete type', 'aurelielamy' ),
			'add_new_item'             => __( 'Add New Athlete', 'aurelielamy' ),
			'edit_item'                => __( 'Edit Athlete', 'aurelielamy' ),
			'new_item'                 => __( 'New Athlete', 'aurelielamy' ),
			'view_items'               => __( 'View Athletes', 'aurelielamy' ),
			'view_item'                => __( 'View Athlete', 'aurelielamy' ),
			'search_items'             => __( 'Search Athletes', 'aurelielamy' ),
			'not_found'                => __( 'No Athletes found.', 'aurelielamy' ),
			'not_found_in_trash'       => __( 'No Athletes found in Trash.', 'aurelielamy' ),
			'parent_item_colon'        => __( 'Parent Athlete:', 'aurelielamy' ),
			'all_items'                => __( 'All Athletes', 'aurelielamy' ),
			'archives'                 => __( 'Athlete Archives', 'aurelielamy' ),
			'attributes'               => __( 'Athlete Attributes', 'aurelielamy' ),
			'insert_into_item'         => __( 'Insert into athlete', 'aurelielamy' ),
			'uploaded_to_this_item'    => __( 'Uploaded to this athlete', 'aurelielamy' ),
			'featured_image'           => _x( 'Featured Image', 'athlete', 'aurelielamy' ),
			'set_featured_image'       => _x( 'Set featured image', 'athlete', 'aurelielamy' ),
			'remove_featured_image'    => _x( 'Remove featured image', 'athlete', 'aurelielamy' ),
			'use_featured_image'       => _x( 'Use as featured image', 'athlete', 'aurelielamy' ),
			'items_list_navigation'    => __( 'Athletes list navigation', 'aurelielamy' ),
			'items_list'               => __( 'Athletes list', 'aurelielamy' ),
			'item_published'           => __( 'Athlete published.', 'aurelielamy' ),
			'item_published_privately' => __( 'Athlete published privately.', 'aurelielamy' ),
			'item_reverted_to_draft'   => __( 'Athlete reverted to draft.', 'aurelielamy' ),
			'item_scheduled'           => __( 'Athlete scheduled.', 'aurelielamy' ),
			'item_updated'             => __( 'Athlete updated.', 'aurelielamy' ),
		);

		$rewrite = array(
			'with_front' => false,
		);

		$args = array(
			'label'               => __( 'Athlete', 'aurelielamy' ),
			'description'         => __( 'Athlete Description', 'aurelielamy' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail' ),
			'taxonomies'          => array(),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-groups',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'rewrite'             => $rewrite,
		);

		register_post_type( 'athlete', $args );
	}
}
