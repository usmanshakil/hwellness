<?php
/*
Template Name: Wholesaler Info
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
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <?php
                gravity_form( "Wholesaler Signup", $display_title = false, $display_description = true, $display_inactive = false, $field_values = null, $ajax = true, $tabindex, $echo = true );
                ?>
            </div>
            <div class="col-md-4">
                <article class="post_item">
  
                    <div class="post_content">
                        <p><?php the_content(); ?></p>
                    </div>
                </article>
                
               
            </div>
            <div class="col-md-1"></div>

            
            <?php endwhile; endif; ?>
        </div>
    </div>

<?php get_footer();?>