<?php
/**
 * Elementor blocks
 *
 * @package fwb
 */
namespace fwb;

class Elementor_Blocks {
	use Singleton;

	protected function init() {
		add_action( 'init', array( $this, 'create_post_type' ), 100 );
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'add_elementor_support' ) );
		add_filter( 'enter_title_here', array( $this, 'change_enter_title_here' ) );
	}

	/**
	 * Create post type.
	 *
	 * @return void
	 */
	public function create_post_type() {
		register_post_type(
			'elementor-blocks',
			array(
				'labels'          => array(
					'name'          => esc_html__( 'Elementor Blocks', 'fwb' ),
					'singular_name' => esc_html__( 'Elementor Block', 'fwb' ),
					'add_new'       => esc_html__( 'Add New Block', 'fwb' ),
				),
				'public'          => true,
				'has_archive'     => false,
				'rewrite'         => array( 'slug' => 'elementor-blocks' ),
				'supports'        => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
				'capability_type' => 'page',
				'menu_icon'       => 'dashicons-layout',
			)
		);
	}

	/**
	 * Add Elementor support to the custom post type.
	 *
	 * @return void
	 */
	public function add_elementor_support() {
		add_post_type_support( 'elementor-blocks', 'elementor' );
	}

	/**
	 * Change the text on the post title input field.
	 *
	 * @param string $title_placeholder Default placeholder text.
	 * @return string
	 */
	public function change_enter_title_here( $title_placeholder ) {
		global $post_type;
		if ( 'elementor-blocks' === $post_type ) {
			$title_placeholder = esc_html__( 'Enter Block Title Here', 'fwb' );
		}
		return $title_placeholder;
	}

	/**
	 * Get Elementor block content by ID.
	 *
	 * @param int $block_id Post ID.
	 * @return string Elementor block content if edited with Elementor, empty string otherwise.
	 */
	public static function get_elementor_block_content( $block_id ) {
		$content = '';

		if ( self::is_elementor_edited( $block_id ) && function_exists( 'elementor' ) ) {
			$elementor = \Elementor\Plugin::instance();
			$content   = $elementor->frontend->get_builder_content( $block_id );
		}

		return $content;
	}

	/**
	 * Check if a post was edited with Elementor.
	 *
	 * @param int $post_id Post ID.
	 * @return bool True if edited with Elementor, false otherwise.
	 */
	public static function is_elementor_edited( $post_id ) {
		$is_elementor_edited = false;

		if ( class_exists( '\Elementor\Plugin' ) ) {
			$elementor = \Elementor\Plugin::instance();
			$document  = $elementor->documents->get_doc_for_frontend( $post_id );

			if ( $document && $document->is_built_with_elementor() ) {
				$is_elementor_edited = true;
			}
		}

		return $is_elementor_edited;
	}

	/**
	 * Get an array of all Elementor block IDs.
	 *
	 * @return array Array of Elementor block IDs.
	 */
	public static function get_all_elementor_block_ids() {
		$block_ids = array();

		if ( class_exists( '\Elementor\Plugin' ) ) {
			$elementor = \Elementor\Plugin::instance();

			// Query all posts of type 'elementor-blocks'.
			$args = array(
				'post_type'      => 'elementor-blocks',
				'posts_per_page' => -1,
			);

			$elementor_blocks = get_posts( $args );

			// Check if Elementor is active and iterate through each post.
			if ( is_array( $elementor_blocks ) && ! empty( $elementor_blocks ) ) {
				foreach ( $elementor_blocks as $block ) {
					// Use Elementor API to check if the document exists.
					$document = $elementor->documents->get_doc_for_frontend( $block->ID );

					if ( $document && $document->is_built_with_elementor() ) {
						$block_ids[] = $block->ID;
					}
				}
			}
		}

		return $block_ids;
	}
}

Elementor_Blocks::get_instance();
