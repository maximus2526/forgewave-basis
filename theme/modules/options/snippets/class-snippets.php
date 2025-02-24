<?php
namespace fwb\Modules;

use fwb\Theme\Singleton;
use fwb\Theme\Extends\Options;

class Snippets extends Options {
	use Singleton;

	public function init() {
		parent::init();
		$this->add_sections_and_fields();
	}

	public function add_sections_and_fields() {
		$this->add_section(
			array(
				'tab_id'        => esc_html( 'css_tab' ),
				'section_id'    => __( 'css-section', 'fwb' ),
				'section_title' => __( 'Custom CSS', 'fwb' ),
				'page'          => esc_html( 'fwb-custom-js-css' ),
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'fwb_custom_css',
				'field_title'  => __( 'CSS frontend:', 'fwb' ),
				'section_id'   => 'css-section',
				'control_type' => 'textarea_control',
			)
		);

		$this->add_section(
			array(
				'tab_id'        => esc_html( 'js_tab' ),
				'section_id'    => __( 'js-section', 'fwb' ),
				'section_title' => __( 'Custom JS', 'fwb' ),
				'page'          => esc_html( 'fwb-custom-js-css' ),
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'fwb_custom_js',
				'field_title'  => __( 'JS frontend:', 'fwb' ),
				'section_id'   => 'js-section',
				'control_type' => 'textarea_control',
			)
		);
	}
}

Snippets::get_instance();
