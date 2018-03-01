<?php get_header(); ?>

    <!-- Start carousel area -->
    <section class="modules carousel text-center">

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/background-1.jpg')">
                    <div class="overlay"></div>
                    <div class="carousel-caption">

                        <h1>Get Balanced.</h1>

                    </div>
                </div>
                <div class="item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/background-2.jpg')">
                    <div class="overlay"></div>
                    <div class="carousel-caption">

                        <h1>Live Better.</h1>

                    </div>
                </div>
                <div class="item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/background-3.jpg')">
                    <div class="overlay"></div>
                    <div class="carousel-caption">

                        <h1>Enjoy More.</h1>

                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>

        <div class="short_cut_boxs">
            <div class="container">
                <div class="row">
                    <?php if( have_rows('main_links') ):
                        while ( have_rows('main_links') ) : the_row(); ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="short_cut_box">
                                    <a href="" class="more_btn">
                                        <?php $mainImage = get_sub_field('image');
                                        $imageUrl = $mainImage['url'];
                                        $imageAlt = $mainImage['name']; ?>
                                        <img src="<?php echo $imageUrl; ?>" alt="<?php echo $imageAlt; ?>">
                                        <div class="short_cut_box_content">
                                            <h3><?php the_sub_field('heading'); ?></h3>
                                            <a class="more_btn" href="<?php the_sub_field('button_link'); ?>"><?php the_sub_field('button_text'); ?> <i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile;
                    else :
                    endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End carousel area -->

    <!--Start Feature products area -->
    <section class="modules feature_product text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="area_title">
                        <h1>featured Hemp Extract Products</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                $feature_args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 4,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => 'hemp-extract-products'
                        ),
                        array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'featured',
                        ),
                    ),
                );
                $featured_loop = new WP_Query( $feature_args );
                if ( $featured_loop->have_posts() ) {
                    while ( $featured_loop->have_posts() ) : $featured_loop->the_post();
                        wc_get_template_part( 'content', 'product' );
                    endwhile;
                } else {
                    echo __( 'No Featured products found' );
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="more_btns_area">
                        <a href="<?php echo get_bloginfo('url'); ?>/product-category/hemp-extract-products/" class="more_item_btn">Shop All Hemp Extract Products <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--End Feature products area -->

    <!--Start Tea Tree products area -->
    <section class="modules feature_product text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="area_title">
                        <h1>Hemp Tea Tree Products</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                $feature_args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 4,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => 'hemp-tea-tree-products'
                        ),
                        array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'featured',
                        ),
                    ),
                );
                $featured_loop = new WP_Query( $feature_args );
                if ( $featured_loop->have_posts() ) {
                    while ( $featured_loop->have_posts() ) : $featured_loop->the_post();
                        wc_get_template_part( 'content', 'product' );
                    endwhile;
                } else {
                    echo __( 'No Featured products found' );
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="more_btns_area">
                        <a href="<?php echo get_bloginfo('url'); ?>/product-category/hemp-tea-tree-products/" class="more_item_btn">Shop All Hemp Tea Tree Products <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Tea Tree products area -->

    <!--Start ARTICLE article_carousel area -->
    <section class="modules article_carousel text-center"><!--start testimonial section-->
        <div class="parallax" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/parallax1.jpg');"></div>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Wellness Articles</h1>
                </div>
            </div>

            <div class="row article_container">
                <div class="owl-carousel owl-theme">
                    <?php global $post;
                        $args = array(
                            'posts_per_page' => 6,
                            'post__in'  => get_option( 'sticky_posts' ),
                            'ignore_sticky_posts' => 1
                        );
                        $wellness_articles = get_posts($args);
                        foreach ($wellness_articles as $post) {
                            $wellness_image = get_the_post_thumbnail_url($post -> ID);
                                    if($wellness_image == '') {
                                        $wellness_image = 'http://via.placeholder.com/360x400/0C1E2A/244603';
                                    } ?>
                                <div class="item">
                                        <div class="col-md-12">
                                            <div class="article_item" style="background-image: url(<?php echo $wellness_image; ?>);">
                                                <h2><?php echo substr($post->post_title,0,11);?></h2>
                                                <p><?php echo substr($post->post_content,0,200); ?></p>
                                                <a href="<?php echo get_the_permalink($post->ID);?>" class="more_item_btn">Read More <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                        <?php }?>
                </div>
            
            </div>

            
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="more_btns_area">
                        <a href="" class="more_item_btn">Read All Articles <i class="fa fa-angle-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--end article_carousel section-->

    <!--Start emial sign up section-->
    <section class="modules email_newsletter">
        <div class="elements">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="main_container">
                            <div class="row">
                                <div class="col-md-5">
                                <h4>
                                    Sign up for coupons, spacial offers &amp; announcements!
                                </h4>
                            </div>
                            <div class="col-md-7">
                                <form class="form-inline">

                                    <div class="form-group">
                                        <label><i class="fa fa-send"></i></label>
                                        <input type="text" class="form-control" id="email" placeholder="Email address">
                                    </div>

                                    <button type="submit" class="btn btn-default">Join now</button>

                                </form>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end emial sign up section-->

    <!--Start GUEST POST article_carousel area -->
    <section class="modules article_carousel text-center"><!--start testimonial section-->
        <div class="parallax" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/parallax2.jpg');"></div>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Guest Wellness Posts</h1>
                </div>
            </div>

            <div class="row article_container">
                <div id="gust_article_carousel" class="carousel slide" data-ride="carousel">
                    <div class="owl-carousel owl-theme">
                        <?php global $post;
                        $args = array(
                            'posts_per_page' => 9,
                            'post_type'  => 'guest_posts'
                        );
                        $guest_articles = get_posts($args); 
                         foreach ($guest_articles as $post) {
                            $wellness_image = get_the_post_thumbnail_url($post -> ID);
                                    if($wellness_image == '') {
                                        $wellness_image = 'http://via.placeholder.com/360x400/0C1E2A/244603';
                                    }
                            echo '<div class="item">
                                     <div class="col-md-12">
                                        <div class="article_item" style="background-image: url('.$wellness_image.');">
                                            <h2>'.substr($post->post_title,0,11).'</h2>
                                            <p>'.substr($post->post_content,0,200).'</p>
                                            <a href="'.get_the_permalink($post->ID).'" class="more_item_btn">Read More <i class="fa fa-angle-right"></i></a>
                                        </div>
                                     </div>
                                  </div>';
                        } ?>
                    </div>
                </div>
            </div>

            <!-- Usable to "Read all post" or "See all product" Button with arrow -->
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="more_btns_area">
                        <a href="<?php echo get_home_url();?>/post-creation" class="more_item_btn">Submit a Post <i class="fa fa-angle-right"></i></a>
                        <a href="" class="more_item_btn">View All Posts <i class="fa fa-angle-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--end article_carousel section-->
 
    <!--Start quote_carousel section-->
    <section class="modules quote_carousel text-center">
        <div class="container">

            <div class="row">
                <!--warp it to curosle item-->
                <div class="col-md-12">
                    <h1>Here's What Our Customers Think!</h1>
                </div>
            </div>

            <div id="quote-carousel-generic" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators">
                    <li data-target="#quote-carousel-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#quote-carousel-generic" data-slide-to="1"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <!-- Style should define from stylesheet-->
                    <div class="item active">
                        <div class="carousel-caption">
                            <p>
                                A healthy wellness experience is being balanced. I have found that Hemp Extract is good for my overall well being.  I’m calm. I am taking better care of myself so I strive to have a healthier lifestyle.
                                <span>
                                    Terry Donahue
                                </span>
                            </p>

                        </div>
                    </div>
                    <!-- Style should define from stylesheet-->
                    <div class="item">
                        <div class="carousel-caption">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscipit volutpat nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscipit volutpat nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscipit volutpat nulla.
                                <span>
                                    Lorem ipsum dolor sit amet
                                </span>
                            </p>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!--End quote_carousel section-->

<?php get_footer(); ?>