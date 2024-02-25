<?php
namespace fwb\Base\Classes;

use fwb\Base\Traits\Singleton;
class Widgets {

	use Singleton;

	/**
	 * __construct
	 *
	 * @return void
	 */


	/**
	 * Hooks init.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'widgets_init', array( $this, 'register_sidebars' ), 20 );
		add_action( 'widgets_init', array( $this, 'register_widgets' ), 20 );
		add_action( 'init', array( $this, 'wc_sidebar' ), 20 );
	}

	/**
	 * Register Sidebars.
	 *
	 * @return void
	 */
	public function register_sidebars() {
		$woocommerce_sidebar_args = array(
			'id'            => 'woocommerce-sidebar',
			'name'          => __( 'Woocommerce sidebar', 'striped' ),
			'description'   => __( 'Left column', 'striped' ),
			'before_title'  => '<h4 class="fwb-widget-title">',
			'after_title'   => '</h4>',
			'before_widget' => '<div id="%1$s" class="fwb-widget %2$s">',
			'after_widget'  => '</div>',
		);

		register_sidebar( $woocommerce_sidebar_args );

		$main_sidebar_args = array(
			'id'            => 'main-sidebar',
			'name'          => __( 'Main Sidebar', 'striped' ),
			'description'   => __( 'Left column', 'striped' ),
			'before_title'  => '<h4 class="fwb-widget-title">',
			'after_title'   => '</h4>',
			'before_widget' => '<div id="%1$s" class="fwb-widget %2$s">',
			'after_widget'  => '</div>',
		);

		register_sidebar( $main_sidebar_args );
	}

	public function wc_sidebar() {
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10); 
		add_action( 'woocommerce_sidebar', array( $this, 'custom_woocommerce_sidebar' ) );
	}
	
	public function custom_woocommerce_sidebar() {	
        get_sidebar(); 
	}

	/**
	 * Register Widgets.
	 *
	 * @return void
	 */
	public function register_widgets() {
		register_widget( '\fwb\Modules\TestWidgets\TestWidgets' );
	}
}
