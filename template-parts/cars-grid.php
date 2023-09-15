<?php

?>

<div class="col-12">
    <div class="listing-item listing-grid-item-two mb-30 wow fadeInUp">
        <div class="listing-thumbnail">
            <?php the_post_thumbnail(); ?>
            <span class="featured-btn"> <?php echo get_post_meta(get_the_ID(),'Estado',true); ?></span>
        </div>
        <div class="listing-content">
            <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
            <div class="listing-meta">
                <ul>
                    <li><span><i class="ti-location-pin"></i>
                    <?php // Verifica si hay datos válidos
                     // Obtén los datos del campo pw_map
                        $location_data = get_post_meta(get_the_ID(), 'main_information_metabox_ciudad', true);

                        // Verifica si hay datos válidos
                        if (!empty($location_data) && is_array($location_data)) {
                            // Verifica si existen las claves 'longitude' y 'latitude'
                            if (isset($location_data['longitude']) && isset($location_data['latitude'])) {
                                $longitude = $location_data['longitude'];
                                $latitude = $location_data['latitude'];

                                // Ahora puedes utilizar $longitude y $latitude según tus necesidades
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
