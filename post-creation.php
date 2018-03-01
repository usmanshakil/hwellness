<?php

/*

Template Name:Submit post

*/

get_header();

?>
    <section class="modules page_heading">
        <div class="container">
            <!-- Use from here if you want only want simple heading with stripe -->
            <div class="row">
                <div class="col-md-12">
                    <div class="area_title">
                        <h1>Submit Your Post</h1>
                    </div>
                </div>
            </div><!-- And end here -->
        </div>
    </section>
    <!-- end page heading -->
    <section class="modules contact"><!--Start content section-->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="address">
                        <span> <i class="fa fa-clipboard" aria-hidden="true"></i></span>
                        <h4> Create your post. Your post will be reviewed by admin before publishing to the Healthy Wellness.</h4>
                    </div>
                </div>
                <div class="col-md-8">
                    <form class="create-post form-horizontal">
                        <!--  Form Element  -->
                            <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                              <div class="col-md-12">
                              <input id="post-title" name="" type="text" placeholder="Enter your post title" class="form-control input-md">                                
                              </div>
                            </div>
                            <!-- Textarea -->
                            <div class="form-group">
                              <div class="col-md-12">                     
                                <textarea class="form-control" id="textarea" class="postcontent" name="textarea" rows="8" cols="50" placeholder="Enter your post content"></textarea>
                              </div>
                            </div>
                            <!-- File Button --> 
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="featured-image">Add Featured Image</label>
                              <div class="col-md-4">
                                <input id="featured-image" name="featured-image" class="input-file" type="file">
                              </div>
                            </div>
                            <!-- Button -->
                            <div class="form-group">
                              <div class="col-md-6">
                                <button id="submit" name="submit" class="btn btn-sub">Submit Post</button>
                              </div>
                            </div>

                            </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section><!--Start content section--> 
<?php get_footer(); ?>