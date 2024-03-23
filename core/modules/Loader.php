<?php
/**
 * Core class responsible for initializing necessary classes.
 *
 * @package fwb
 */
namespace fwb\Modules;

use fwb\Base\Traits\Singleton;
use Elementor\Plugin;

/**
 * Initializing classes
 */
class Loader {

	use Singleton;

	/**
	 * Initializes Modules.
	 */
	public function init() {
		$this->modules_register();
	}

	private function modules_register() {
		if ( class_exists( 'Elementor\Plugin' ) ) {
			Plugin::instance()->widgets_manager->register( new MenusElementor\MenusElementor() );
			Plugin::instance()->widgets_manager->register( new Header\BurgerMenu() );
			Plugin::instance()->widgets_manager->register( new Header\HeaderToolbar() );
			Plugin::instance()->widgets_manager->register( new WcProducts\WcProducts() );
			Plugin::instance()->widgets_manager->register( new Banner\Banner() );
			Plugin::instance()->widgets_manager->register( new Categories\CategoryBanners() );
		}

		// Options
		// For Priority just change the init position
		\fwb\Modules\SiteStructures\SiteStructures::get_instance();
		\fwb\Modules\Sidebar\Sidebar::get_instance();
		\fwb\Modules\Performance\Performance::get_instance();
		\fwb\Modules\Colors\Colors::get_instance();
		\fwb\Modules\Snippets\Snippets::get_instance();
		\fwb\Modules\Header\Header::get_instance();
	}
}
