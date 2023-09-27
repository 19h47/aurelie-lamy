<?php // phpcs:ignore
/**
 * Project Post
 *
 * @package    WordPress
 * @subpackage AurelieLamy
 */

namespace AurelieLamy\Models;

use Timber\{ Post };

/**
 * Class Podcast Post
 */
class PodcastPost extends Post {

	/**
	 * Length
	 *
	 * @return array
	 */
	public function audio_metadata(): array {
		$file = $this->meta( 'file' );

		if ( $file ) {
			return wp_get_attachment_metadata( $file['id'] );
		}

		return array();
	}
}
