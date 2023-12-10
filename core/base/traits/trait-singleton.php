<?php
/**
 * Singleton
 *
 * @package fwb
 */

namespace fwb;

trait Singleton {

	protected static $instance;

	protected function __construct() {
		static::set_instance( $this );
	}

	final public static function set_instance( $instance ) {
		static::$instance = $instance;
		return static::$instance;
	}

    final public static function get_instance() {
        $ready_instance = isset(static::$instance)
            ? static::$instance
            : static::$instance = new static();
    
        if (method_exists(static::$instance, 'init')) {
            static::$instance->init();
        }
    
        return $ready_instance;
    }    
}
