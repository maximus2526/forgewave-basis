<?php
/**
 * Core class responsible for initializing necessary classes.
 *
 * @package fwb
 */
namespace fwb\Base;
use fwb\Base\Traits\Singleton;
use fwb\Base\Classes;
use fwb\core\Modules as Module;

/**
 * Initializing classes
 */
class Core {

	use Singleton;

	/**
	 * Initializes the Core class and hooks the 'initializing' method to the 'init' action.
	 */
	public function init() {
		// Base classes initialization
		$this->call_get_instance(Classes\EnqueueAssets::class);
		$this->call_get_instance(Classes\AddThemeSupport::class);
		$this->call_get_instance(Classes\Widgets::class);
		$this->call_get_instance(Classes\Options::class);
		$this->call_get_instance(Classes\OptionsPage::class);
		
		// With plugins
		add_action('init', array($this, 'initialize_instances'), 1);
	}


	public function initialize_instances() {
		// Include Something else
		// namespace\Loader::get_instance();

		// Including Base Classes
		$this->call_get_instance(Classes\ElementorBlocks::class); 

		// Including Modules
		\fwb\Modules\Loader::get_instance();
	}

  	/**
	 * Check get_instance and get_instance when exists
	 *
	 * @param string $class_name
	 */
	private function call_get_instance($class_name) {
		if (method_exists($class_name, 'get_instance')) {
			$class_name::get_instance();
		}
	}
}