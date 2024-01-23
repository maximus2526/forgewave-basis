<?php
/**
 * Elementor Test Widget Class
 *
 * @package fwb
 */

namespace fwb\Modules\Header;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Class MobileMenu
 */
class BurgerMenu extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'fwb-burger-menu';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Burger menu for mobile', 'fwb' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-menu-bar';
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

		// Menu ID Control
		$this->add_control(
			'menu_id',
			array(
				'label'   => esc_html__( 'Menu ID', 'fwb' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '',
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
		?>
		<a class="fwb-burger-element">
			<i class="fwb-font-awesome fa-duotone fa-bars"></i>
		</a>
		<div class="fwb-burger-content fwb-hidden">
			<div class="fwb-burger-menu">
				<?php
				if ( ! empty( $settings['menu_id'] ) ) {
					wp_nav_menu(
						array(
							'menu' => $settings['menu_id'],
						)
					);
				}
				?>
			</div>
			<button class="fwb-burger-close">&times;</button>
		</div>
		<?php
	}
}
