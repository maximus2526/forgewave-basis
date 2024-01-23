<?php
/**
 * Enqueue_Assets class for handling styles and scripts enqueueing.
 *
 * @package fwb
 */
namespace fwb\Base\Classes;

use fwb\Base\Traits\Singleton;
class EnqueueAssets {
	use Singleton;

	/**
	 * Initializes the class and hooks methods to enqueue frontend styles and scripts.
	 */
	public function init() {
		add_action( 'init', array( $this, 'init_hooks' ) );
	}

	public function init_hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts' ) );

		// Add hooks for admin styles and scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

		// Add hook for common styles and scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_common_assets' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_common_assets' ) );
	}


	/**
	 * Enqueues frontend styles based on the provided filename.
	 */
	public function enqueue_frontend_styles() {
		if ( ! is_admin() ) {
			wp_enqueue_style( 'fwb-frontend-styles', FWB_FRONTEND_CSS_URI . '/frontend-styles.css', array(), FWB_VERSION );
		}
	}

	/**
	 * Enqueues frontend scripts based on the provided filename.
	 */
	public function enqueue_frontend_scripts() {
		if ( ! is_admin()) {
			wp_enqueue_script( 'fwb-frontend-scripts', FWB_FRONTEND_JS_URI . '/main.js', array( 'jquery' ), FWB_VERSION, true );
			wp_enqueue_script( 'fwb-frontend-sidebar', FWB_FRONTEND_JS_URI . '/elements/sidebar.js', array( 'jquery' ), FWB_VERSION, true );
			wp_enqueue_script( 'fwb-frontend-burger', FWB_FRONTEND_JS_URI . '/elements/burger.js', array( 'jquery' ), FWB_VERSION, true );
		}
	}

	/**
	 * Enqueues styles for the admin area.
	 */
	public function enqueue_admin_styles() {
		wp_enqueue_style( 'fwb-admin-styles', FWB_ADMIN_CSS_URI . '/admin-styles.css', array(), FWB_VERSION );
	}

	/**
	 * Enqueues scripts for the admin area.
	 */
	public function enqueue_admin_scripts() {
		wp_enqueue_script( 'fwb-admin-scripts', FWB_ADMIN_JS_URI . '/admin-scripts.js', array(), FWB_VERSION, true );
	}

	/**
	 * Enqueues common styles and scripts.
	 */
	public function enqueue_common_assets() {
		wp_enqueue_style( 'fwb-common-styles', FWB_COMMON_CSS_URI . '/common-styles.css', array(), FWB_VERSION );
		wp_enqueue_script( 'fwb-common-scripts', FWB_COMMON_JS_URI . '/common-scripts.js', array(), FWB_VERSION, true );
	}
}