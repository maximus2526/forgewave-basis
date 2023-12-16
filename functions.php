<?php
/**
 * Theme functions
 *
 * @package fwb
 */
namespace fwb;

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
define( 'FWB_MODULES', FWB_CORE . '/modules' );
define( 'FWB_TRAITS', FWB_BASE . '/traits' );
define( 'FWB_COMPONENTS', FWB_BASE . '/components' );
define( 'FWB_DIR_CLASSES', FWB_BASE . '/classes' );


// Templates
define( 'FWB_ADMIN_TEMPLATES_DIR', FWB_BASE . '/templates' );

// Asset paths
define( 'FWB_FRONTEND_CSS_PATH', FWB_ASSETS . '/frontend/css' );
define( 'FWB_FRONTEND_JS_PATH', FWB_ASSETS . '/frontend/js' );
define( 'FWB_FRONTEND_IMG_PATH', FWB_ASSETS . '/frontend/img' );

define( 'FWB_ADMIN_CSS_PATH', FWB_ASSETS . '/admin/css' );
define( 'FWB_ADMIN_JS_PATH', FWB_ASSETS . '/admin/js' );
define( 'FWB_ADMIN_IMG_PATH', FWB_ASSETS . '/admin/img' );

// Asset URIs
define( 'FWB_FRONTEND_CSS_URI', get_template_directory_uri() . '/assets/frontend/css' );
define( 'FWB_FRONTEND_JS_URI', get_template_directory_uri() . '/assets/frontend/js' );
define( 'FWB_FRONTEND_IMG_URI', get_template_directory_uri() . '/assets/frontend/img' );

define( 'FWB_ADMIN_CSS_URI', get_template_directory_uri() . '/assets/admin/css' );
define( 'FWB_ADMIN_JS_URI', get_template_directory_uri() . '/assets/admin/js' );
define( 'FWB_ADMIN_IMG_URI', get_template_directory_uri() . '/assets/admin/img' );

define( 'FWB_COMMON_ASSETS', get_template_directory_uri() . '/assets/common' );

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

if ( ! function_exists( 'fwb_get_admin_template' ) ) {
	/**
	 * Get admin template
	 *
	 * @param string $folder_name
	 * @param string $filename
	 * @param array  $args
	 */
	function fwb_get_admin_template( $folder_name, $filename, $args = array() ) {
		if ( ! $folder_name && ! $filename ) {
			return;
		}

		if ( file_exists( FWB_ADMIN_TEMPLATES_DIR . '/' . $folder_name . '/' . $filename . '.php' ) ) {
			include FWB_ADMIN_TEMPLATES_DIR . '/' . $folder_name . '/' . $filename . '.php';
		}
	}
}