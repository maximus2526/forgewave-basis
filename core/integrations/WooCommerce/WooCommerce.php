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
		wp_dequeue_style( 'woocommerce-layout' );
	}
	add_action( 'wp_enqueue_scripts', 'remove_woocommerce_styles', 100 );
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
