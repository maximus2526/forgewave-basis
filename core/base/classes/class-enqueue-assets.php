<?php
/**
 * Enqueue_Assets class for handling styles and scripts enqueueing.
 *
 * @package fwb
 */
namespace fwb;

class Enqueue_Assets {
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
	}

	/**
	 * Enqueues frontend styles based on the provided filename.
	 *
	 * @param string $filename The name of the style file (without extension).
	 */
	public function enqueue_frontend_styles( $filename ) {
		if ( $filename ) {
			wp_enqueue_style( 'fwb-frontend-styles', FWB_FRONTEND_CSS_URI . '/' . $filename . '.css', array(), FWB_VERSION );
		}
	}

	/**
	 * Enqueues frontend scripts based on the provided filename.
	 *
	 * @param string $filename The name of the script file (without extension).
	 */
	public function enqueue_frontend_scripts( $filename, $deps = array() ) {
		if ( $filename ) {
			wp_enqueue_script( 'fwb-frontend-scripts', FWB_FRONTEND_JS_URI . '/' . $filename . '.js', $deps, FWB_VERSION, true );
		}
	}
}

Enqueue_Assets::get_instance();
