<!--====== Start Listing Details section ======-->
<section class="listing-details-section pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="listing-details-wrapper listing-details-wrapper-one">
                    <div class="listing-content mb-50 wow fadeInUp">
                        <h2 class="title"><?php
                            $modelo = get_post_meta(get_the_ID(), 'main_information_metabox_modelo', true);
                            $anio = get_post_meta(get_the_ID(),'main_information_metabox_año_modelo',true);
                            $precio = get_post_meta(get_the_ID(),'main_information_metabox_año_precio',true);
                            $post_id = get_the_ID();
                            // Obtener los términos seleccionados en la taxonomía 'brand' para esta entrada
                            $terms = wp_get_post_terms($post_id, 'brand');
                            // Verificar si se encontraron términos y mostrarlos si existen
                            if (!empty($terms)) {
                                
                                foreach ($terms as $term) {
                                    echo esc_html($term->name) . ' '.$modelo.' '. $anio;
                                }
                            } else {
                                echo 'Marca no especificada';
                            }
                            ?>
                        </h2>
                        <br>
                        <?php the_post_thumbnail();?>
                        <br>
                        </br>
                        <p style="font-weight: bold; font-size: 24px;"><?php echo get_post_meta(get_the_ID(),'main_information_metabox_descripcion',true);?></p>
                        <p style="font-weight: bold; font-size: 24px;"><?php echo '$'.get_post_meta(get_the_ID(),'main_information_metabox_precio',true).' MXN';?></p>
                    </div>
                    <div class="listing-features-box mb-50 wow fadeInUp">
                        <h4 class="title">Caracteristicas</h4>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="icon-box icon-box-one">
                                    <div class="icon">
                                        <i class="ti-credit-card"></i>
                                    </div>
                                    <div class="info">
                                        <h6> Num.Puertas: <?php echo get_post_meta(get_the_ID(),'main_information_metabox_puertas',true);?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="icon-box icon-box-one">
                                    <div class="icon">
                                        <i class="ti-paint-bucket"></i>
                                    </div>
                                    <div class="info">
                                    <h6> Combustible: <?php  
                                    $post_id = get_the_ID();
                                    // Obtener los términos seleccionados en la taxonomía 'brand' para esta entrada
                                    $terms = wp_get_post_terms($post_id, 'fuel');
                                    // Verificar si se encontraron términos y mostrarlos si existen
                                    if (!empty($terms)) {
                                        
                                        foreach ($terms as $term) {
                                            echo esc_html($term->name) ;
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
                                        <i class="ti-rss-alt"></i>
                                    </div>
                                    <div class="info">
                                    <h6> Tipo de Auto
                                    <?php $post_id = get_the_ID();
                                    // Obtener los términos seleccionados en la taxonomía 'brand' para esta entrada
                                    $terms = wp_get_post_terms($post_id, 'type_car');
                                    // Verificar si se encontraron términos y mostrarlos si existen
                                    if (!empty($terms)) {
                                        
                                        foreach ($terms as $term) {
                                            echo esc_html($term->name) ;
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
                                        <i class="ti-trash"></i>
                                    </div>
                                    <div class="info">
                                        
                                        <h6>Transmision: <?php // Obtener el ID de la entrada actual
                                        // Obtener el valor del campo personalizado 'Modelo'
                                        echo get_post_meta(get_the_ID(), 'main_information_metabox_transmision', true);

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
                                        <h6> Num.Bolsas de Aire: <?php echo get_post_meta(get_the_ID(),'main_information_metabox_bolsas',true);?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="icon-box icon-box-one">
                                    <div class="icon">
                                        <i class="ti-credit-card"></i>
                                    </div>
                                    <div class="info">
                                        <h6> Kilometraje: <?php echo get_post_meta(get_the_ID(),'main_information_metabox_kilometraje',true);?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        // Obtener el ID de la entrada actual
                        $post_id = get_the_ID();

                        // Obtener los valores del campo personalizado 'Multiples fotos'
                        $multiples_fotos = get_post_meta($post_id, 'main_information_metabox_multiples_fotos', false);

                        if (!empty($multiples_fotos)) {
                            echo '<div class="listing-gallery-box wow fadeInUp">';
                            echo '<h4 class="title">Galeria de fotos</h4>';
                            echo '<div class="row">';

                            foreach ($multiples_fotos as $imagen) {
                                echo '<div class="col-md-6 col-sm-12">';
                                echo '<div class="gallery-item mb-30">';
                                echo '<a href="' . esc_url($imagen) . '" class="img-popup"><img src="' . esc_url($imagen) . '" alt="gallery image"></a>';
                                echo '</div>';
                                var_dump($multiples_fotos); // Imprimirá el contenido de $multiples_fotos

                                echo '</div>';
                            }

                            echo '</div>';
                            echo '</div>';
                        } else {
                            echo 'No hay imágenes disponibles.';
                        }
                    ?>

                    <!-- PREGUNTA -->
                    <div class="listing-review-form mb-30 wow fadeInUp">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="title">Escribir una pregunta</h4>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form_group">
                                        <textarea class="form_control" placeholder="Escribe la pregunta" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_group">
                                        <input type="text" class="form_control" placeholder="Mi nombre" name="name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_group">
                                        <input type="email" class="form_control" placeholder="Correo Electronico" name="email" required>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="form_group">
                                        <button class="main-btn icon-btn">Enviar pregunta</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-widget-area">
                    <div class="widget contact-info-widget mb-50 wow fadeInUp">
                        <div class="contact-info-widget-wrap">
                            <div class="contact-map">
                                <iframe src="https://maps.google.com/maps?q=new%20york&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
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