<?php
// After
namespace fwb;

// DONT WORK
class Widgets_Manager {

	use Singleton;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'widgets_init', array( $this, 'register_widgets' ) );
	}

	/**
	 * Register Widgets.
	 *
	 * @return void
	 */
	public function register_widgets() {
		register_widget( 'fwb\Simple_Widget' );
	}
}
