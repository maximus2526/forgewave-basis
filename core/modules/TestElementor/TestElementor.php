<?php
/**
 * Elementor Test Widget Class
 *
 * @package fwb
 */

namespace fwb\Modules\TestElementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Class Elementor_Test_Widget
 */
class TestElementor extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'fwb-test-widget';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Test Widget', 'fwb' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive';
	}

	/**
	 * Retrieve the widget categories.
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'general' );
	}

	/**
	 * Register widget controls.
	 *
	 * @return void
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => esc_html__( 'Content', 'fwb' ),
			)
		);

		$this->add_control(
			'text',
			array(
				'label'   => esc_html__( 'Text', 'fwb' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Hello, World!', 'fwb' ),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * @return void
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		echo '<div class="fwb-test-widget">';
		echo '<p>' . esc_html( $settings['text'] ) . '</p>';
		echo '</div>';
	}

	/**
	 * Render the widget content template.
	 *
	 * @return void
	 */
	protected function _content_template() {
		?>
		<div class="fwb-test-widget">
			<p>{{{ settings.text }}}</p>
		</div>
		<?php
	}
}

// Register the widget with Elementor.
\Elementor\Plugin::instance()->widgets_manager->register( new ElementorTest() );
