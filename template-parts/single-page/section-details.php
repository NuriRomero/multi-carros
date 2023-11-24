<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Multi_Carros
 */
?>


<!--====== Start Listing Details section ======-->
<section class="listing-details-section pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="listing-details-wrapper listing-details-wrapper-two">
                    <div class="listing-info-area mb-30 wow fadeInUp">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="listing-info-content">
                                    <h3 class="title"><?php the_title(); ?></h3>
                                    <div class="listing-meta">
                                        <ul>
                                            <?php echo $location = get_post_meta( get_the_ID(), 'formatted_address', true );?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <i class="ti-location-arrow">
                                    <?php echo ! empty( $terms = wp_get_post_terms( get_the_ID(), 'condition' ) ) ? esc_html( $terms[0]->name ) : 'Condicion no especificada'; ?>
                                </i>

                                <a href="listing-grid.html" class="icon-btn">
                                    <i class="ti-tag">
                                        <?php echo ! empty( $terms = wp_get_post_terms( get_the_ID(), 'brand' ) ) ? esc_html( $terms[0]->name ) : 'Marca no especificada'; ?>
                                    </i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="listing-thumbnail mb-30 wow fadeInUp">
                        <?php
                            $image_url = get_the_post_thumbnail_url( get_the_ID(), 'car_size_photo' );
                        if ( $image_url ) {
                            echo '<img src="' . esc_url( $image_url ) . '" href="' . esc_url( $image_url ) . '" class="img-fluid img-popup" alt="' . esc_attr( get_the_title() ) . '">';
                        }
                        ?>
                    </div>
                    <div class="listing-gallery-box mb-30 wow fadeInUp">
                        <h4 class="title">Galería de fotos</h4>
                        <div class="gallery-slider-one">
                            <?php
                            $galeria = get_post_meta( get_the_ID(), 'main_information_metabox_multiples_fotos', true );
                            if ( ! empty( $galeria ) ) {
                                foreach ( $galeria as $id => $imagen ) {
                                    if ( $imagen ) {
                                        echo '<a href="' . esc_url( $imagen ) . '" class="gallery-item img-popup">';
                                        echo wp_get_attachment_image( $id, 'galery_carousel', false, array( 'class' => 'img-fluid' ) );
                                        echo '</a>';
                                    }
                                }
                            } 
							?>
                        </div>
                    </div>
                    <div class="listing-content mb-30 wow fadeInUp">
                        <div class="description-wrapper mb-45">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="description-tabs">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab"
                                                    href="#description">Descripcion</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#reviews">Preguntas
                                                    Frecuentes</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content mt-30">
                                        <div id="description" class="tab-pane fade show active">
                                            <div class="descripcion-content-box">
                                                <p> <?php echo get_post_meta( get_the_ID(), 'main_information_metabox_descripcion', true ); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div id="reviews" class="tab-pane fade">
                                            <div class="products-review-wrapper mb-25">
                                                <div class="products-review-area mb-45">
                                                    <h4 class="title">Preguntas Frecuentes</h4>
                                                    <ul class="review-list">
                                                        <li class="review">
                                                            <div class="review-content">
                                                                <h4>Pregunta:
                                                                    <?php echo get_post_meta( get_the_ID(), 'main_information_metabox_pregunta', true ); ?>
                                                                </h4>
                                                                <p>Respuesta:
                                                                    <?php echo get_post_meta( get_the_ID(), 'main_information_metabox_respuesta', true ); ?>
                                                                </p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="icon-box icon-box-one">
                                    <div class="icon">
                                        <i class="ti-credit-card"></i>
                                    </div>
                                    <div class="info">
                                        <h6>Numero de bolsas de Aire:
                                            <?php echo get_post_meta( get_the_ID(), 'main_information_metabox_bolsas', true ); ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="icon-box icon-box-one">
                                    <div class="icon">
                                        <i class="ti-paint-bucket"></i>
                                    </div>
                                    <div class="info">
                                        <h6>Kilometraje:
                                            <?php echo get_post_meta( get_the_ID(), 'main_information_metabox_kilometraje', true ); ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="icon-box icon-box-one">
                                    <div class="icon">
                                        <i class="ti-rss-alt"></i>
                                    </div>
                                    <div class="info">
                                        <h6>Transmision:
                                            <?php
												// Obtener el valor del campo personalizado 'Modelo'
												echo get_post_meta( get_the_ID(), 'main_information_metabox_transmision', true );

												?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="icon-box icon-box-one">
                                    <div class="icon">
                                        <i class="ti-trash"></i>
                                    </div>
                                    <div class="info">
                                        <h6>Tipo de Auto
                                            <?php
                                            $post_id = get_the_ID();
                                            $terms = wp_get_post_terms( $post_id, 'type_car' );
                                            if ( ! empty( $terms ) ) {

                                                foreach ( $terms as $term ) {
                                                    echo esc_html( $term->name );
                                                }
                                            } else {
                                                echo 'Combustible no especificado';
                                            }
											?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="icon-box icon-box-one">
                                    <div class="icon">
                                        <i class="ti-car"></i>
                                    </div>
                                    <div class="info">
                                        <h6>Combustible:
                                            <?php
                                            $post_id = get_the_ID();
                                            $terms   = wp_get_post_terms( $post_id, 'fuel' );
                                            if ( ! empty( $terms ) ) {

                                                foreach ( $terms as $term ) {
                                                    echo esc_html( $term->name );
                                                }
                                            } else {
                                                echo 'Combustible no especificado';
                                            }
                                            ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="icon-box icon-box-one">
                                    <div class="icon">
                                        <i class="ti-credit-card"></i>
                                    </div>
                                    <div class="info">
                                        <h6>Num.Puertas:
                                            <?php echo get_post_meta( get_the_ID(), 'main_information_metabox_puertas', true ); ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="listing-tag-box mb-30 wow fadeInUp">
                        <h4 class="title">Amenidades</h4>
                        <?php
                        // Obtén los términos de la taxonomía 'amenidades' asociados a este auto
                        $amenidades = get_the_terms( get_the_ID(), 'amenidades' );
                        if ( ! empty( $amenidades ) && ! is_wp_error( $amenidades ) ) {
                            foreach ( $amenidades as $amenidad ) {
                                echo '<a href="' . esc_url( get_term_link( $amenidad ) ) . '">' . esc_html( $amenidad->name ) . '</a>';
                            }
                        } else {
                            echo '<p>No se encontraron amenidades para este auto.</p>';
                        }
                        ?>
                    </div>

                </div>
                <div class="releted-listing-area wow fadeInUp">
                    <h3 class="title mb-20">Autos similares</h3>
                    <div class="releted-listing-slider-one">
                        <?php
                        $terms = wp_get_post_terms( get_the_ID(), 'type_car' );
                        if ( ! empty( $terms ) ) {
                            $type_car = $terms[0]->slug;
                            $args = array(
                                'post_type'      => 'cars', 
                                'posts_per_page' => 3, 
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'type_car',
                                        'field'    => 'slug',
                                        'terms'    => $type_car,
                                    ),
                                ),
                                'post__not_in'   => array( get_the_ID() ), // Excluir el auto actual
                            );
                            $related_cars = new WP_Query( $args );
                            while ( $related_cars->have_posts() ) :
                                $related_cars->the_post();
                        ?>
                        <div class="col-md-12 col-sm-12">
                            <div class="listing-item listing-grid-item-two mb-30 wow fadeInUp">
                                <div class="listing-thumbnail">
                                    <?php the_post_thumbnail( get_the_ID(),'car_size_photo');?>
                                    <span class="featured-btn">
                                        <?php echo ! empty( $terms = wp_get_post_terms( get_the_ID(), 'condition' ) ) ? esc_html( $terms[0]->name ) : 'Condicion no especificada'; ?>
                                    </span>
                                </div>
                                <div class="listing-content">
                                    <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="listing-meta">
                                        <ul>
                                            <li><span><i
                                                        class="ti-location-pin"></i><?php echo "Ciudad: ". get_post_meta( get_the_ID(), 'administrative_area_level_1', true );?></span>
                                            </li>
                                            <span class="price"
                                                style="display: block;font-weight: 600;color: #0d0d0d;margin-bottom: 15px;">
                                                Precio:
                                                <?php echo get_post_meta( get_the_ID(), 'main_information_metabox_precio', true ); ?>
                                            </span>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-widget-area">
                    <div class="widget contact-info-widget mb-50 wow fadeInUp">
                        <div class="contact-info-widget-wrap">
                            <div class="contact-map">
                                <?php
								$location = get_post_meta( get_the_ID(), 'main_information_metabox_ciudad', true );
								?>
                                <iframe
                                    src="https://maps.google.com/maps?q=<?php echo $location['latitude']; ?>,<?php echo $location['longitude']; ?>&ie=UTF8&iwloc=&output=embed"></iframe>
                                <a href="#" class="support-icon"><i class="flaticon-headphone"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== End Listing Details section ======-->