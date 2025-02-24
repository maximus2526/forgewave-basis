<?php
/**
 * Theme functions
 *
 * @package fwb
 */

// Debug mode.

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

// Theme constants.
define( 'FWB_VERSION', '0.0.1' );

// Main project directory.
define( 'FWB_DIR', __DIR__ );

// Theme directories.
define( 'FWB_THEME', FWB_DIR . '/theme' );

// Theme initialization.

require_once FWB_THEME . '/class-singleton.php';
require_once FWB_THEME . '/helpers.php';
require_once FWB_THEME . '/class-core.php';


fwb\Theme\Core::get_instance();
