<?php
/*
Template Name: Gust Posts
*/
get_header();

?>
    <!--end header container-->
    <!--
        Start page heading. Page Heading modules is much like title with green stripe but different background and forground.
    -->
    <section class="modules page_heading">
        <div class="container">
            <!-- Use from here if you want only want simple heading with stripe -->
            <div class="row">
                <div class="col-md-12">
                    <div class="area_title">
                        <h1>Wellness articles</h1>
                    </div>
                </div>
            </div><!-- And end here -->
        </div>
    </section>
    <!-- end page heading -->

    <!--Start Blog page posts-->
    <section class="modules blog_posts">
        <div class="container">
            <div class="row">
                <div class="col-md-9 blog_posts_area">
                    <?php
                        $count=1;
                        if(have_posts()):query_posts(
                        array('post_type' => 'guest_posts','posts_per_page' =>6
                        ,'paged'=> $paged ,'orderby' => 'date','order' => 'ASC'
                        ));
                        while(have_posts()):the_post();
                        $src = wp_get_attachment_image_src(get_post_thumbnail_id(), false, '');
                        $count_comment=wp_count_comments(get_the_ID());
                    ?>
                    <article class="col-md-6 post_item">
                     <?php the_post_thumbnail(array(400,400), array('class' => 'img-responsive aligncenter')); ?>
                    <?php $title = get_the_title(get_the_ID());
                    $string = strip_tags($title);
			if (strlen($string) > 35) {
			    $stringCut = substr($string, 0, 35);
			    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
			} ?>
                        <a class="archive-title-link" href="<?php echo get_the_permalink(); ?>"><?php echo $string; ?></a>
                        <div class="meta_info">
                            <?php the_date(); ?>
                            <?php $posttags = get_the_tags();
                            if ($posttags) { ?>
                                <span>|</span>
                                <?php foreach($posttags as $tag) {
                                    echo '<a href="">'.$tag->name.',</a> ';
                                }
                            } ?>
                        </div>
                       
                        <div class="post_content">
                        <?php $content = get_the_content(); ?>
                        <p><?php echo wp_trim_words($content, 55, '...'); ?></p>
                        <a class="more_btn" href="<?php the_permalink(); ?>">Continue Reading <i class="fa fa-angle-right"></i></a>
                    </article>
                    <?php
                        $count++;
                        endwhile;
                        endif; // end of the loop.
                    ?>
                    <div class="clear"></div>
                    <div class="posts_navigate more_btns_area">
                        <div class="more_btn"><?php previous_posts_link( '<i class="fa fa-angle-left"></i> Older Posts' ); ?></div>
                        <div class="more_btn"><?php next_posts_link('Next Posts <i class="fa fa-angle-right"></i>', ''); ?></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!--Side bar is a saperated modules whiche include in blog page and other pages -->                    
                    <div class="modules sidebar">
                    	<?php dynamic_sidebar( 'blog' ); ?>                        
                        <div class="sidebar_item">
                            <div class="product_item">
                                <img class="img-responsive" src="http://healthywellness-new.stage.jc.marketing/wp-content/uploads/2017/12/features-product-2.jpg">
                                <div class="product_details">
                                    <h4><?php the_title(); ?></h4>
                                    <span>$xx.xx</span>
                                    <a href="" class="buy_now btn btn-default">Buy Now</a>
                                </div>
                            </div>
                            <div class="product_item">
                                <img class="img-responsive" src="http://healthywellness-new.stage.jc.marketing/wp-content/uploads/2017/12/features-product-2.jpg">
                                <div class="product_details">
                                    <h4><?php the_title(); ?></h4>
                                    <span>$xx.xx</span>
                                    <a href="" class="buy_now btn btn-default">Buy Now</a>
                                </div>
                            </div>
                            <div class="product_item">
                                <img class="img-responsive" src="http://healthywellness-new.stage.jc.marketing/wp-content/uploads/2017/12/features-product-2.jpg">
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
    <!--end Blog page posts-->    

<?php  get_footer();  ?>