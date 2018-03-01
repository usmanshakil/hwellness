<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

<div class="" style =" margin: 0;">
	<div class="">
		<div class="product_details_additional container">
				<h3 style="padding: 30px 0; color: #244603; border-bottom: 3px solid #244603;">Related Products</h3>
			<!-- Start Feature product module in signle product's realted product area-->
			<div class="row modules feature_product text-center">

				<!--		<h2>--><?php //esc_html_e( 'Related products', 'woocommerce' ); ?><!--</h2>-->

				<?php woocommerce_product_loop_start(); ?>

				<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product_rel' ); ?>

				<?php endforeach; ?>

				<?php woocommerce_product_loop_end(); ?>



				<?php endif;?>
			</div>
		</div>

	</div>
</div>
<?php wp_reset_postdata();
?>

