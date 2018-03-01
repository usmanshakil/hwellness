<?php
/*
Template Name:About
*/
get_header('inner');
?>

    <section class="modules page_heading">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="area_title" style="color:#FFF;">
                        <h4 style="text-align: center; margin-top:0;">We are a small Texas-based</h4>
<h3 style="text-align: center; font-size:2.4em; font-weight:bold;">CBD and Health Products company</h3>
<h4 style="text-align: center; ">formed in 2016.</h4>

                    </div>
                </div>
            </div>
            <!-- And end here -->
        </div>
    </section>
    <!--Start Signle Post area-->
    <section class="modules">
        <div class="container">

            <div class="row ">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); /** just post lop*mian div pr lop ***/
                $src = wp_get_attachment_image_src(get_post_thumbnail_id(), false, '');
                $count_comment=wp_count_comments(get_the_ID());
            ?>
                <div class="col-md-2">
                </div>
                    <div class="col-md-8">
                        <article class="post_item">

                            <div class="post_content">
                                <p>
                                    <?php the_content(); ?>
                                </p>
                            </div>
                        </article>


                        <?php
                    /*** just post lop end mian div pr lop * div k ander**/
                    endwhile; else : ?>
                            <p>
                                <?php _e( 'Sorry, no posts matched your criteria.' ); ?> </p>
                            <?php endif;
                    ?>
                    </div>
                    <div class="col-md-2">

                    </div>


                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="biotext" style="float:left;">
                            <h2>- Kimberly</h2>
                            <h3>Founder &amp; CBD User</h3>
                            
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
    </section>
    <?php get_footer();?>
