<?php get_header(); ?>
    <section class="modules page_heading">
        <div class="container">
            <!-- Use from here if you want only want simple heading with stripe -->
            <div class="row">
                <div class="col-md-12">
                    <div class="area_title">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
            </div><!-- And end here -->
        </div>
    </section>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <!--Start Signle Post area-->
    <section class="modules signle_post">
        <div class="container">



            <div class="row signle_posts_area">
                <div class="col-md-12">
                    <article class="post_item">
                        <div class="meta_info">
                            
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


                </div>


            </div>
        </div>
    </section>
<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>