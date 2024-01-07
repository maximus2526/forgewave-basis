<?php
namespace fwb\Modules\Sidebar;

use fwb\Base\Traits\Singleton;
use fwb\Base\Classes\Options;

class Sidebar extends Options {
	use Singleton;

	public function init() {
		parent::init();
		$this->add_sections_and_fields();
	}

	public function add_sections_and_fields() {
		$this->add_section(
			array(
				'section_id'    => __( 'sidebar-section', 'fwb' ),
				'section_title' => __( 'Sidebar settings', 'fwb' ),
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'enable_sidebar',
				'field_title'  => __( 'Enable Sidebar:', 'fwb' ),
				'section_id'   => 'sidebar-section',
				'control_type' => 'switcher_control',
				'default'      => 1,
			)
		);

		$this->add_field(
			array(
				'field_id'       => 'sticky_sidebar',
				'field_title'    => __( 'Enable Sticky Sidebar:', 'fwb' ),
				'section_id'     => 'sidebar-section',
				'control_type'   => 'switcher_control',
				'default'        => false,
				'show_contition' => array( 'enable_sidebar' => true ),
			)
		);

		$this->add_field(
			array(
				'field_id'       => 'sidebar_bg_color',
				'field_title'    => __( 'Sidebar Background Color:', 'fwb' ),
				'section_id'     => 'sidebar-section',
				'control_type'   => 'color_picker_control',
				'default'        => '#FFFFFF',
				'show_contition' => array( 'enable_sidebar' => true ),
			)
		);

		$this->add_field(
			array(
				'field_id'       => 'sidebar_headers_color',
				'field_title'    => __( 'Sidebar Headers Color:', 'fwb' ),
				'section_id'     => 'sidebar-section',
				'control_type'   => 'color_picker_control',
				'default'        => '#1a1a1a',
				'show_contition' => array( 'enable_sidebar' => true ),
			)
		);
		$this->add_field(
			array(
				'field_id'       => 'sidebar_text_color',
				'field_title'    => __( 'Sidebar Text Color:', 'fwb' ),
				'section_id'     => 'sidebar-section',
				'control_type'   => 'color_picker_control',
				'default'        => '#333333',
				'show_contition' => array( 'enable_sidebar' => true ),
			)
		);

		$this->add_field(
			array(
				'field_id'       => 'sidebar_anchors_color',
				'field_title'    => __( 'Sidebar Anchors Color:', 'fwb' ),
				'section_id'     => 'sidebar-section',
				'control_type'   => 'color_picker_control',
				'default'        => '#0070c9',
				'show_contition' => array( 'enable_sidebar' => true ),
			)
		);
	}
}
