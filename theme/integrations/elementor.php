<?php

if ( ! function_exists( 'fwb_register_elementor_cats' ) ) {
	/**
	 * Register custom Elementor categories.
	 *
	 * @param \Elementor\Elements_Manager $elements_manager Elementor elements manager.
	 */
	function fwb_register_elementor_cats( $elements_manager ) {
		$elements_manager->add_category(
			'fwb-general',
			array(
				'title' => esc_html__( 'FWB General', 'fwb' ),
				'icon'  => 'fa fa-plug',
			),
			1
		);
	}
	add_action( 'elementor/elements/categories_registered', 'fwb_register_elementor_cats' );
}
