<?php

if ( ! function_exists( 'woocommerce_template_loop_stock' ) ) {
	function woocommerce_template_loop_stock() {
		global $product;
		if ( ! $product->managing_stock() && ! $product->is_in_stock() ) {
			echo '<p class="stock out-of-stock">Out of Stock</p>';
		}
	}
	add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_stock', 10 );
}

if ( ! function_exists( 'remove_woocommerce_styles' ) ) {
	function remove_woocommerce_styles() {
		wp_dequeue_style( 'woocommerce-general' );
		wp_dequeue_style( 'woocommerce-layout' );
	}
	add_action( 'wp_enqueue_scripts', 'remove_woocommerce_styles', 100 );
}

if ( ! function_exists( 'wc_clear_product_template' ) ) {
	function wc_clear_product_template() {
		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open' );
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	}
	add_action( 'init', 'wc_clear_product_template', 100 );
}

if ( ! function_exists( 'ajax_update_cart_total' ) ) {
	function ajax_update_cart_total( $fragments ) {
		ob_start();
		?>
	<span class="cart-total"><?php echo WC()->cart->get_cart_total(); ?></span>
		<?php
		$fragments['.cart-total'] = ob_get_clean();
		return $fragments;
	}
	add_filter( 'woocommerce_add_to_cart_fragments', 'ajax_update_cart_total' );
}

if ( ! function_exists( 'change_add_to_cart_text' ) ) {
	function change_add_to_cart_text( $text ) {
		return __( 'Add To Cart', 'fwb' );
	}
	
	add_filter( 'woocommerce_product_add_to_cart_text', 'change_add_to_cart_text', 100  );
}