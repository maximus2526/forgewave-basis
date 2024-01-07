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
		add_action( 'widgets_init', array( $this, 'register_sidebars' ), 20  );
		add_action( 'widgets_init', array( $this, 'register_widgets' ), 20 );
	}

	/**
	 * Display Custom WooCommerce Sidebar
	 *
	 * This function checks if the current page is a WooCommerce-related page
	 * (shop, product, cart, checkout, or account page) and displays the 'woocommerce-sidebar'.
	 *
	 * @return void
	 */
	public function display_custom_wc_sidebar() {
		if ( is_shop() || is_product() || is_cart() || is_checkout() || is_account_page() ) {
			dynamic_sidebar( 'woocommerce-sidebar' );
		}
	}

	/**
	 * Register Sidebars.
	 *
	 * @return void
	 */
	public function register_sidebars() {
		$main_sidebar_args = array(
			'id'            => 'main-sidebar',
			'name'          => __( 'Sidebar', 'striped' ),
			'description'   => __( 'Left column', 'striped' ),
			'before_title'  => '<h4 class="fwb-widget-title">',
			'after_title'   => '</h4>',
			'before_widget' => '<div id="%1$s" class="fwb-widget %2$s">',
			'after_widget'  => '</div>',
		);
		
		register_sidebar( $main_sidebar_args );

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