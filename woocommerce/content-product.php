<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>
<div <?php post_class('col-md-3 col-sm-6'); ?>>
    <div class="product_item">
        <?php
        /**
         * woocommerce_before_shop_loop_item hook.
         *
         * @hooked woocommerce_template_loop_product_link_open - 10
         */
        do_action( 'woocommerce_before_shop_loop_item' );

        /**
         * woocommerce_before_shop_loop_item_title hook.
         *
         * @hooked woocommerce_show_product_loop_sale_flash - 10
         * @hooked woocommerce_template_loop_product_thumbnail - 10
         */
        //do_action( 'woocommerce_before_shop_loop_item_title' );
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->ID ), 'img-responsive' );?>

        <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">

        <?php /**
         * woocommerce_shop_loop_item_title hook.
         *
         * @hooked woocommerce_template_loop_product_title - 10
         */ ?>
        <div class="product_details">
            <h4><?php echo get_the_title(); ?></h4>
            <?php echo $product->get_price_html(); ?>
            <?php //do_action( 'woocommerce_shop_loop_item_title' );

            /**
             * woocommerce_after_shop_loop_item_title hook.
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            //do_action( 'woocommerce_after_shop_loop_item_title' ); ?>

            <?php /**
             * woocommerce_after_shop_loop_item hook.
             *
             * @hooked woocommerce_template_loop_product_link_close - 5
             * @hooked woocommerce_template_loop_add_to_cart - 10
             */
            //do_action( 'woocommerce_after_shop_loop_item' );
            ?>
        </div>
        <div class="product_item_overlay">
            <h4><?php echo get_the_title(); ?></h4>
            <p><?php echo substr(get_the_excerpt(), 0, 70); ?></p>
            <?php echo $product->get_price_html(); ?>
            <div class="button_area">
                <a href="<?php echo $product->get_permalink(); ?>" class="buy_now btn btn-default">View</a>
                <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
            </div>
        </div>
    </div>
</div>