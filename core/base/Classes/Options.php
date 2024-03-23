<?php
/**
 * Class for managing options in the WordPress admin.
 *
 * @package fwb
 */

namespace fwb\Base\Classes;

use fwb\Base\Components\OptionsControls;

/**
 * Options class.
 */
class Options {
	static $sections = array();
	static $fields   = array();

	/**
	 * Initializes the options.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'admin_init', array( $this, 'add_settings_section' ), 10 );
		add_action( 'admin_init', array( $this, 'add_settings_field' ), 10 );
	}

	/**
	 * Adds a section for settings.
	 *
	 * @param array $args Arguments for the section.
	 *
	 * @return void
	 */
	public function add_section( $args ) {
		if ( ! in_array( $args['section_id'], self::$sections, true ) ) {
			self::$sections[] = $args;
		}
	}

	/**
	 * Adds settings sections to the WordPress admin.
	 *
	 * @return void
	 */
	public function add_settings_section() {
		foreach ( self::$sections as $section ) {
			add_settings_section(
				$section['section_id'],
				'',
				function () use ( $section ) {
					$this->add_section_callback( $section );
				},
				isset( $section['page'] ) ? $section['page'] : 'fwb-options-page',
				array( 
					'before_section' => '<div id="'. $section['tab_id']. '_' . $section['section_id'] .'" class="fwb-section fwb-col-auto xts-col-t-6 xts-col-m-12">',
					'after_section' => '</div>',
				)
			);	
		}
	}

	/**
	 * Callback function for settings section.
	 *
	 * @param array $section Section information.
	 * @return void
	 */
	public function add_section_callback( $section ) {
		?>
		<div class="fwb-section-header">
			<h2 class="fwb-title" <?php echo isset( $section['section_description'] ) ? "data-tooltip='" . esc_html__( $section['section_description'], 'fwb' ) . "'" : '' ?> >
				<?php echo esc_html( $section['section_title'] ); ?>
			</h2>
		</div>
		<?php
	}

	/**
	 * Adds a field to the settings.
	 *
	 * @param array $args Arguments for the field.
	 *
	 * @return void
	 */
	public function add_field( $args ) {
		$fields_params = array(
			$args['field_id'],
			$args['field_title'],
			$args['section_id'],
			isset( $args['control_type'] ) ? $args['control_type'] : '',
			isset( $args['options'] ) ? $args['options'] : '',
			isset( $args['show_condition'] ) ? $args['show_condition'] : '',
			isset( $args['default'] ) ? $args['default'] : '',
		);

		foreach( self::$sections as $section ) { 
			register_setting( isset( $section['page'] ) ? $section['page'] : 'fwb-options-page', $args['field_id'] );
		}

		self::$fields[] = $fields_params;
	}

	/**
	 * Adds settings fields to the WordPress admin.
	 *
	 * @return void
	 */
	public function add_settings_field() {
		foreach ( self::$fields as $field ) {
			$field_title = isset( $field[1] ) ? $field[1] : 'Field title';
			$field_args  = array(
				'field_id'     => $field[0],
				'control_type' => $field[3],
				'default'      => isset( $field[6] ) ? $field[6] : '',
			);

			if ( isset( $field[4] ) ) {
				$field_args['options'] = $field[4];
			}

			$condition_met = true; // Assume the condition is met by default

			if ( isset( $field[5] ) && is_array( $field[5] ) ) {
				foreach ( $field[5] as $show_condition_field => $show_condition_value ) {
					$show_condition_value_option = get_option( $show_condition_field );

					if ( $show_condition_value_option != $show_condition_value ) {
						$condition_met = false;
					}
				}
			}

			// Check if the condition is met before adding the field
			if ( $condition_met ) {
				foreach( self::$sections as $section ) { 
					add_settings_field(
						$field[0],
						$field_title,
						array( $this, 'render_control' ),
						isset( $section['page'] ) ? $section['page'] : 'fwb-options-page',
						$field[2],
						$field_args
					);
				}
			}
		}
	}

	/**
	 * Renders the control for the settings field.
	 *
	 * @param array $args Arguments for the field.
	 *
	 * @return void
	 */
	public function render_control( $args ) {
		$field_id     = $args['field_id'];
		$control_type = $args['control_type'];
		$value        = get_option( $field_id );
		$default      = $args['default'];

		if ( ! empty( $args['default'] ) && empty( $value ) ) {
			$value = $default;
		}

		$show_condition = isset( $args['show_condition'] ) ? $args['show_condition'] : array();
		$condition_met  = true; // Assume the condition is met by default

		// Check show_condition
		if ( ! empty( $show_condition ) && is_array( $show_condition ) ) {
			foreach ( $show_condition as $show_condition_field => $show_condition_value ) {
				$show_condition_value_option = get_option( $show_condition_field );
				if ( $show_condition_value_option != $show_condition_value ) {
					$condition_met = false;
					break; // Break out of the loop since the condition is not met
				}
			}
		}

		// Render the control only if the condition is met
		if ( $condition_met ) {
			if ( ! empty( $args['options'] ) ) {
				OptionsControls\OptionsControls::$control_type( $field_id, $value, $args['options'], $default );
			} else {
				OptionsControls\OptionsControls::$control_type( $field_id, $value, $default );
			}
		}
	}
}
