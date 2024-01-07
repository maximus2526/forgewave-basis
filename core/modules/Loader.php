<?php
/**
 * Core class responsible for initializing necessary classes.
 *
 * @package fwb
 */
namespace fwb\Modules;

use fwb\Base\Traits\Singleton;
use \Elementor;


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
        Elementor\Plugin::instance()->widgets_manager->register( new MenusElementor\MenusElementor() );
        Elementor\Plugin::instance()->widgets_manager->register( new TestElementor\TestElementor() );
        \fwb\Modules\SiteStructures\SiteStructures::get_instance();
        \fwb\Modules\Sidebar\Sidebar::get_instance();
        \fwb\Modules\Performance\Performance::get_instance();
    }
}