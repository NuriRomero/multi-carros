<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Multi_Carros
 */

get_header();
?>

	<main id="primary" class="site-main">

		

	</main>
 <!--====== Start Hero Section ======-->
 <section class="hero-area">

            <div class="hero-wrapper-one">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="hero-content">
                                <h1 class="wow fadeInUp" wow-data-delay="30mss">Dream Explore
                                    Discover</h1>
                                <h3 class="wow fadeInDown" wow-data-delay="50ms">People Don’t Take,Trips Take People</h3>
                                <div class="hero-search-wrapper wow fadeInUp" wow-data-delay="70ms">
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-5 col-md-4 col-sm-12">
                                                <div class="form_group">
                                                    <input type="search" class="form_control" placeholder="Search By Category" name="search" required>
                                                    <i class="ti-ink-pen"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                <div class="form_group">
                                                    <input type="text" class="form_control" placeholder="Location" name="location" required>
                                                    <i class="ti-location-pin"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <div class="form_group">
                                                    <button class="main-btn icon-btn">Search Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <p class="tags"><span>Popular:</span><a href="#">Saloon</a>,<a href="#">Restaurant</a>,<a href="#">Game</a>,<a href="#">Counter</a>,<a href="#">Train Station</a>,<a href="#">Parking</a>,<a href="#">Shooping</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!--====== Start Category Section ======-->
<section class="category-area">
            <div class="container">
                <div class="category-wrapper-one wow fadeInDown">
                    <div class="row no-gutters">
                        <div class="col-lg-2 col-md-4 category-column">
                            <div class="category-item category-item-one">
                                <div class="info text-center">
                                    <div class="icon">
                                        <i class="flaticon-government"></i>
                                    </div>
                                    <h6>Museums</h6>
                                </div>
                                <a href="index.html" class="category-btn"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 category-column">
                            <div class="category-item category-item-one">
                                <div class="info text-center">
                                    <div class="icon">
                                        <i class="flaticon-serving-dish"></i>
                                    </div>
                                    <h6>Restaurant</h6>
                                </div>
                                <a href="index.html" class="category-btn"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 category-column">
                            <div class="category-item category-item-one">
                                <div class="info text-center">
                                    <div class="icon">
                                        <i class="flaticon-game-controller"></i>
                                    </div>
                                    <h6>Game Field</h6>
                                </div>
                                <a href="index.html" class="category-btn"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 category-column">
                            <div class="category-item category-item-one">
                                <div class="info text-center">
                                    <div class="icon">
                                        <i class="flaticon-suitcase"></i>
                                    </div>
                                    <h6>Job & Feed</h6>
                                </div>
                                <a href="index.html" class="category-btn"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 category-column">
                            <div class="category-item category-item-one">
                                <div class="info text-center">
                                    <div class="icon">
                                        <i class="flaticon-gift-box"></i>
                                    </div>
                                    <h6>Party Center</h6>
                                </div>
                                <a href="index.html" class="category-btn"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 category-column">
                            <div class="category-item category-item-one">
                                <div class="info text-center">
                                    <div class="icon">
                                        <i class="flaticon-dumbbell"></i>
                                    </div>
                                    <h6>Fitness Zone</h6>
                                </div>
                                <a href="index.html" class="category-btn"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End Category Section ======-->
		
<?php

get_sidebar();
get_footer();
?>
