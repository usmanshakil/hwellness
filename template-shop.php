<?php
/*
Template Name: Shop
*/
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

<section class="modules page_heading">
	<div class="container">
		<!-- Use from here if you want only want simple heading with stripe -->
		<div class="row">
			<div class="col-md-12">
				<div class="area_title">
					<h1>Shop</h1>
				</div>
			</div>
		</div><!-- And end here -->
	</div>
</section>

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
				 if($sub_cats) {
					 foreach($sub_cats as $sub_category) {?>
						 <div class="row">
							<div class="col-md-12">
								<div class="area_title">
									<h1><?php  echo  $sub_category->name ; ?></h1>
								</div>
							</div>
						 </div>
					<?php

						 $sub_cat_args = array(
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
					 }
				 } 
		?>
<!-- end page heading -->

<!--Start Feature products area -->

		</div>

</section>
<!--End Feature products area -->




<?php get_footer( 'shop' ); ?>
