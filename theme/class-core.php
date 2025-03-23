<?php
/**
 * Core class responsible for initializing necessary classes.
 *
 * @package fwb
 */

namespace fwb\Theme;

use fwb\Theme\Singleton;
use fwb\Theme\Assets;
use fwb\Theme\Theme_Install;
use fwb\Theme\Extends\Options;
use fwb\Theme\Admin\Elementor_Blocks;
use fwb\Theme\Admin\OptionsPage;
use fwb\Theme\Admin\ImportPage;
use fwb\Theme\Admin\SnippetsPage;

/**
 * Initializing classes
 */
class Core {

	use Singleton;

	/**
	 * Initializes the Core class and hooks the 'initializing' method to the 'init' action.
	 */
	public function init() {
		$this->includes();

		// Install starter content.
		$this->call_get_instance( Theme_Install::class );

		add_action( 'init', array( $this, 'include_modules' ) );

		// Base classes initialization.
		$this->call_get_instance( Assets::class );
		$this->call_get_instance( Options::class );
		$this->call_get_instance( Elementor_Blocks::class );

		// Admin pages.
		$this->call_get_instance( OptionsPage::class );
		$this->call_get_instance( ImportPage::class );
		$this->call_get_instance( SnippetsPage::class );

		// Add theme support.
		add_action( 'init', array( $this, 'add_theme_support' ) );
		add_filter( 'style_loader_tag', array( $this, 'style_loader_tag_filter_preload' ), 10, 2 );
		add_action( 'after_setup_theme', array( $this, 'add_woocommerce_support' ) );

		// Register sidebars.
		add_action( 'widgets_init', array( $this, 'register_sidebars' ), 20 );
		add_action( 'init', array( $this, 'wc_sidebar' ), 20 );
	}

	/**
	 * Include necessary files.
	 */
	public function includes() {
		require_once FWB_THEME . '/class-install.php';
		require_once FWB_THEME . '/class-assets.php';
		require_once FWB_THEME . '/admin/components/class-controls.php';
		require_once FWB_THEME . '/extends/class-options.php';
		require_once FWB_THEME . '/admin/class-elementor-blocks.php';
		require_once FWB_THEME . '/admin/class-options-page.php';
		require_once FWB_THEME . '/admin/class-import-page.php';
		require_once FWB_THEME . '/admin/class-snippets-page.php';

		// Including Integrations.
		require_once FWB_THEME . '/integrations/woocommerce.php';
		require_once FWB_THEME . '/integrations/elementor.php';
	}

	/**
	 * For preload css.
	 *
	 * @param  string $html   HTML.
	 * @param  string $handle Handle.
	 * @return string
	 */
	public function style_loader_tag_filter_preload( $html, $handle ) {
		if ( 'font-handle' === $handle ) {
			$new_html = str_replace( 'text/css', 'font/woff2', $html );
			return str_replace( "rel='stylesheet'", "rel='preload' as='font' crossorigin='anonymous'", $new_html );
		}
		return $html;
	}

	public function include_modules() {
		// Including Options.
		require_once FWB_MODULES . '/options/colors/class-colors.php';
		require_once FWB_MODULES . '/options/header/class-header.php';
		require_once FWB_MODULES . '/options/performance/class-performance.php';
		require_once FWB_MODULES . '/options/sidebar/class-sidebar.php';
		require_once FWB_MODULES . '/options/site-structures/class-site-structures.php';
		require_once FWB_MODULES . '/options/snippets/class-snippets.php';

		// Including Widgets.
		require_once FWB_MODULES . '/widgets/banner/class-banner.php';
		require_once FWB_MODULES . '/widgets/burger-menu/class-burger-menu.php';
		require_once FWB_MODULES . '/widgets/category-banners/class-category-banners.php';
		require_once FWB_MODULES . '/widgets/header-toolbar/class-header-toolbar.php';
		require_once FWB_MODULES . '/widgets/menu/class-menu.php';
		require_once FWB_MODULES . '/widgets/products/class-products.php';
	}

	/**
	 * Check get_instance and get_instance when exists
	 *
	 * @param string $class_name Class name.
	 */
	private function call_get_instance( $class_name ) {
		if ( method_exists( $class_name, 'get_instance' ) ) {
			// Note: if class will be extended - don't need actions, else: get_instance().
			$class_name::get_instance();
		}
	}

	public function add_theme_support() {
		add_theme_support( 'widgets' );
		add_theme_support( 'widgets-block-editor' );
		add_theme_support( 'menus' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'elementor' );
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 400,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'header-footer-elementor' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
	}

	/**
	 * Add_woocommerce_support.
	 *
	 * @return void
	 */
	public function add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
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
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
		add_action( 'woocommerce_sidebar', array( $this, 'custom_woocommerce_sidebar' ) );
	}

	public function custom_woocommerce_sidebar() {
		get_sidebar();
	}
}
