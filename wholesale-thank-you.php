<?php
/*
Template Name: Wholesaler Thank You
*/
get_header('inner');

?>
<section class="modules page_heading">
    <div class="container">
        <!-- Use from here if you want only want simple heading with stripe -->
        <div class="row">
            <div class="col-md-12">
                <div class="area_title">
                    <h1>Become a Wholesale Customer</h1>
                </div>
            </div>
        </div>
        <!-- And end here -->
    </div>
</section>
<!--Start Signle Post area-->

    <div class="container">

        <div class="row">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); /** just post lop*mian div pr lop ***/
            ?>
            <div class="col-md-12">
                <?php the_content(); ?>
            </div>
            

            
            <?php endwhile; endif; ?>
        </div>
    </div>

<?php get_footer();?>