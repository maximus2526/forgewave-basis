<?php
/**
 * Add Theme Support Class
 *
 * @package fwb
 */

namespace fwb;

class Add_Theme_Support {
	use Singleton;

	public function init() {
		add_action( 'init', array( $this, 'add_theme_support' ) );
		add_action( 'widgets_init', array( $this, 'register_widgets' ) );
	}


	public function add_theme_support() {
		// Add theme support for automatic feed links
		add_theme_support( 'automatic-feed-links' );

		// Add theme support for post thumbnails
		add_theme_support( 'post-thumbnails' );

		// Add theme support for custom logo
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 400,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
}

// Initialize the class
Add_Theme_Support::get_instance();
