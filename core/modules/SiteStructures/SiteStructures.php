<?php
namespace fwb\Modules\SiteStructures;

use fwb\Base\Traits\Singleton;
use fwb\Base\Classes\Options;
// use Elementor\Plugin;

class SiteStructures extends Options {
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
		// $elementor_kit = Plugin::$instance->kits_manager->get_active_kit();
		// $settings = $elementor_kit->get_settings_for_display();
		// // var_dump($settings);
		// $settings['container_max_width']['size'] = 300;
		// $settings['container_max_width']['unit'] = 'px';
		
		// $elementor_kit->update_settings($settings);
		
		// $container_width_after_update = $elementor_kit->get_settings_for_display('container_max_width');
		// // var_dump($container_width_after_update);
		

		$this->add_section(
			array(
				'tab_id'              => esc_html( 'layout_tab' ),
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
				'options'      => \fwb\Base\Classes\ElementorBlocks::get_instance()->get_ids_with_names(),
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'mobile_header_selection',
				'field_title'  => __( 'Mobile Header template:', 'fwb' ),
				'section_id'   => 'site_structure_section',
				'control_type' => 'select_control',
				'options'      => \fwb\Base\Classes\ElementorBlocks::get_instance()->get_ids_with_names(),
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'footer_selection',
				'field_title'  => __( 'Footer template:', 'fwb' ),
				'section_id'   => 'site_structure_section',
				'control_type' => 'select_control',
				'options'      => \fwb\Base\Classes\ElementorBlocks::get_instance()->get_ids_with_names(),
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'site_content_width3',
				'field_title'  => __( 'Content width:', 'fwb' ),
				'section_id'   => 'site_structure_section',
				'control_type' => 'text_control',
				// 'default'      => $container_width_after_update['size'],
				'default'      => '300',
			)
		);

	}
}
