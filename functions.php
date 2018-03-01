<?php
//-- Load Custom CSS --//
function load_scripts() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('style-css', get_template_directory_uri() . '/css/style.css');
	  wp_enqueue_style('owl-css', get_template_directory_uri() . '/css/owl.carousel.css');
	  wp_enqueue_style('owl-theme-css', get_template_directory_uri() . '/css/owl.theme.default.css');
    wp_enqueue_style('custom-css', get_template_directory_uri() . '/css/custom.css');
}
add_action('wp_enqueue_scripts', 'load_scripts', 12);
//-- Load Custom JS --//
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 10);
function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null);
    wp_enqueue_script('jquery');

    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', false, null);
    wp_enqueue_script('scripts-js', get_template_directory_uri() . '/js/script.js', false, null);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', false, null);
    wp_enqueue_script('owl-js', get_template_directory_uri() . '/js/owl.carousel.js', false, null);
}

//-- Register theme menus --//
function register_my_menus() {
    register_nav_menus(
        array( 'main-menu' => __( 'Public Menu' ) )
    );
}
add_action( 'init', 'register_my_menus' );

// woocommerce ajax cart
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start(); ?>
    <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    <?php $fragments['a.cart-customlocation'] = ob_get_clean();
    return $fragments;
}
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
// function woocommerce_template_product_additional_info() {
//   woocommerce_get_template( 'single-product/tabs/additional-information.php' );
// }
//  add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_additional_info', 20 );
 add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;

}

// sidebar
register_sidebar( array(
    'name' => 'Menu',
    'id' => 'menu',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',

) );


register_sidebar( array(
    'name' => 'Our Process',
    'id' => 'our-process',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',

) );

register_sidebar( array(
    'name' => 'FAQs',
    'id' => 'faq',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',

) );



register_sidebar( array(
    'name' => 'Contact Us',
    'id' => 'contact-us',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',

) );


register_sidebar( array(
    'name' => 'Follow Us',
    'id' => 'follow-us',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',

) );

register_sidebar( array(
    'name' => 'Logo',
    'id' => 'logo',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',

) );

register_sidebar( array(
    'name' => 'Description',
    'id' => 'description',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',

) );

register_sidebar( array(
    'name' => 'CopyRight',
    'id' => 'copyright',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',

) );
register_sidebar( array(
    'name' => 'Blog',
    'id' => 'blog',
    'description' => 'Appears in the blog',
    'before_widget' => '<div class="sidebar_item">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
) );

register_sidebar( array(
    'name' => 'Single Blog',
    'id' => 'single-blog',
    'description' => 'Appears in the single blog article',
    'before_widget' => '<div class="sidebar_item">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
) );
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

function Generate_Featured_Image( $postImage, $postId ){
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($image_url);
    $filename = basename($image_url);
    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
    else                                    $file = $upload_dir['basedir'] . '/' . $filename;
    file_put_contents($file, $image_data);

    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
   
   set_post_thumbnail( $post_id, $attach_id );
}

function createGuestPost(){

$postTtile = $_REQUEST['post-name'];
$postContent = $_REQUEST['post-content'];
$postImage = $_REQUEST['post-image'];
    // Create post object
$my_post = array(
  'post_title'    => $postTtile,
  'post_content'  => $postContent,
  'post_status'   => 'draft',
  'post_author'   => 1,
  'post_type' => 'guest_posts'
);
 
// Insert the post into the database
$postId = wp_insert_post( $my_post );
Generate_Featured_Image($postImage , $postId);

}
add_action( 'wp_ajax_createGuestPost', 'createGuestPost' );
add_action( 'wp_ajax_nopriv_createGuestPost', 'createGuestPost' );
// set limit of related product
function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	return $args;
}
// remove reating form product
 remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
