<?php
/**
 * Template part for displaying the hero banner in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Multi_Carros
 */

$cars = get_cars( 1 );

if( $cars->have_posts() ):
?>
<!--====== Start Listing Section POST======-->
<section class="listing-grid-area pt-115 pb-75">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-75 wow fadeInUp">
                    <span class="sub-title">Featured Cars</span>
                    <h2>Explore Our Last Cars</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php while( $cars->have_posts() ): $cars->the_post(); ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="listing-item listing-grid-one mb-45 wow fadeInUp" dta-wow-delay="10ms">
                    <div class="listing-thumbnail">
                        <?php the_post_thumbnail();?>
                        <span class="featured-btn">Featured</span>
                        <div class="thumbnail-meta d-flex justify-content-between align-items-center">
                            <div class="meta-icon-title d-flex align-items-center">
                                <div class="icon">
                                    <i class="flaticon-chef"></i>
                                </div>
                                <div class="title">
                                    <h6>Restaurant</h6>
                                </div>
                            </div>
                            <span class="status st-open">Open</span>
                        </div>
                    </div>
                    <div class="listing-content">
                        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="ratings">
                            <ul class="ratings ratings-three">
                                <li class="star"><i class="flaticon-star-1"></i></li>
                                <li class="star"><i class="flaticon-star-1"></i></li>
                                <li class="star"><i class="flaticon-star-1"></i></li>
                                <li class="star"><i class="flaticon-star-1"></i></li>
                                <li class="star"><i class="flaticon-star-1"></i></li>
                                <li><span><a href="#">(02 Reviews)</a></span></li>
                            </ul>
                        </div>
                        <span class="price">$05.00 - $80.00</span>
                        <span class="phone-meta"><i class="ti-tablet"></i><a href="tel:+982653652-05">+98 (265) 3652 - 05</a></span>
                        <div class="listing-meta">
                            <ul>
                                <li><span><i class="ti-location-pin"></i>California, USA</span></li>
                                <li><span><i class="ti-heart"></i><a href="#">Save</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<!--====== End Listing Section ======-->
<?php
else:
    echo '<h4> no hay carros que listar </h4>';
endif;

wp_reset_postdata();