<?php
/**
 * Core class responsible for initializing and importing necessary files and classes.
 *
 * @package fwb
 */
namespace fwb;

/**
 * Import files and classes
 */
class Core {
    /**
     * Initializes the Core class and hooks the 'imports' method to the 'init' action.
     */
    public function init() {
        add_action( 'init', array( $this, 'imports' ) );
    }

    /**
     * Calls various methods to import traits, base classes, and helper functions.
     */
    public function imports() {
        $this->import_traits();
        $this->base_imports();
        $this->import_helpers();
    }

    /**
     * Imports the Singleton trait.
     */
    private function import_traits() {
        require_once FWB_TRAITS . '/trait-singleton.php';
    }

    /**
     * Imports helper functions.
     */
    private function import_helpers() {
        require_once 'helpers.php';
    }

    /**
     * Imports base classes required for the application.
     */
    private function base_imports() {
        $base_classes = array(
            'enqueue-assets',
            'elementor-widgets',
            'options',
            'modules',
            'wp-widgets',
        );
        foreach ( $base_classes as $base_class ) {
            require_once FWB_DIR_CLASSES . '/class-' . $base_class . '.php';
        }
    }
}

/**
 * Instance of the Core class to kickstart the initialization process.
 *
 * @var Core
 */
$core = new Core();
$core->init();
