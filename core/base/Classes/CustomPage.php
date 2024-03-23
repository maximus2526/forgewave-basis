<?php
/**
 * Class for css/js customs.
 *
 * @package fwb
 */

 namespace fwb\Base\Classes;

 use fwb\Base\Traits\Singleton;

/**
 * Custom_Page class.
 */
class CustomPage {
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
			esc_html__( 'Custom JS/CSS', 'fwb' ),
			esc_html__( 'Custom JS/CSS', 'fwb' ),
			'manage_options',
			'fwb-custom-js-css',
			array( $this, 'get_options_page' ),
			'dashicons-media-code',
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
        \fwb\fwb_get_admin_template( 'custom-page', 'custom-page' );
    }
}
