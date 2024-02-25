<?php
/**
 * Elementor WooCommerce Products Widget Class
 *
 * @package fwb
 */

namespace fwb\Modules\WcProducts;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Class WCProducts
 */
class WcProducts extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'fwb-woocommerce-products-widget';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'WooCommerce Products Widget', 'fwb' );
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
			'number_of_products',
			array(
				'label'   => esc_html__( 'Number of Products', 'fwb' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5,
			)
		);

		$this->add_control(
			'display_all_categories',
			array(
				'label'     => esc_html__( 'Display All Categories', 'fwb' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'fwb' ),
				'label_off' => esc_html__( 'No', 'fwb' ),
				'default'   => 'no',
			)
		);

		$this->add_control(
			'selected_categories',
			array(
				'label'       => esc_html__( 'Select Categories', 'fwb' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'options'     => $this->get_product_categories(),
				'default'     => array(),
				'description' => esc_html__( 'Select the categories to display products from.', 'fwb' ),
				'condition'   => array(
					'display_all_categories!' => 'yes',
				),
			)
		);

		$this->add_control(
			'sorting_option',
			array(
				'label'   => esc_html__( 'Sorting Option', 'fwb' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'title',
				'options' => array(
					'title'        => esc_html__( 'Title', 'fwb' ),
					'date'         => esc_html__( 'Date', 'fwb' ),
					'price'        => esc_html__( 'Price', 'fwb' ),
					'popularity'   => esc_html__( 'Popularity', 'fwb' ),
					'rating'       => esc_html__( 'Average Rating', 'fwb' ),
					'menu_order'   => esc_html__( 'Menu Order', 'fwb' ),
					'modified'     => esc_html__( 'Last Modified', 'fwb' ),
					'on_sale'      => esc_html__( 'On Sale', 'fwb' ),
					'featured'     => esc_html__( 'Featured', 'fwb' ),
					'best_selling' => esc_html__( 'Best Selling', 'fwb' ),
					'top_rated'    => esc_html__( 'Top Rated', 'fwb' ),
					'newest'       => esc_html__( 'Newest', 'fwb' ),
				),
			)
		);

		$this->add_control(
			'filter',
			array(
				'label'   => esc_html__( 'Filter Products', 'fwb' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'all',
				'options' => array(
					'all'      => esc_html__( 'All Products', 'fwb' ),
					'onsale'   => esc_html__( 'On Sale', 'fwb' ),
					'featured' => esc_html__( 'Featured', 'fwb' ),
					'in_stock' => esc_html__( 'In Stock', 'fwb' ),
				),
			)
		);

		$this->add_control(
			'product_columns',
			array(
				'label'     => esc_html__( 'Columns Desktop', 'fwb' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '4',
				'options'   => array(
					'1'  => esc_html__( '1 Column', 'fwb' ),
					'2'  => esc_html__( '2 Columns', 'fwb' ),
					'3'  => esc_html__( '3 Columns', 'fwb' ),
					'4'  => esc_html__( '4 Columns', 'fwb' ),
					'5'  => esc_html__( '5 Columns', 'fwb' ),
					'6'  => esc_html__( '6 Columns', 'fwb' ),
					'7'  => esc_html__( '7 Columns', 'fwb' ),
					'8'  => esc_html__( '8 Columns', 'fwb' ),
					'9'  => esc_html__( '9 Columns', 'fwb' ),
					'10' => esc_html__( '10 Columns', 'fwb' ),
					'11' => esc_html__( '11 Columns', 'fwb' ),
					'12' => esc_html__( '12 Columns', 'fwb' ),
				),
				'condition' => array(
					'enable_carousel!' => 'yes',
				),
			)
		);
		$this->add_control(
			'product_columns_tablet',
			array(
				'label'     => esc_html__( 'Columns Tablet', 'fwb' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '3',
				'options'   => array(
					'1'  => esc_html__( '1 Column', 'fwb' ),
					'2'  => esc_html__( '2 Columns', 'fwb' ),
					'3'  => esc_html__( '3 Columns', 'fwb' ),
					'4'  => esc_html__( '4 Columns', 'fwb' ),
					'5'  => esc_html__( '5 Columns', 'fwb' ),
					'6'  => esc_html__( '6 Columns', 'fwb' ),
					'7'  => esc_html__( '7 Columns', 'fwb' ),
					'8'  => esc_html__( '8 Columns', 'fwb' ),
					'9'  => esc_html__( '9 Columns', 'fwb' ),
					'10' => esc_html__( '10 Columns', 'fwb' ),
					'11' => esc_html__( '11 Columns', 'fwb' ),
					'12' => esc_html__( '12 Columns', 'fwb' ),
				),
				'condition' => array(
					'enable_carousel!' => 'yes',
				),
			)
		);
		$this->add_control(
			'product_columns_mobile',
			array(
				'label'     => esc_html__( 'Columns Mobile', 'fwb' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '1',
				'options'   => array(
					'1'  => esc_html__( '1 Column', 'fwb' ),
					'2'  => esc_html__( '2 Columns', 'fwb' ),
					'3'  => esc_html__( '3 Columns', 'fwb' ),
					'4'  => esc_html__( '4 Columns', 'fwb' ),
					'5'  => esc_html__( '5 Columns', 'fwb' ),
					'6'  => esc_html__( '6 Columns', 'fwb' ),
					'7'  => esc_html__( '7 Columns', 'fwb' ),
					'8'  => esc_html__( '8 Columns', 'fwb' ),
					'9'  => esc_html__( '9 Columns', 'fwb' ),
					'10' => esc_html__( '10 Columns', 'fwb' ),
					'11' => esc_html__( '11 Columns', 'fwb' ),
					'12' => esc_html__( '12 Columns', 'fwb' ),
				),
				'condition' => array(
					'enable_carousel!' => 'yes',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_swiper',
			array(
				'label' => esc_html__( 'Slider options', 'fwb' ),
			)
		);

		$this->add_control(
			'enable_carousel',
			array(
				'label'   => esc_html__( 'Enable Carousel', 'fwb' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'no',
			)
		);

		$this->add_control(
			'slides_per_view',
			array(
				'label'     => esc_html__( 'Slides Per View', 'fwb' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 1,
				'condition' => array(
					'enable_carousel' => 'yes',
				),
			)
		);

		$this->add_control(
			'space_between',
			array(
				'label'     => esc_html__( 'Space Between Slides', 'fwb' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 10,
				'condition' => array(
					'enable_carousel' => 'yes',
				),
			)
		);

		$this->add_control(
			'navigation_arrows',
			array(
				'label'     => esc_html__( 'Navigation Arrows', 'fwb' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'condition' => array(
					'enable_carousel' => 'yes',
				),
			)
		);

		$this->add_control(
			'pagination',
			array(
				'label'     => esc_html__( 'Pagination', 'fwb' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'condition' => array(
					'enable_carousel' => 'yes',
				),
			)
		);

		$this->add_control(
			'autoplay',
			array(
				'label'     => esc_html__( 'Autoplay', 'fwb' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
				'condition' => array(
					'enable_carousel' => 'yes',
				),
			)
		);

		$this->add_control(
			'autoplay_delay',
			array(
				'label'     => esc_html__( 'Autoplay Delay in ms', 'fwb' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => '5000',
				'condition' => array(
					'enable_carousel' => 'yes',
				),
			)
		);

		$this->add_control(
			'autoplay_speed',
			array(
				'label'     => esc_html__( 'Autoplay Speed', 'fwb' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 5000,
				'condition' => array(
					'enable_carousel' => 'yes',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Get WooCommerce product categories for the select2 control.
	 *
	 * @return array Product categories.
	 */
	private function get_product_categories() {
		$categories = get_terms( 'product_cat', array( 'hide_empty' => false ) );
		$options    = array();

		foreach ( $categories as $category ) {
			$options[ $category->term_id ] = $category->name;
		}

		return $options;
	}


	/**
	 * Render the widget output on the frontend.
	 *
	 * @return void
	 */
	protected function render() {

		global $woocommerce;
		$classes = '';
		$woocommerce->frontend_includes();
		$settings       = $this->get_settings_for_display();
		$products_query = new \WP_Query( $this->generate_products_query( $settings ) );
		$classes       .= ' fwb-product-cols-' . $settings['product_columns'];
		$classes       .= ' fwb-product-cols-t-' . $settings['product_columns_tablet'];
		$classes       .= ' fwb-product-cols-m-' . $settings['product_columns_mobile'];

		$swiper_data = array(
			'slides-per-view'   => $settings['slides_per_view'],
			'space-between'     => $settings['space_between'],
			'autoplay'          => $settings['autoplay'],
			'autoplay-speed'    => $settings['autoplay_speed'],
			'autoplay-delay'    => $settings['autoplay_delay'],
		);

		if ( $settings['enable_carousel'] === 'yes' ) {
			wp_enqueue_script( 'fwb-swiper-init', FWB_COMMON_JS_URI . '/integrations/swiper-init.js', array( 'jquery' ), FWB_VERSION, true );
				
			?>
			<div class="fwb-products swiper woocommerce" data-swiper_attr='<?php echo wp_json_encode( $swiper_data ); ?>'>
			
				<div class="swiper-wrapper">
					<?php
					while ( $products_query->have_posts() ) {
						$products_query->the_post();
						echo '<div class="swiper-slide">';
						wc_get_template_part( 'content', 'product' );
						echo '</div>';
					}
					?>
				</div>
					<?php
					if ( $settings['navigation_arrows'] === 'yes' ) {
						?>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
						<?php
					}
					if ( $settings['pagination'] === 'yes' ) {
						?>
					<div class="swiper-pagination"></div>
						<?php
					}
					?>
			</div>
			<?php
		} elseif ( $products_query->have_posts() ) {
			?>
	<div class="fwb-products woocommerce">
		<ul class="products <?php echo esc_html( $classes ); ?>">
			<?php
			while ( $products_query->have_posts() ) {
				$products_query->the_post();
				wc_get_template_part( 'content', 'product' );
			}
			?>
		</ul>
	</div>
			<?php
			wp_reset_postdata();
		} else {
			do_action( 'woocommerce_no_products_found' );
		}
	}



	// Helper function to generate a custom query for products
	private function generate_products_query( $settings ) {
		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => $settings['number_of_products'],
			'orderby'        => $settings['sorting_option'],
			'order'          => 'asc',
		);

		if ( $settings['display_all_categories'] !== 'yes' && ! empty( $settings['selected_categories'] ) ) {
			$selected_categories = array_map( 'get_term', $settings['selected_categories'] );
			$category_slugs      = wp_list_pluck( $selected_categories, 'slug' );
			$args['tax_query']   = array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug',
					'terms'    => $category_slugs,
					'operator' => 'IN',
				),
			);
		}

		if ( $settings['filter'] !== 'all' ) {
			switch ( $settings['filter'] ) {
				case 'featured':
					$args['meta_query'][] = array(
						'key'   => '_featured',
						'value' => 'yes',
					);
					break;
				case 'onsale':
					$args['meta_query'][] = array(
						'key'     => '_sale_price',
						'value'   => '',
						'compare' => '!=',
					);
					break;
				case 'in_stock':
					$args['meta_query'][] = array(
						'key'     => '_stock_status',
						'value'   => 'instock',
						'compare' => '=',
					);
					break;
			}
		}

		return apply_filters( 'fwb_wc_products_custom_query', $args, $settings );
	}
}
