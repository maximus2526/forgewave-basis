<?php
namespace fwb\Modules\Colors;


use fwb\Base\Traits\Singleton;
use fwb\Base\Classes\Options;
class Colors extends Options {
	use Singleton;

	public function init() {
		parent::init();
		$this->add_sections_and_fields();
        $this->import_module_files();
	}

	public function import_module_files() {
		require_once 'OptionsHundling/function.php';
	}

	public function add_sections_and_fields() {
		$this->add_section(
			array(
				'tab_id'              => esc_html( 'colors_tab' ),
				'section_id'          => __( 'colors-section', 'fwb' ),
				'section_title'       => __( 'Main Colors', 'fwb' ),
			)
		);
	
		$this->add_field(
			array(
				'field_id'       => 'fwb_primary_color',
				'field_title'    => __( 'Primary color:', 'fwb' ),
				'section_id'     => 'colors-section',
				'control_type'   => 'color_picker_control',
				'default'        => '#3498db',
			)
		);

		$this->add_field(
			array(
				'field_id'       => 'fwb_secondary_color',
				'field_title'    => __( 'Secondary color:', 'fwb' ),
				'section_id'     => 'colors-section',
				'control_type'   => 'color_picker_control',
				'default'        => '#27ae60',
			)
		);

		$this->add_section(
			array(
				'tab_id'              => esc_html( 'colors_tab' ),
				'section_id'          => __( 'link-color-section', 'fwb' ),
				'section_title'       => __( 'Link Colors', 'fwb' ),
			)
		);

		$this->add_field(
			array(
				'field_id'       => 'fwb_links_color',
				'field_title'    => __( 'Links color:', 'fwb' ),
				'section_id'     => 'link-color-section',
				'control_type'   => 'color_picker_control',
				'default'        => '#2F4F4F',
			)
		);

		$this->add_field(
			array(
				'field_id'       => 'fwb_links_hover_color',
				'field_title'    => __( 'Links color on hover:', 'fwb' ),
				'section_id'     => 'link-color-section',
				'control_type'   => 'color_picker_control',
				'default'        => '#1e90ff',
			)
		);
	}
	
}
