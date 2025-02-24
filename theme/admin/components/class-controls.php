<?php
/**
 * Options Controls Class
 *
 * @package fwb
 */

namespace fwb\Theme\Components;

class Controls {

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

	public static function color_picker_control( $field_id, $value, $default ) {
		?>
		<div class="fwb-color-picker-control-wrapper">
			<input type="color" class="fwb-color-picker-control" name="<?php echo esc_attr( $field_id ); ?>" id="<?php echo esc_attr( $field_id ); ?>" value="<?php echo esc_attr( $value ); ?>"/>
			<button data-default="<?php echo $default ? esc_html( $default ) : ''; ?>" type="button" class="fwb-clear-color-button" data-target="<?php echo esc_attr( $field_id ); ?>">Clear Color</button>
		</div>
		<?php
	}


	public static function file_upload_control( $field_id, $value ) {
		echo '<input type="file" class="fwb-file-upload-control" name="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '" value="" />';
		if ( ! empty( $value ) ) {
			echo '<span>' . esc_html__( 'Current file: ', 'fwb' ) . esc_html( $value ) . '</span>';
		}
	}

	public static function number_control( $field_id, $value ) {
		echo '<input type="number" class="fwb-number-control" name="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $value ) . '" />';
	}

	public static function url_control( $field_id, $value ) {
		echo '<input type="url" class="fwb-url-control" name="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $value ) . '" />';
	}

	public static function switcher_control( $field_id, $value ) {
		$checked = ( $value === true || $value === '1' ) ? 'checked="checked"' : '';
		$value   = ( $value === true || $value === '1' ) ? ' value="1"' : '';

		echo '<label class="fwb-switcher-control">
			<input type="checkbox" name="' . esc_attr( $field_id ) . '" id="' . esc_attr( $field_id ) . '" value="1" ' . $checked . ' />
			<span class="fwb-switcher-slider"></span>
		</label>';
	}
}
