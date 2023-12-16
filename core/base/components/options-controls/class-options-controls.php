<?php
/**
 * Options Controls Class
 *
 * @package fwb
 */

namespace fwb;

class Options_Controls {

	public function init() {
		add_action( 'admin_init', array( $this, 'add_settings_section' ) );
		add_action( 'admin_init', array( $this, 'add_settings_field' ) );
	}


	public static function text_control( $field_id, $value ) {
		echo '<input type="text" class="fwb-text-control" name="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $value ) . '" />';
	}

	public static function textarea_control( $field_id, $value ) {
		echo '<textarea class="fwb-textarea-control" name="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '">' . esc_textarea( $value ) . '</textarea>';
	}

	public static function checkbox_control( $field_id, $value ) {
		$checked = checked( $value, true, false );
		echo '<input type="checkbox" class="fwb-checkbox-control" name="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '" value="1" ' . $checked . ' />';
	}

	public static function radio_control( $field_id, $value, $options ) {
		foreach ( $options as $option_value => $option_label ) {
			$checked = checked( $value, $option_value, false );
			echo '<label><input type="radio" class="fwb-radio-control" name="' . esc_attr( $field_id ) . '" value="' . esc_attr( $option_value ) . '" ' . $checked . ' />' . esc_html( $option_label ) . '</label>';
		}
	}

	public static function select_control( $field_id, $value, $options ) {
		echo '<select class="fwb-select-control" name="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '">';
		foreach ( $options as $option_value => $option_label ) {
			$selected = selected( $value, $option_value, false );
			echo '<option value="' . esc_attr( $option_value ) . '" ' . $selected . '>' . esc_html( $option_label ) . '</option>';
		}
		echo '</select>';
	}

	public static function checkbox_list_control( $field_id, $value, $options ) {
		foreach ( $options as $option_value => $option_label ) {
			$checked = in_array( $option_value, (array) $value ) ? 'checked="checked"' : '';
			echo '<label><input type="checkbox" class="fwb-checkbox-list-control" name="' . esc_attr( $field_id ) . '[]" value="' . esc_attr( $option_value ) . '" ' . $checked . ' />' . esc_html( $option_label ) . '</label><br>';
		}
	}

	public static function color_picker_control( $field_id, $value ) {
		echo '<input type="text" class="fwb-color-picker-control" name="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $value ) . '" />';
	}

	public static function file_upload_control( $field_id, $value ) {
		echo '<input type="file" class="fwb-file-upload-control" name="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $value ) . '" />';
	}

	public static function number_control( $field_id, $value ) {
		echo '<input type="number" class="fwb-number-control" name="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $value ) . '" />';
	}

	public static function url_control( $field_id, $value ) {
		echo '<input type="url" class="fwb-url-control" name="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $value ) . '" />';
	}
}
