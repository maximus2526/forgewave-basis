<?php
/**
 * Elementor Custom Menu Widget Class
 *
 * @package fwb
 */

namespace fwb\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Class Custom_Menu_Widget
 */
class MenusElementor extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'fwb-custom-menu-widget';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Custom Menu Widget', 'fwb' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-menu-card';
	}

	/**
	 * Retrieve the widget categories.
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'fwb-general' );
	}

	/**
	 * Register widget controls.
	 *
	 * @return void
	 */
	protected function _register_controls() {
		// Content Section
		$this->start_controls_section(
			'section_content',
			array(
				'label' => esc_html__( 'Content', 'fwb' ),
			)
		);

		// Menu ID Control
		$this->add_control(
			'menu_id',
			array(
				'label'   => esc_html__( 'Menu ID', 'fwb' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '',
			)
		);

		// Text Color Control
		$this->add_control(
			'menu_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'fwb' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .fwb-menu a' => 'color: {{VALUE}};',
				),
			)
		);

		// Hover Text Color Control
		$this->add_control(
			'menu_text_hover_color',
			array(
				'label'     => esc_html__( 'Text Hover Color', 'fwb' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .fwb-menu a:hover' => 'color: {{VALUE}};',
				),
			)
		);

		// Hover Text Color Control
		$this->add_control(
			'menu_hover_color',
			array(
				'label'     => esc_html__( 'Hover Background Color', 'fwb' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .fwb-menu a:hover' => 'background: {{VALUE}};',
				),
			)
		);

		// Orientation Control (Vertical or Horizontal)
		$this->add_control(
			'menu_orientation',
			array(
				'label'   => esc_html__( 'Menu Orientation', 'fwb' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => array(
					'vertical'   => array(
						'title' => esc_html__( 'Vertical', 'fwb' ),
						'icon'  => 'eicon-v-align-top',
					),
					'horizontal' => array(
						'title' => esc_html__( 'Horizontal', 'fwb' ),
						'icon'  => 'eicon-h-align-left',
					),
				),
				'default' => 'horizontal',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$menu_orientation = $settings['menu_orientation'];

		$menu_classes = 'fwb-menu';

		if ( 'vertical' === $menu_orientation ) {
			$menu_classes .= ' fwb-vertical-menu';
		} elseif ( 'horizontal' === $menu_orientation ) {
			$menu_classes .= ' fwb-horizontal-menu';
		}

		if ( ! empty( $settings['menu_id'] ) ) {
			echo '<div class="' . esc_attr( $menu_classes ) . '">';
			wp_nav_menu(
				array(
					'menu' => $settings['menu_id'],
					// 'menu_class' => 'fwb-menu',
				)
			);
			echo '</div>';
		}
	}
}
