<?php
/**
 * Custom Elementor Widget for Banner Banners
 */
namespace fwb\Widgets;

use Elementor\Widget_Base;

class Banner extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'banner_widget';
	}

	/**
	 * Get widget title.
	 *
	 * @return string
	 */
	public function get_title() {
		return __( 'Banner Widget', 'fwb' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-banner';
	}

	/**
	 * Get widget categories.
	 *
	 * @return array
	 */
	public function get_categories() {
		return array( 'fwb-general' );
	}
	/**
	 * Register controls for the widget.
	 *
	 * @return void
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Banner Settings', 'fwb' ),
			)
		);

		// Banner height

		$this->add_control(
			'banner_height',
			array(
				'label'      => __( 'Banner Height', 'fwb' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', 'vh' ),
				'range'      => array(
					'px' => array(
						'min' => 0,
						'max' => 1000,
					),
					'em' => array(
						'min' => 0,
						'max' => 50,
					),
					'vh' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
					'size' => 300,
				),
				'selectors'  => array(
					'{{WRAPPER}} .fwb-banner' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);

		// Background control.
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'     => 'background',
				'label'    => __( 'Background', 'fwb' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .fwb-banner',
			)
		);

		// Padding control.
		$this->add_control(
			'padding',
			array(
				'label'      => __( 'Inner Padding', 'fwb' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .fwb-banner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'default'    => array(
					'top'    => '20',
					'right'  => '20',
					'bottom' => '20',
					'left'   => '20',
					'unit'   => 'px',
				),
			)
		);

		// Title control.
		$this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'fwb' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Banner Title', 'fwb' ),
			)
		);

		// Description control.
		$this->add_control(
			'description',
			array(
				'label'   => __( 'Description', 'fwb' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Banner Description', 'fwb' ),
			)
		);

		// Banner URL
		$this->add_control(
			'banner_url',
			array(
				'label' => __( 'Banner URL', 'fwb' ),
				'type'  => \Elementor\Controls_Manager::URL,
			)
		);

		// Button text control.
		$this->add_control(
			'button_text',
			array(
				'label'   => __( 'Button Text', 'fwb' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Go to Banner', 'fwb' ),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output.
	 *
	 * @return void
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		echo '<div class="fwb-banner" style="';
		echo 'padding: ' . esc_attr( $settings['padding']['top'] ) . 'px ' . esc_attr( $settings['padding']['right'] ) . 'px ' . esc_attr( $settings['padding']['bottom'] ) . 'px ' . esc_attr( $settings['padding']['left'] ) . 'px;">';

		// Heading with a class
		echo '<h2 class="banner-title">' . esc_html( $settings['title'] ) . '</h2>';

		// Paragraph with a class
		echo '<p class="banner-description">' . esc_html( $settings['description'] ) . '</p>';

		// Use the Banner URL if provided, otherwise use the category link
		$link_url = ! empty( $settings['banner_url']['url'] ) ? $settings['banner_url']['url'] : '#';

		// Anchor link with a class
		echo '<a href="' . esc_url( $link_url ) . '" class="btn-go-to-banner">' . esc_html( $settings['button_text'] ) . '</a>';

		echo '</div>';
	}
}
