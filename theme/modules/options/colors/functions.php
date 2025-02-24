<?php

// Colors to :root

namespace fwb;

if ( ! function_exists( 'fwb_add_colors_to_root' ) ) {
	function fwb_add_colors_to_root() {
		// Main section
		$primary_color   = fwb_get_opt( 'fwb_primary_color' );
		$secondary_color = fwb_get_opt( 'fwb_secondary_color' );

		fwb_add_custom_css_variable( 'fwb-primary-color', $primary_color );
		fwb_add_custom_css_variable( 'fwb-secondary-color', $secondary_color );

		// Links colors
		$links_color       = fwb_get_opt( 'fwb_links_color' );
		$links_hover_color = fwb_get_opt( 'fwb_links_hover_color' );

		fwb_add_custom_css_variable( 'fwb-links-color', $links_color );
		fwb_add_custom_css_variable( 'fwb-links-hover-color', $links_hover_color );
	}

	add_action( 'fwb_custom_css', 'fwb\fwb_add_colors_to_root' );
}
