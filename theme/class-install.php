<?php
/**
 * Theme installation class.
 *
 * @package fwb
 */

namespace fwb\Theme;

use WC_Install;

/**
 * Class Theme Install
 *
 * Handles theme installation tasks such as creating pages and importing Elementor templates.
 */
class Theme_Install {
	use Singleton;

	/**
	 * Initialize theme installation hooks.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'after_switch_theme', array( $this, 'setup_theme' ) );
	}

	/**
	 * Set up the theme by creating pages and importing Elementor templates.
	 *
	 * @return void
	 */
	public function setup_theme() {
		$this->import_pages();
		$this->import_elementor_blocks();
		$this->import_woocommerce_pages();
	}

	/**
	 * Import pages from the 'pages' directory.
	 *
	 * @return void
	 */
	private function import_pages() {
		$files = array(
			'home'       => 'home.json',
			'about-us'   => 'about-us.json',
			'contact-us' => 'contact-us.json',
		);

		foreach ( $files as $slug => $file ) {
			$file_path = FWB_ASSETS . "/content/main/pages/$file";
			if ( file_exists( $file_path ) ) {
				$json = file_get_contents( $file_path );
				$data = json_decode( $json, true );
				if ( ! empty( $data ) && ! get_page_by_path( $slug ) ) {
					$page_id = wp_insert_post(
						array(
							'post_title'   => $data['title'] ?? ucfirst( $slug ),
							'post_name'    => $slug,
							'post_content' => $data['content'] ?? '',
							'post_status'  => 'publish',
							'post_type'    => 'page',
						)
					);

					if ( $page_id && ! is_wp_error( $page_id ) && isset( $data['template'] ) ) {
						update_post_meta( $page_id, '_wp_page_template', $data['template'] );
					}

					if ( $slug === 'home' ) {
						update_option( 'page_on_front', $page_id );
						update_option( 'show_on_front', 'page' );
					}
				}
			}
		}
	}

	/**
	 * Import Elementor blocks from the 'elementor-blocks' directory.
	 *
	 * @return void
	 */
	private function import_elementor_blocks() {
		$files = array(
			'header' => 'header.json',
			'footer' => 'footer.json',
		);

		foreach ( $files as $key => $file ) {
			$file_path = FWB_ASSETS . "/content/main/elementor-blocks/$file";

			if ( file_exists( $file_path ) ) {
				$json = file_get_contents( $file_path );
				$data = json_decode( $json, true );

				if ( ! empty( $data ) ) {
					$block_id = wp_insert_post(
						array(
							'post_title'   => ucfirst( $key ),
							'post_content' => $json,
							'post_status'  => 'publish',
							'post_type'    => 'elementor-blocks',
						)
					);

					if ( $block_id && ! is_wp_error( $block_id ) ) {

						update_post_meta( $block_id, '_elementor_data', $json );
					}
				}
			}
		}
	}

	/**
	 * Import WooCommerce default pages.
	 *
	 * @return void
	 */
	private function import_woocommerce_pages() {
		if ( class_exists( 'WooCommerce' ) ) {
			WC_Install::create_pages();
		}
	}
}
