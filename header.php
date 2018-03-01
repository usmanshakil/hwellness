<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title(); ?></title>
        <script async="async" type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!--start header container-->
    <section class="modules header <?php if(!is_front_page()){ echo 'page'; } ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!--start header-->
                    <header>

                        <!-- CENTER LOGO -->
                        <nav class="navbar navbar-default logo_center" role="navigation">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="fa fa-bars"></i>
                                </button>
                            </div>
                            <a href="<?php echo get_home_url(); ?>" class="navbar-brand">
                                <?php if(is_home() || is_front_page()) {
                                    $logo = '/assets/images/HW_Logo copy.png';
                                } else {
                                    $logo = '/assets/images/logo.png';
                                } ?>
                                <img src="<?php echo get_template_directory_uri().$logo; ?>">
                            </a>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="navbar-collapse-1">

                                <?php $args = array(
                                    'menu' => 'main-menu',
                                    'menu_class' => 'nav navbar-nav navbar-left',
                                    'container' => ''
                                );
                                wp_nav_menu($args); ?>

                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="">Educate</a>
                                        <ul class="submenu">
                                    		<li><a href="<?php echo get_home_url();?>/blog">Wellness articles</a></li>
                                    		<li><a href="<?php echo get_home_url();?>/guest-posts">Guest Wellness Posts</a></li>
                                    	</ul>
                                    </li>
                                    <li><a href="<?php echo get_home_url();?>/contact/">Contact</a></li>
									<?php if(is_user_logged_in()) { ?> 
									<li><a href="<?php echo wp_logout_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>">Logout</a></li>
									<?php } else { ?>
									<li><a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>">Sign In</a></li>
									<?php } ?>
                                    
                                    <li><a href="<?php echo wc_get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a></li>
<!--                                    <li><a class="cart-customlocation" href="--><?php //echo wc_get_cart_url(); ?><!--" title="--><?php //_e( 'View your shopping cart' ); ?><!--">--><?php //echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?><!-- - --><?php //echo WC()->cart->get_cart_total(); ?><!--</a></li>-->
                                </ul>

                            </div><!-- /.navbar-collapse -->
                        </nav>

                    </header>
                    <!--end header-->

                </div>
            </div>
        </div>
    </section>
    <!--end header container-->