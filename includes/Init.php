<?php // phpcs:ignore
/**
 * Bootstraps WordPress theme related functions, most importantly enqueuing javascript and styles.
 *
 * @package    WordPress
 * @subpackage AurelieLamy
 */

namespace AurelieLamy;

/**
 * Init
 */
class Init {


	/**
	 * Store all the classes inside an array
	 *
	 * @return array Full list of classes
	 */
	public static function get_services(): array {
		return array(
			Setup\Enqueue::class,
			Setup\Settings::class,
			Setup\Theme::class,
			Setup\Twig::class,
			Setup\NavMenu::class,
			Setup\Supports::class,
			Setup\Textdomain::class,
			Setup\WordPress::class,
			Setup\QueryVars::class,
			Template\PostStates::class,
			PostTemplate\BodyClass::class,
			WPImageEditor::class,
			WPQuery::class,
			Media::class,
			Plugins\ACF\Fields\AboutPageFields::class,
			Plugins\ACF\Fields\AthletePostFields::class,
			Plugins\ACF\Fields\BlocksFields::class,
			Plugins\ACF\Fields\ContactPageFields::class,
			Plugins\ACF\Fields\FrontPageFields::class,
			Plugins\ACF\Fields\PodcastPostFields::class,
			Plugins\ACF\Fields\ProficiencyPageFields::class,
			Plugins\ACF\Fields\TalksPageFields::class,
			Post\Athlete::class,
			Post\Podcast::class,
		);
	}


	/**
	 * Loop through the classes, initialize them, and call the run() method if it exists
	 *
	 * @return void
	 */
	public static function run_services(): void {
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'run' ) ) {
				$service->run();
			}
		}
	}


	/**
	 * Initialize the class
	 *
	 * @param  string $class class name from the services array.
	 * @return object
	 */
	private static function instantiate( string $class ): object {
		return new $class();
	}
}
