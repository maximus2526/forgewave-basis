<?php
/**
 * Custom Elementor Widget for WooCommerce Category Banners
 */
namespace fwb\Modules;

use Elementor\Widget_Base;
use Elementor\Plugin;

class Category_Banners extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'category_banner_widget';
	}

	/**
	 * Get widget title.
	 *
	 * @return string
	 */
	public function get_title() {
		return __( 'Category Banner Widget', 'fwb' );
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
		return array( 'category' );
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

		// Banner width
		$this->add_control(
			'banner_width',
			array(
				'label'      => __( 'Banner Width', 'fwb' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', '%' ),
				'range'      => array(
					'px' => array(
						'min' => 0,
						'max' => 2000,
					),
					'em' => array(
						'min' => 0,
						'max' => 100,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
					'size' => 100,
				),
				'selectors'  => array(
					'{{WRAPPER}} .fwb-category-banner' => 'width: {{SIZE}}{{UNIT}};',
				),
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
					'{{WRAPPER}} .fwb-category-banner' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);

		// Button text
		$this->add_control(
			'button_text',
			array(
				'label'   => esc_html__( 'Button text', 'fwb' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Go to category.', 'fwb' ),
			),
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

		// Loop through each WooCommerce category and render the banner
		$categories = get_terms(
			array(
				'taxonomy'   => 'product_cat',
				'hide_empty' => false,
			)
		);

		echo '<div class="fwb-category-banners">';
		foreach ( $categories as $category ) {
			$category_image = get_term_meta( $category->term_id, 'thumbnail_id', true );
			$image_url      = wp_get_attachment_url( $category_image ) ? wp_get_attachment_url( $category_image ) : FWB_NO_IMG;

			echo '<div class="fwb-category-banner">';

			echo '<div class="fwb-category-image">';
			echo '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $category->name ) . '">';
			echo '</div>';

			echo '<div class="fwb-category-content">';
			echo '<h2 class="category-title">' . esc_html( $category->name ) . '</h2>';
			echo '<p class="category-description">' . esc_html( $category->description ) . '</p>';
			$category_link = get_term_link( $category );
			echo '<a href="' . esc_url( $category_link ) . '" class="btn-go-to-category">' . esc_html( $settings['button_text'] ) . '</a>';
			echo '</div>';

			echo '</div>';
		}
		echo '</div>';
	}
}

Plugin::instance()->widgets_manager->register( new Category_Banners() );
