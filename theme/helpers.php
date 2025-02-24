<?php
/**
 * Theme functions
 *
 * @package fwb
 */

define( 'FWB_ASSETS', FWB_DIR . '/assets' );
define( 'FWB_INTEGRATIONS', FWB_THEME . '/integrations' );
define( 'FWB_MODULES', FWB_THEME . '/modules' );
define( 'FWB_ADMIN_TEMPLATES_DIR', FWB_THEME . '/admin/components/templates' );

// Assets paths.
define( 'FWB_FRONTEND_CSS_PATH', FWB_ASSETS . '/frontend/css' );
define( 'FWB_FRONTEND_JS_PATH', FWB_ASSETS . '/frontend/js' );
define( 'FWB_FRONTEND_IMG_PATH', FWB_ASSETS . '/frontend/img' );

define( 'FWB_ADMIN_CSS_PATH', FWB_ASSETS . '/admin/css' );
define( 'FWB_ADMIN_JS_PATH', FWB_ASSETS . '/admin/js' );
define( 'FWB_ADMIN_IMG_PATH', FWB_ASSETS . '/admin/img' );

// Assets URIs.

define( 'FWB_FRONTEND_CSS_URI', get_template_directory_uri() . '/assets/frontend/css' );
define( 'FWB_FRONTEND_JS_URI', get_template_directory_uri() . '/assets/frontend/js' );

define( 'FWB_ADMIN_CSS_URI', get_template_directory_uri() . '/assets/admin/css' );
define( 'FWB_ADMIN_JS_URI', get_template_directory_uri() . '/assets/admin/js' );

define( 'FWB_COMMON_CSS_URI', get_template_directory_uri() . '/assets/common/css' );
define( 'FWB_COMMON_JS_URI', get_template_directory_uri() . '/assets/common/js' );

// Image constants.

define( 'FWB_IMG_URI', get_template_directory_uri() . '/assets/images/' );
define( 'FWB_NO_IMG', get_template_directory_uri() . '/assets/images/no-image-placeholder.png' );

// TOOLS.

if ( ! function_exists( 'debug' ) ) {
	/**
	 * For displaying debug information.
	 *
	 * @param mixed $data The data.
	 */
	function debug( $data ) {
		echo '<pre>';
		print_r( $data );
		echo '</pre>';
		wp_die();
	}
}

if ( ! function_exists( 'fwb_get_php_file' ) ) {
	/**
	 * Include php file by path.
	 *
	 * @param mixed $data The data.
	 */
	function fwb_include_php_file( $path ) {
		$path .= '.php';
		if ( file_exists( $path ) ) {
			include_once $path;
		} else {
			echo $path . ' - file not found.'; // phpcs:ignore.
			wp_die();
		}
	}
}

if ( ! function_exists( 'fwb_get_admin_template' ) ) {
	/**
	 * Get admin template
	 *
	 * @param string $folder_name The folder name.
	 * @param string $filename    The file name.
	 */
	function fwb_get_admin_template( $folder_name, $filename ) {
		if ( ! $folder_name && ! $filename ) {
			return;
		}

		if ( file_exists( FWB_ADMIN_TEMPLATES_DIR . '/' . $folder_name . '/' . $filename . '.php' ) ) {
			include FWB_ADMIN_TEMPLATES_DIR . '/' . $folder_name . '/' . $filename . '.php';
		}
	}
}

if ( ! function_exists( 'fwb_get_opt' ) ) {
	/**
	 * Retrieve the option value by option key.
	 *
	 * @param string $option_key The key of the option to retrieve.
	 * @param mixed  $default    Optional. Default value to return if the option does not exist.
	 *
	 * @return mixed The value of the option.
	 */
	function fwb_get_opt( $option_key, $default = false ) { // phpcs:ignore.
		return get_option( $option_key, $default );
	}
}



if ( ! function_exists( 'fwb_get_elementor_block_by_id' ) ) {
	/**
	 * Get Elementor page content by ID.
	 *
	 * @param int $post_id Page ID.
	 * @return string Page content if edited with Elementor, empty string otherwise.
	 */
	function fwb_get_elementor_block_by_id( $post_id, $wrapper_class = '' ) {
		$content = '';
		ob_start();
		if ( fwb_is_elementor_installed() ) {
			$elementor = \Elementor\Plugin::instance();
			$document  = $elementor->documents->get_doc_for_frontend( $post_id );
			if ( $document && $document->is_built_with_elementor() ) {
				?>
				<div class="fwn-elementor-wrap <?php echo esc_attr( $wrapper_class ); ?>">
				<?php
					echo $elementor->frontend->get_builder_content( $post_id ); // phpcs:ignore
				?>
				</div>
				<?php
			}
			$content = ob_get_clean();
		}

		return $content;
	}
}

if ( ! function_exists( 'fwb_add_custom_css_variable' ) ) {
	/**
	 * Adds a CSS variable to the :root element.
	 *
	 * This function adds a new CSS variable to the :root element.
	 *
	 * @param string $variable_name  The name of the CSS variable.
	 * @param string $variable_value The value of the CSS variable.
	 */
	function fwb_add_custom_css_variable( $variable_name, $variable_value ) {
		echo '<style>';
		echo ":root { --$variable_name: $variable_value; }"; // phpcs:ignore.
		echo '</style>';
	}
}

if ( ! function_exists( 'fwb_is_elementor_installed' ) ) {
	/**
	 * Check if Elementor is installed and activated.
	 *
	 * @return bool True if Elementor is installed and activated, false otherwise.
	 */
	function fwb_is_elementor_installed() {
		return class_exists( '\Elementor\Plugin' );
	}
}

if ( ! function_exists( 'fwb_is_wc_installed' ) ) {
	/**
	 * Check if WooCommerce is installed and activated.
	 *
	 * @return bool True if WooCommerce is installed and activated, false otherwise.
	 */
	function fwb_is_wc_installed() {
		return class_exists( 'WooCommerce' );
	}
}
