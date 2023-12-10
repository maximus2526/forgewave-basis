<?php
/**
 * Theme functions
 *
 * @package fwb
 */
// Theme constants

define( 'FWB_VERSION', '0.0.1' );

// Main project directory
define( 'FWB_DIR', __DIR__ );

// Theme directories
define( 'FWB_THEME', FWB_DIR );
define( 'FWB_ASSETS', FWB_DIR . '/assets' );
define( 'FWB_CORE', FWB_DIR . '/core' );
define( 'FWB_BASE', FWB_CORE . '/base' );
define( 'FWB_INTEGRATIONS', FWB_DIR . '/integrations' );
define( 'FWB_MODULES', FWB_DIR . '/modules' );
define( 'FWB_TRAITS', FWB_BASE . '/traits' );
define( 'FWB_COMPONENTS', FWB_BASE . '/components' );
define( 'FWB_DIR_CLASSES', FWB_BASE . '/classes' );


// Asset paths
define( 'FWB_FRONTEND_CSS_PATH', FWB_ASSETS . '/frontend/css' );
define( 'FWB_FRONTEND_JS_PATH', FWB_ASSETS . '/frontend/js' );
define( 'FWB_FRONTEND_IMG_PATH', FWB_ASSETS . '/frontend/img' );

define( 'FWB_ADMIN_CSS_PATH', FWB_ASSETS . '/admin/css' );
define( 'FWB_ADMIN_JS_PATH', FWB_ASSETS . '/admin/js' );
define( 'FWB_ADMIN_IMG_PATH', FWB_ASSETS . '/admin/img' );

// Asset URIs
define('FWB_FRONTEND_CSS_URI', get_template_directory_uri() . '/assets/frontend/css');
define('FWB_FRONTEND_JS_URI', get_template_directory_uri() . '/assets/frontend/js');
define('FWB_FRONTEND_IMG_URI', get_template_directory_uri() . '/assets/frontend/img');

define('FWB_ADMIN_CSS_URI', get_template_directory_uri() . '/assets/admin/css');
define('FWB_ADMIN_JS_URI', get_template_directory_uri() . '/assets/admin/js');
define('FWB_ADMIN_IMG_URI', get_template_directory_uri() . '/assets/admin/img');

require_once FWB_BASE . '/core.php';

// TOOLS

if ( ! function_exists( 'debug' ) ) {
	/**
	 * For displaying debug information.
	 *
	 * @param mixed $data The data.
	 */
	function debug( $data ) {
		echo '<pre>';
		print_r( $data );
		echo '</pre>';
		wp_die();
	}
}

if ( ! function_exists( 'fwb_get_php_file' ) ) {
	/**
	 * Include php file by path.
	 *
	 * @param mixed $data The data.
	 */
	function fwb_include_php_file( $path ) {
		$path .= '.php';
		if ( file_exists( $path ) ) {
			include_once $path;
		} else {
			echo $path . ' - file not found.'; 
			wp_die();
		}
	}
}
