<?php
/**
 * Helper functions and constants
 *
 * @package fwb
 */

namespace fwb;

// Helper Functions

if ( ! function_exists( 'fwb_enqueue_style' ) ) {
	/**
	 * Enqueue frontend stylesheets
	 *
	 * @param string $filename
	 */
	function fwb_enqueue_style( $filename ) {
		Enqueue_Assets::get_instance()->enqueue_frontend_styles( $filename );
	}
}

if ( ! function_exists( 'fwb_enqueue_script' ) ) {
	/**
	 * Enqueue frontend script
	 *
	 * @param string $filename
	 */
	function fwb_enqueue_script( $filename ) {
		Enqueue_Assets::get_instance()->fwb_enqueue_script( $filename );
	}
}



fwb_enqueue_style( 'style' );
