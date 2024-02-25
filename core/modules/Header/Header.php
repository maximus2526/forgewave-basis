<?php
namespace fwb\Modules\Header;

use fwb\Base\Traits\Singleton;
use fwb\Base\Classes\Options;
class Header extends Options {
	use Singleton;

	public function init() {
		parent::init();
		$this->add_sections_and_fields();
		add_action( 'init', array( $this, 'register_metaboxes' ), 20 );
	}

	public function register_metaboxes() {
		new \fwb\Modules\Header\DisablePageTitle\DisablePageTitle();
	}

	public function add_sections_and_fields() {
		$this->add_section(
			array(
				'tab_id'              => esc_html( 'layout_tab' ),
				'section_id'          => __( 'header-section', 'fwb' ),
				'section_title'       => __( 'Header Section', 'fwb' ),
				'section_description' => __( 'Header configurations.', 'fwb' ),
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'header_content_width',
				'field_title'  => __( 'Header content width:', 'fwb' ),
				'section_id'   => 'header-section',
				'control_type' => 'select_control',
				'default'      => 'header_content_full',
				'options'      => array(
					'header_content_boxed' => 'Boxed',
					'header_content_full'  => 'Full sized',
				),
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'header_top_indent',
				'field_title'  => __( 'Header top indent:', 'fwb' ),
				'section_id'   => 'header-section',
				'control_type' => 'text_control',
				'default'      => '20',
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'header_bottom_indent',
				'field_title'  => __( 'Header bottom indent:', 'fwb' ),
				'section_id'   => 'header-section',
				'control_type' => 'text_control',
				'default'      => '80',
			)
		);

		$this->add_field(
			array(
				'field_id'     => 'sticky_header',
				'field_title'  => __( 'Sticky header enabled:', 'fwb' ),
				'section_id'   => 'header-section',
				'control_type' => 'switcher_control',
				'default'      => false,
			)
		);
	}
}
