<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
	exit; // Exit if accessed directly
}

?>

<?php
/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>
<section class="modules single_product">
	<div class="container">
		<div class="row" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="col-md-6 text-center">
			<?php
			/**
			 * woocommerce_before_single_product_summary hook.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>
				</div>

			<div class="col-md-6 summary entry-summary">

				<?php
				/**
				 * woocommerce_single_product_summary hook.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>

			</div><!-- .summary -->

			<?php
			/**
			 * woocommerce_after_single_product_summary hook.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
//						do_action( 'woocommerce_after_single_product_summary' );
			?>

		</div><!-- #product-<?php the_ID(); ?> -->

		<?php do_action( 'woocommerce_after_single_product' ); ?>



		<?php /* global $post;
$product = new WC_Product( $post->ID );
?>
<section class="modules single_product">
	<div class="container">
		<div class="row">
			<div class="col-md-6 text-center">
				<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
			</div>
			<div class="col-md-6">
				<h2> <?php the_title() ?></h2>
				<h4>Product sub title</h4>
				<h2 class="price"><span>$</span><?php echo $product->regular_price;?></h2>
				<?php the_content();  ?>
				<div>
					<div class="count_add_to_cart">
						<i class="fa fa-minus-circle btn-number" disabled="disabled" data-type="minus" data-field="quant[1]" aria-hidden="true"></i>
						<!--Uncomment for static use.
                        <span>1</span>
                        -->
						<input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
						<i class="fa fa-plus-circle btn-number" data-type="plus" data-field="quant[1]" aria-hidden="true"></i>
					</div>
					<a class="add_to_cart btn btn-default" href="">Add to cart</a>
				</div>
			</div>
		</div>
		<div class="row">

			<div class="col-md-12">
				<div class="product_details_additional">
					<h3>Additional information</h3>
					<div>
						<!-- Simple Text area -->
						<ul>
							<li>Ingredients:</li>
							<li>Suggest Serving Size:</li>
							<li>Servings per container</li>
							<li>Suggest use:</li>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
		<?php */ ?>
		
					<?php	add_action( 'woocommerce_after_single_product_summary', 'woocommerce_product_additional_information_tab' );?></div>
			
</section>
<?php
/**
 * woocommerce_after_single_product_summary hook.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
do_action( 'woocommerce_after_single_product_summary' );
?>