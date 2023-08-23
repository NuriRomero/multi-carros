<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Multi_Carros
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'multi-carros' ); ?></a>

	<!--====== Header old
    
    
    ======-->
 

	<!--====== Start Header Section ======-->
	<header id= "masthead" class="header-area header-area-one site-header">
            <div class="header-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="top-social">
                                <ul class="social-link">
                                    <li><span>Follow us:</span></li>
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#"><i class="ti-dribbble"></i></a></li>
                                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="top-content text-center">
                                <p>We Have Special Offers Every <a href="index.html">Find your offer</a></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="top-right">
                                <ul class="d-flex">
                                    <li><a href="index.html"><i class="ti-search"></i><span>Search here</span></a></li>
                                    <!-- <li><a href="index.html"><i class="ti-heart"></i><span>Wishlist</span></a></li>
                                    <li><a href="index.html"><i class="ti-shopping-cart"></i><span>Cart</span></a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-navigation">
                <div class="container-fluid">
                    <div class="primary-menu">
                        <div class="row">
                            <div class="col-lg-2 col-5">
                                <div class="site-branding">
									<?php the_custom_logo() ?>
                                  
                                </div>
                            </div>
                            <div class="col-lg-6 col-2">
                                <div class="nav-menu">
                                    <div class="navbar-close"><i class="ti-close"></i></div>
                           
                                       
                                                <?php 
                                                //Displays a navigation menu
                                                wp_nav_menu( 
                                                    array(
                                                       // 'menu'				=> '', // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
                                                       //'menu_class'		=> '', // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                                                        'menu_id'			=> 'header-menu', // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                                                        'container'			=> 'nav', // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                                                        'container_class'	=> 'main-menu', // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
                                                        'container_id'		=> 'header-nav-menu', // (string) The ID that is applied to the container.
                                                        'theme_location'	=> 'primary-menu', // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
                                                    )
                                                );
                                                ?>
                                
                                </div>
                            </div>
                            <div class="col-lg-4 col-5">
                                <div class="header-right-nav">
                                    <ul class="d-flex align-items-center">
                                        <li class="user-btn"><a href="index.html" class="icon"><i class="flaticon-avatar"></i></a></li>
                                        <li class="hero-nav-btn"><a href="add-listing.html" class="main-btn icon-btn">Add Listing</a></li>
                                        <li class="nav-toggle-btn">
                                            <div class="navbar-toggler">
                                                <span></span><span></span><span></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--====== End Header Section ======-->
