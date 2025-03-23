<?php

if ( ! function_exists( 'fwb_register_elementor_cats' ) ) {
	function fwb_register_elementor_cats( $elements_manager ) {
		$elements_manager->add_category(
			'fwb-general',
			array(
				'title' => esc_html__( 'FWB General', 'fwb' ),
				'icon'  => 'fa fa-plug',
			)
		);
	}
	add_action( 'elementor/elements/categories_registered', 'fwb_register_elementor_cats' );
}
