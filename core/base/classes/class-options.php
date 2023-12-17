<?php
/**
 * ?FILE DESCRIPTION?
 *
 * @package fwb
 */

namespace fwb;

class Options {
	static $sections = array();
	static $fields   = array();

	public function init() {
		add_action( 'admin_init', array( $this, 'add_settings_section' ), 10 );
		add_action( 'admin_init', array( $this, 'add_settings_field' ), 10 );
	}

	public function add_section( $args ) {
		if ( ! in_array( $args['section_id'], self::$sections, true ) ) {
			self::$sections[] = array( $args['section_id'], $args['section_title'] );
		}
	}

	public function add_settings_section() {
		foreach ( self::$sections as $section ) {
			add_settings_section(
				$section[0],
				$section[1],
				array( $this, 'add_section_callback' ),
				'fwb-options-page'
			);
		}
	}

	public function add_section_callback() {
		echo 'This text, mb description!';
	}

	public function add_field( $args ) {

		$fields_params = array( $args['field_id'], $args['field_title'], $args['section_id'], $args['control_type'] );
		if ( isset( $args['options'] ) ) {
			$fields_params[] = $args['options'];
		}
		self::$fields[] = $fields_params;

		register_setting( 'fwb-options-page', $args['field_id'] );
	}


	public function add_settings_field() {
		foreach ( self::$fields as $field ) {
			$field_title = isset( $field[1] ) ? $field[1] : 'Field title';
			$field_args  = array(
				'field_id'     => $field[0],
				'control_type' => $field[3],
			);

			if ( isset( $field[4] ) ) {
				$field_args['options'] = $field[4];

			}

			add_settings_field(
				$field[0],
				$field_title,
				array( $this, 'render_control' ),
				'fwb-options-page',
				$field[2],
				$field_args
			);
		}
	}

	public function render_control( $args ) {

		$field_id     = $args['field_id'];
		$control_type = $args['control_type'];
		$value        = get_option( $field_id );
		require_once FWB_BASE . '/components/options-controls/class-options-controls.php';

		if ( isset( $args['options'] ) ) {
			Options_Controls::$control_type( $field_id, $value, $args['options'] );
		} else {
			Options_Controls::$control_type( $field_id, $value );
		}
	}
}

