<?php
/*
Template Name:check out
*/
get_header('inner');

?>

<div class="container">
	<div class="check-out">
		<h1>Home Extract Products</h1>
	<?php echo do_shortcode('[woocommerce_checkout]'); ?>
	</div>
</div>

<?php get_footer(); ?>