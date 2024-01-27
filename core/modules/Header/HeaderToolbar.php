<?php
/**
 * Elementor Custom WooCommerce Icons Widget Class
 *
 * @package fwb
 */

namespace fwb\Modules\Header;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

/**
 * Class HeaderToolbar
 */
class HeaderToolbar extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'fwb-header-toolbar-widget';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Header Toolbar', 'fwb' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-button';
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
			'cart_icon',
			array(
				'label'   => esc_html__( 'Cart Icon', 'fwb' ),
				'type'    => Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fa fa-shopping-cart',
					'library' => 'solid',
				),
			)
		);

		$this->add_control(
			'account_icon',
			array(
				'label'   => esc_html__( 'My Account Icon', 'fwb' ),
				'type'    => Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fa fa-user',
					'library' => 'solid',
				),
			)
		);

		$this->add_control(
			'register_icon',
			array(
				'label'   => esc_html__( 'Register Icon', 'fwb' ),
				'type'    => Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fa fa-user-plus',
					'library' => 'solid',
				),
			)
		);

		$this->add_control(
			'login_icon',
			array(
				'label'   => esc_html__( 'Login Icon', 'fwb' ),
				'type'    => Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fa fa-sign-in',
					'library' => 'solid',
				),
			)
		);

		$this->add_control(
			'logout_icon',
			array(
				'label'   => esc_html__( 'Logout Icon', 'fwb' ),
				'type'    => Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fa fa-sign-out',
					'library' => 'solid',
				),
			)
		);

		$this->add_control(
			'icon_color',
			array(
				'label'   => esc_html__( 'Icon Color', 'fwb' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#000000',
			)
		);

		$this->add_control(
			'icon_size',
			array(
				'label'   => esc_html__( 'Icon Size', 'fwb' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => array(
					'size' => 16,
				),
				'range'   => array(
					'px' => array(
						'max' => 50,
					),
				),
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
		$settings  = $this->get_settings_for_display();
		$icon_size = isset( $settings['icon_size']['size'] ) ? $settings['icon_size']['size'] : 16;

		?>
		<div class="fwb-header-toolbar">
			<div class="fwb-wc-menu-icons">
				<a href="<?php echo wc_get_cart_url(); ?>" class="elementor-icon" style="color: <?php echo esc_attr( $settings['icon_color'] ); ?>">
					<?php
					Icons_Manager::render_icon(
						$settings['cart_icon'],
						array(
							'aria-hidden' => 'true',
							'style'       => 'font-size: ' . $icon_size . 'px;',
						)
					);
					?>
				</a>

				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo wc_get_account_endpoint_url( 'dashboard' ); ?>" class="elementor-icon" style="color: <?php echo esc_attr( $settings['icon_color'] ); ?>">
						<?php
						Icons_Manager::render_icon(
							$settings['account_icon'],
							array(
								'aria-hidden' => 'true',
								'style'       => 'font-size: ' . $icon_size . 'px;',
							)
						);
						?>
					</a>
					<a href="<?php echo wp_logout_url( home_url() ); ?>" class="elementor-icon" style="color: <?php echo esc_attr( $settings['icon_color'] ); ?>">
						<?php
						Icons_Manager::render_icon(
							$settings['logout_icon'],
							array(
								'aria-hidden' => 'true',
								'style'       => 'font-size: ' . $icon_size . 'px;',
							)
						);
						?>
					</a>
				<?php else : ?>
					<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="elementor-icon" style="color: <?php echo esc_attr( $settings['icon_color'] ); ?>">
						<?php
						Icons_Manager::render_icon(
							$settings['login_icon'],
							array(
								'aria-hidden' => 'true',
								'style'       => 'font-size: ' . $icon_size . 'px;',
							)
						);
						?>
					</a>
					<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="elementor-icon" style="color: <?php echo esc_attr( $settings['icon_color'] ); ?>">
						<?php
						Icons_Manager::render_icon(
							$settings['register_icon'],
							array(
								'aria-hidden' => 'true',
								'style'       => 'font-size: ' . $icon_size . 'px;',
							)
						);
						?>
					</a>
				<?php endif; ?>
			</div>

			<?php if ( WC()->cart ) : ?>
				<div class="fwb-cart-info">
					<span class="cart-total"><?php echo WC()->cart->get_cart_total(); ?></span>
				</div>
			<?php endif; ?>
		</div>
		<?php
	}
}
