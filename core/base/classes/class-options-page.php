<?php
/**
 * ?FILE DESCRIPTION?
 *
 * @package fwb
 */

namespace fwb;

class Options_Page {
	use Singleton;

	public function init() {
		add_action( 'admin_menu', array( $this, 'add_to_menu' ) );
	}


	public function add_to_menu() {
		add_menu_page(
			esc_html__( 'Options', 'fwb' ),
			esc_html__( 'Options', 'fwb' ),
			'manage_options',
			'fwb-options-page',
			array( $this, 'get_options_page' )
		);
	}

	public function get_options_page( $controls = array(), $args = array() ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'fwb' ) );
		}

		fwb_get_admin_template( 'options', 'options-template' );
	}
}

Options_Page::get_instance();
