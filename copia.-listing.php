<?php
/**
* Template part for displaying page content in page.php
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Multi_Carros
*/
printf( '<pre>%s</pre>', var_export( get_post_custom( get_the_ID(  ) ), true ) );
?>


<!--====== Start Listing Details section ======-->
<section class="listing-details-section pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="listing-details-wrapper listing-details-wrapper-one">
                    <div class="listing-content mb-50 wow fadeInUp">
                        <h2 class="title"><?php
                            the_title();
                            ?>
                        </h2>
                        <br>
                        <?php the_post_thumbnail( 'car_size_photo', array(
                            'class' => 'img-fluid img-popup',
                        ) );?>
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
                                        
                                        <h6>Transmision: <?php 
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
                    <div class="row">
                    <?php
                    $galeria = get_post_meta( get_the_ID(),'main_information_metabox_multiples_fotos' , true );
                    foreach ($galeria as $id => $imagen) {
                   
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="listing-item listing-grid-one mb-45 wow fadeInUp" data-wow-delay="10ms">
                            <div class="listing-thumbnail">
                            <?php echo wp_get_attachment_image( $id, 'medium',false, array(
                                'class' => 'img-fluid img-popup',
                            ) );
                                ?>
                            </div>
                            <div class="listing-content">
                            </div>
                        </div>
                    </div>
                
                    
                    <?php
                        # code...
                    }
                    ?>
                    <!-- PREGUNTA -->
                </div>
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
                                <?php $location =  get_post_meta(get_the_ID(),'main_information_metabox_ciudad',true);

                                ?>
                                <iframe src="https://maps.google.com/maps?q=<?php echo $location['latitude']?>,<?php echo $location['longitude']?>&ie=UTF8&iwloc=&output=embed"></iframe>
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