<?php
/**
 * Add Theme Support Class
 *
 * @package fwb
 */

namespace fwb\Base\Classes;

use fwb\Base\Traits\Singleton;

class AddThemeSupport {
	use Singleton;
	public function init() {
		add_action( 'init', array( $this, 'add_theme_support' ) );
		add_filter( 'style_loader_tag', array( $this, 'style_loader_tag_filter_preload' ), 10, 2 );
		add_action( 'after_setup_theme', array( $this, 'add_woocommerce_support' ) );
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
}
