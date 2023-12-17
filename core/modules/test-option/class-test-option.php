<?php
namespace fwb;

class ExtendedOptions extends Options {
	use Singleton;

	public function init() {
		parent::init();
		$this->add_sections_and_fields();
	}

	public function add_sections_and_fields() {
		$this->add_section(
			array(
				'section_id'    => 'section1',
				'section_title' => 'Section 1',
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'field1_1',
				'field_title'  => 'Field 1.1',
				'section_id'   => 'section1',
				'control_type' => 'text_control', // Use the correct control type method name
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'field1_60',
				'field_title'  => 'Field 1.2',
				'section_id'   => 'section1',
				'control_type' => 'text_control', // Use the correct control type method name
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'field1_2',
				'field_title'  => 'Field 1.2',
				'section_id'   => 'section1',
				'control_type' => 'textarea_control', // Use the correct control type method name
			)
		);

		$this->add_section(
			array(
				'section_id'    => 'section2',
				'section_title' => 'Section 2',
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'field2_1',
				'field_title'  => 'Field 2.1',
				'section_id'   => 'section2',
				'control_type' => 'checkbox_control', // Use the correct control type method name
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'field2_4',
				'field_title'  => 'Field 2.1',
				'section_id'   => 'section2',
				'control_type' => 'color_picker_control', // Use the correct control type method name
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'field2_2',
				'field_title'  => 'Field 2.2',
				'section_id'   => 'section2',
				'control_type' => 'select_control',
				'options'      => array(
					'value1' => 'Option 1',
					'value2' => 'Option 2',
				),
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'field2_2',
				'field_title'  => 'Field 2.2',
				'section_id'   => 'section2',
				'control_type' => 'radio_control',
				'options'      => array(
					'value1' => 'Option 1',
					'value2' => 'Option 2',
				),
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'field2_12',
				'field_title'  => 'Field 2.5',
				'section_id'   => 'section2',
				'control_type' => 'radio_control',
				'options'      => array(
					'value1' => 'Option 3',
					'value2' => 'Option 2',
				),
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'field2_8',
				'field_title'  => 'Field 2.2',
				'section_id'   => 'section2',
				'control_type' => 'file_upload_control',

			)
		);
	}
}

ExtendedOptions::get_instance();
