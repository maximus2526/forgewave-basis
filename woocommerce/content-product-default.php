<?php
/**
 * Custom product design - default design
 * 
 * @package FWB
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

<a href="<?php echo esc_url( get_permalink() ); ?>">
    <?php


    /**
     * woocommerce_shop_loop_item_title hook.
     *
     * @hooked woocommerce_template_loop_product_title - 10
     */
    do_action( 'woocommerce_shop_loop_item_title' );

    /**
     * woocommerce_after_shop_loop_item_title hook.
     *
     * @hooked woocommerce_template_loop_rating - 5
     * @hooked woocommerce_template_loop_price - 10
     */
    do_action( 'woocommerce_after_shop_loop_item_title' );

    /**
     * woocommerce_after_shop_loop_item hook.
     *
     * @hooked woocommerce_template_loop_product_link_close - 5
     * @hooked woocommerce_template_loop_add_to_cart - 10
     */
    do_action( 'woocommerce_after_shop_loop_item' );
    ?>
</a>

<?php    
/**
 * woocommerce_before_shop_loop_item hook.
 *
 * @hooked woocommerce_template_loop_product_link_open - 10
 */
do_action( 'woocommerce_before_shop_loop_item' );
?>

<div class="fwb-product-thambnail">
    <?php woocommerce_template_loop_product_thumbnail(); ?>
</div>

<?php    
/**
 * woocommerce_before_shop_loop_item_title hook.
 *
 * @hooked woocommerce_show_product_loop_sale_flash - 10
 * @hooked woocommerce_template_loop_product_thumbnail - 10
 */
do_action( 'woocommerce_before_shop_loop_item_title' );
?>

<div class="fwb-product-content">
    <div class="fwb-product-title">
        <?php the_title(); ?>
    </div>

    <div class="fwb-product-short-description">
        <?php  
        $short_description = $product->get_short_description();
        if ( $short_description ) {
            echo wpautop( $short_description );
        }
        ?>
    </div>

    <div class="fwb-product-price">
        <?php echo woocommerce_template_loop_price() ?>
    </div>

    <div class="fwb-add-to-cart-btn">
        <?php echo woocommerce_template_loop_add_to_cart(); ?>
    </div>
</div>


