<?php get_header(); ?>
<section class="modules page_heading">
    <div class="container">
        <!-- Use from here if you want only want simple heading with stripe -->
        <div class="row">
            <div class="col-md-12">
                <div class="area_title">
                    <h1>Wellness Articles</h1>
                </div>
            </div>
        </div>
        <!-- And end here -->
    </div>
</section>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!--Start Signle Post area-->
<section class="modules signle_post">
    <div class="container">

        <div class="row">

            
 <?php
                if ( has_post_thumbnail() ) { ?>
                    
                    
            <div class="col-md-12" style="height:400px; width:1200px; background:url('<?php echo the_post_thumbnail_url(); ?>');">
                <h1 class="featured-image-header">
                    <?php the_title(); ?>
                </h1>
               
            </div>                    
                    
	                   
                    <?php }
            else { ?>
               
            <div class="col-md-12">
                <h1>
                    <?php the_title(); ?>
                </h1>
               
            </div>               
               
               <?php
                
            }
                ?>            
            
        </div>

        <div class="row signle_posts_area">
            <div class="col-md-9">
                <article class="post_item">
                    <div class="meta_info">
                       by: <?php the_author_nickname(); ?> | 
                        <?php the_date(); ?>

                        <?php $posttags = get_the_tags();
                            if ($posttags) { ?>
                        <span>|</span>
                        <?php foreach($posttags as $tag) {
                                    echo '<a href="">'.$tag->name.'</a>';
                                }
                            } ?>
                    </div>

                    <div class="post_content">
                        <?php the_content(); ?>
                    </div>
                </article>

                <div class="clear"></div>

                <div class="social">
                    <h5>Share this Post:</h5>
                    <ul>
                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>

                <div class="related_posts">
                    <h2>Related Articles</h2>
                    <?php $postcat = get_the_category( get_the_ID() );
						$catagoryName = $postcat[0]->name; ?>
                    <div class="row">
                        <?php
							$postId = get_the_ID();
                            $args = array( 
                                'category_name' => $catagoryName,
                                'post_type' => 'post',
                                'posts_per_page' =>3,
								'post__not_in' => array( $postId )
                                 );
                                // The Query
                                $the_query = new WP_Query( $args );

                                // The Loop
                                if ( $the_query->have_posts() ) {
                                    while ( $the_query->have_posts() ) {
                                        $the_query->the_post(); ?>
                            <div class="col-md-4">
                                <?php the_post_thumbnail(); ?>
                                <a href="<?php the_permalink();?>">
                                    <h4>
                                        <?php the_title();?>
                                    </h4>
                                </a>
                            </div>
                            <?php }
                                    /* Restore original Post Data */
                                    wp_reset_postdata();
                                    } else {
                                // no posts found
                                } ?>
                    </div>

                </div>

                <div class="posts_navigate more_btns_area">

                    <?php previous_post_link('%link', '<i class="fa fa-angle-left"></i> <span> Previous Post</span>', TRUE); ?>

                    <?php next_post_link('%link', '<span>Next Post </span> <i class="fa fa-angle-right"></i>', TRUE); ?>

                </div>
            </div>

            <div class="col-md-3">
                <!--Side bar is a saperated modules whiche include in blog page and other pages -->
                <div class="modules sidebar">
                    <div class="sidebar_item">
                        <img class="img-responsive" src="http://via.placeholder.com/220x220/82AA30/244603">
                        <p>
                            (Placeholder for quote) Donec malesuada mauris eget nisl gravida, in malesuada mi sagittis.
                        </p>
                        <img class="img-responsive" src="http://via.placeholder.com/220x220/82AA30/244603">
                        <h4>
                            (Placeholder for Heading) Donec malesuada.
                        </h4>
                    </div>

                    <div class="sidebar_item">
                        <div class="product_item">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/features-product-1.jpg">
                            <div class="product_details">
                                <h4>Product Title</h4>
                                <span>$xx.xx</span>
                                <a href="" class="buy_now btn btn-default">Buy Now</a>
                            </div>
                        </div>

                        <div class="product_item">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/features-product-2.jpg">
                            <div class="product_details">
                                <h4>Product Title</h4>
                                <span>$xx.xx</span>
                                <a href="" class="buy_now btn btn-default">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<?php endwhile; else : ?>
<p>
    <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
</p>
<?php endif; ?>
<?php get_footer(); ?>
