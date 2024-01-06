<?php
/**
 * Core class responsible for initializing necessary classes.
 *
 * @package fwb
 */
namespace fwb\Modules;

use fwb\Base\Traits\Singleton;

/**
 * Initializing classes
 */
class Loader {

	use Singleton;

	/**
	 * Initializes Modules.
	 */
	public function init() {
		$this->include_modules();
	}

	private function include_modules() {
        $modules_dir = __DIR__ . '/';
        $module_files = glob($modules_dir . '*.php');

        foreach ($module_files as $module_file) {
            if (is_file($module_file)) {
                require_once $module_file;
            }
        }
    }
}