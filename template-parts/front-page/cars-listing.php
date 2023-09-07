<?php
/**
 * Template part for displaying the hero banner in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Multi_Carros
 */

$cars = get_cars( 10 );

if( $cars->have_posts() ):
?>
<!--====== Start Listing Section POST======-->
<section class="listing-grid-area pt-115 pb-75">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-75 wow fadeInUp">
                    <h2>Agregados Recientemente</h2>
                </div>
            </div>
        </div>
        <div class="row listing-flex-container">
            <?php while( $cars->have_posts() ): $cars->the_post(); ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="listing-item listing-grid-one mb-45 wow fadeInUp" dta-wow-delay="10ms">
                    <div class="listing-thumbnail">
                        <?php the_post_thumbnail();?>
                        <span class="featured-btn"></i><?php echo get_post_meta(get_the_ID(),'Estado',true); ?></span>
                        </li></span>
                    </div>
                    <div class="listing-content">
                        <h3 class="title">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                            $marca = get_post_meta(get_the_ID(),'Marca',true);
                            $modelo = get_post_meta(get_the_ID(),'Modelo',true);
                            $anio = get_post_meta(get_the_ID(),'Año',true);
                            echo $marca.' '.$modelo . ' ' . $anio;
                            ?>
                            </a>
                        </h3>
                        <div class="listing-meta">
                            <ul>
                                <li><span><i
                                            class="ti-location-pin"></i><?php echo get_post_meta(get_the_ID(),'Ciudad',true); ?></span>
                                </li>
                                <li><span><i class="ti-heart"></i><a href="#">Guardar</a></span></li>
                            </ul>
                        </div>
                        <span class="price">Precio: <?php echo get_post_meta(get_the_ID(),'Precio',true); ?></span>
                    </div>
                    <div class="listing-meta">

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
?>
