<?php
namespace fwb\Modules\SiteStructures;

use fwb\Base\Traits\Singleton;
use fwb\Base\Classes\Options;
class SiteStructures extends Options {
	use Singleton;

	public function init() {
		parent::init();
		$this->add_sections_and_fields();
	}

	public function add_sections_and_fields() {
		$this->add_section(
			array(
				'section_id'          => __( 'site_structure_section', 'fwb' ),
				'section_title'       => __( 'Site structure selections', 'fwb' ),
				'section_description' => __( 'Here you can select your site structure, like footer, header from Elementor Blocks.', 'fwb' ),
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'header_selection',
				'field_title'  => __( 'Header template:', 'fwb' ),
				'section_id'   => 'site_structure_section',
				'control_type' => 'select_control',
				'options'      => ElementorBlocks::get_instance()->get_ids_with_names(),
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'footer_selection',
				'field_title'  => __( 'Footer template:', 'fwb' ),
				'section_id'   => 'site_structure_section',
				'control_type' => 'select_control',
				'options'      => ElementorBlocks::get_instance()->get_ids_with_names(),
			)
		);
	}
}

SiteStructures::get_instance();
