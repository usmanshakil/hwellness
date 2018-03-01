<?php

/*
Template Name:cart
*/

get_header('inner');

?>

<div class="container">
	<?php echo do_shortcode('[woocommerce_cart]'); ?>
</div>


<?php get_footer();?>