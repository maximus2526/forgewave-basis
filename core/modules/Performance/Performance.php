<?php
namespace fwb\Modules\Performance;


use fwb\Base\Traits\Singleton;
use fwb\Base\Classes\Options;
class Performance extends Options {
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
				'section_id'          => __( 'performance-section', 'fwb' ),
				'section_title'       => __( 'Performance Section', 'fwb' ),
				'section_description' => __( 'Performance improvement.', 'fwb' ),
			)
		);

		$this->add_field(
			array(
				'field_id'       => 'fwb_gutenberg_disabled',
				'field_title'    => __( 'Disable Gutenberg:', 'fwb' ),
				'section_id'     => 'performance-section',
				'control_type'   => 'switcher_control',
				'default'        => false,
			)
		);
	}
}
