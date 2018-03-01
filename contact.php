<?php
/*
Template Name:Contact
*/
get_header('inner');
?>

    <section class="modules page_heading">
        <div class="container">
            <!-- Use from here if you want only want simple heading with stripe -->
            <div class="row">
                <div class="col-md-12">
                    <div class="area_title">
                        <h1>Contact</h1>
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
                        <span> <i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        <h4> Please use the contact form to let us know how we can be of service. Or just give us a call anytime. We’d be happy to come visit your property and meet with you.</h4>
                    </div>
                </div>
                <div class="col-md-8">
                    <form class="form">
                        <!--  Form Element -->
                        <?php echo do_shortcode('[gravityform id="1" title="true" description="true"]'); ?>
                    </form>
                </div>
            </div>
            <div class="row">
                <!-- Map and Address -->
                <div class="col-md-12">
                    <div class="google-maps">
                        <iframe
                        width="100%"
                        height="450"
                        frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed/v1/place?key= AIzaSyDRH9X_NcOWXpk67p3RJIL9XpwVv4S77FQ
                        &q=4717+Fletcher+Ave,+Fort+Worth,+TX+76107,+USA">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section><!--Start content section--> 

    <!--end footer-->
<?php  get_footer();  ?>