<?php
/**
 * Class for managing options page in the WordPress admin.
 *
 * @package fwb
 */

namespace fwb\Theme\Admin;

use fwb\Theme\Singleton;

/**
 * Options_Page class.
 */
class OptionsPage {
	use Singleton;

	/**
	 * Initializes the options page.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'admin_menu', array( $this, 'add_to_menu' ) );
	}

	/**
	 * Adds options page to the WordPress admin menu.
	 *
	 * @return void
	 */
	public function add_to_menu() {
		add_menu_page(
			esc_html__( 'Options', 'fwb' ),
			esc_html__( 'Options', 'fwb' ),
			'manage_options',
			'fwb-options-page',
			array( $this, 'get_options_page' ),
			'dashicons-admin-generic',
			2
		);
	}

	/**
	 * Callback function to display the options page content.
	 *
	 * @param array $controls Optional array of controls for the options page.
	 * @param array $args     Optional array of arguments for the options page.
	 *
	 * @return void
	 */
	public function get_options_page( $controls = array(), $args = array() ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'fwb' ) );
		}
		wp_enqueue_script( 'fwb-admin-page-tabs', FWB_ADMIN_JS_URI . '/admin-page-tabs.js', array(), FWB_VERSION, true );
		fwb_get_admin_template( 'options', 'options-template' );
	}
}
