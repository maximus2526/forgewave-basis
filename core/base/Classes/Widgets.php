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
public function __construct() {
	add_action( 'init', array( $this, 'hooks_init' ) );
}


/**
 * Hooks init.
 *
 * @return void
 */
public function hooks_init() {
	add_action( 'init', array( $this, 'register_sidebars' )  );
	add_action( 'init', array( $this, 'register_widgets' ) );
	add_action( 'init', array( $this, 'unregister_default_widgets' ));
}


/**
 * Register Sidebars.
 *
 * @return void
 */
public function register_sidebars() {
	$args = array(
		'id'            => 'main-sidebar',
		'name'          => __( 'Сайдбар', 'striped' ),
		'description'   => __( 'Левая колонка', 'striped' ),
		'class'         => 'striped-widget',
		'before_title'  => '<header><h2 class="widgettitle">',
		'after_title'   => '</h2></header>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	);
	
	register_sidebar( $args );
}

	/**
	 * Register Widgets.
	 *
	 * @return void
	 */
	public function register_widgets() {
		Widgets::get_instance()->register_widgets();
		register_widget( '\fwb\Modules\TestWidgets\TestWidgets' );
	}

	/**
	 * Unregister Widgets.
	 *
	 * @return void
	 */
	public function unregister_default_widgets() {
		unregister_widget( 'WP_Widget_Archives' );
		unregister_widget( 'WP_Widget_Calendar' );
		unregister_widget( 'WP_Widget_Categories' );
		unregister_widget( 'WP_Widget_Meta' );
		unregister_widget( 'WP_Widget_Pages' );
		unregister_widget( 'WP_Widget_Recent_Comments' );
		unregister_widget( 'WP_Widget_Recent_Posts' );
		unregister_widget( 'WP_Widget_RSS' );
		unregister_widget( 'WP_Widget_Search' );
		unregister_widget( 'WP_Widget_Tag_Cloud' );
		unregister_widget( 'WP_Widget_Text' );
		unregister_widget( 'WP_Nav_Menu_Widget' );
	}
}