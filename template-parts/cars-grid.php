<?php

?>

<div class="col-12">
    <div class="listing-item listing-grid-item-two mb-30 wow fadeInUp">
        <div class="listing-thumbnail">
            <?php
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'car_size_photo');
            if ($image_url) {
                echo '<img src="' . esc_url($image_url) . '" href="' . esc_url($image_url) . '" class="img-fluid img-popup" alt="' . esc_attr(get_the_title()) . '">';
            } else {
                echo 'No se ha proporcionado una imagen válida.';
            }
            ?>
            <span class="featured-btn"> <?php echo !empty($terms = wp_get_post_terms(get_the_ID(), 'condition')) ? esc_html($terms[0]->name) : 'Condicion no especificada'; ?>
        </span>
        </div>
        <div class="listing-content">
            <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
            <div class="listing-meta">
                <ul>
                    <li><span><i class="ti-location-pin"></i>
                    <?php 
                        $location_data = get_post_meta(get_the_ID(), 'main_information_metabox_ciudad', true);

                        if (!empty($location_data) && is_array($location_data)) {
                            if (isset($location_data['longitude']) && isset($location_data['latitude'])) {
                                $longitude = $location_data['longitude'];
                                $latitude = $location_data['latitude'];
                                echo 'Longitud: ' . $longitude;
                                echo 'Latitud: ' . $latitude;
                            } else {
                                echo 'Datos de ubicación incompletos';
                            }
                        } else {
                            echo 'Datos de ubicación no disponibles';
                        }

                    ?>
                    </span></li>
                </ul>
            </div>
            <span class="price" style="display: block;font-weight: 600;color: #0d0d0d;margin-bottom: 15px;">
                Precio: <?php echo get_post_meta(get_the_ID(),'Precio',true); ?>
            </span>
        </div>
    </div>
</div>
