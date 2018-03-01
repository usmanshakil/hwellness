<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );
global $wp_query;
$cat_obj = $wp_query->get_queried_object();

?>
<?php /*
<section class="modules page_heading">
	<div class="container">
		<!-- Use from here if you want only want simple heading with stripe -->
		<div class="row">
			<div class="col-md-12">
				<div class="area_title">
					<h1><?php  echo $cat_obj->name; ?></h1>
				</div>
			</div>
		</div><!-- And end here -->
	</div>
</section>
*/ ?>

<section class="modules feature_product text-center">
	<div class="container">
		<?php
				 $args2 = array(
					 'taxonomy'     => 'product_cat',
//					 'child_of'     => 0,
					 'parent'       => $cat_obj->term_id,
					 'orderby'      => 'name',
//					 'show_count'   => 0,
//					 'pad_counts'   => 0,
					 'hierarchical' => 1,
					 'title_li'     => '',
					 'hide_empty'   => 0
				 );
				 $sub_cats = get_categories( $args2 );
				 $counter = 1;
				 if($sub_cats) {
					 foreach($sub_cats as $sub_category) {
					 	$add_class = $counter > 1 ? 'add-margin' : ''; ?>
						 <div class="row">
							<div class="col-md-12">
								<div class="area_title <?php echo $add_class;?>">
									<h1><?php  echo  $sub_category->name ; ?></h1>
								</div>
							</div>
						 </div>
					<?php $sub_cat_args = array(
							 'post_type' => 'product',
							 'posts_per_page' => -1,
							 'tax_query' => array(
								 array(
									 'taxonomy' => 'product_cat',
									 'field'    => 'slug',
									 'terms'    => $sub_category->slug
								 ),
							 ),
						 );
						 $sub_cat_loop = new WP_Query( $sub_cat_args );
						 if ( $sub_cat_loop->have_posts() ) {
							 while ( $sub_cat_loop->have_posts() ) : $sub_cat_loop->the_post();
								 wc_get_template_part( 'content', 'product_cat' );
							 endwhile;
						 } else {
							 echo __( 'No products found' );
						 }
						 wp_reset_postdata();
					 $counter++;
					 }
				 } 
		?>
<!-- end page heading -->

<!--Start Feature products area -->

		</div>

</section>
<!--End Feature products area -->
<?php if(!empty($cat_obj->term_id)){?>
<!--Start Feature products area -->
<section class="modules feature_product text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="area_title">
					<h1>Other Hemp Extract Products</h1>
				</div>
			</div>
		</div>

		<div class="row">
            <?php
            $parent_cat_args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
//                 'tax_query' => array(
//                     array(
//                         'taxonomy' => 'product_cat',
//                         'field'    => 'slug',
//                         'terms'    => $cat_obj->slug
//                     ),
//                 ),
            );
            $parent_cat_loop = new WP_Query( $parent_cat_args );
            if ( $parent_cat_loop->have_posts() ) {
            while ( $parent_cat_loop->have_posts() ) : $parent_cat_loop->the_post();
            wc_get_template_part( 'content', 'product_cat' );
            endwhile;
            } else {
            echo __( 'No products found' );
            }
            wp_reset_postdata();
?>

		</div>

	</div>
</section>
<!--End Feature products area -->
<?php }?>




<?php get_footer( 'shop' ); ?>
