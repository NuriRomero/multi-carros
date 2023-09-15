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
                                         
                                            <h3 class="title"><?php the_title();?></h3>
                                            <div class="listing-meta">
                                                <ul>
                                                    <li><span><i class="ti-location-pin"></i></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        
                                            <i class="ti-location-arrow">
                                                <?php $post_id = get_the_ID();
                                                    $terms = wp_get_post_terms($post_id, 'condition');
                                                    //Verificar si se encontraron términos y mostrarlos si existen
                                                    if (!empty($terms)) {
                                                                            
                                                        foreach ($terms as $term) {
                                                            $condicion = esc_html($term->name) ;
                                                            echo $condicion;
                                                        }
                                                    } else {
                                                            echo 'Condicion no especificada';
                                                            }
                                                ?>
                                            </i>

                                            <a href="listing-grid.html" class="icon-btn">
                                               <i class="ti-tag">
                                                <?php $post_id = get_the_ID();
                                                        $terms = wp_get_post_terms($post_id, 'brand');
                                                        //Verificar si se encontraron términos y mostrarlos si existen
                                                        if (!empty($terms)) {
                                                                                
                                                            foreach ($terms as $term) {
                                                                $marca = esc_html($term->name) ;
                                                                echo $marca;
                                                            }
                                                        } else {
                                                                echo 'Marca no especificada';
                                                                }
                                                ?>
                                                </i>
                                            </a>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="listing-thumbnail mb-30 wow fadeInUp">
                                <?php the_post_thumbnail('car_size_photo', array('class'=> 'img-fluid img-popup'));?>
                            </div>
                            <div class="listing-gallery-box mb-30 wow fadeInUp">
                                <h4 class="title">Photo Gallery</h4>
                                <div class="gallery-slider-one">
                                    <div class="gallery-item">
                                        <img src="assets/images/listing/gallery-5.jpg" alt="gallery image">
                                    </div>
                                    <div class="gallery-item">
                                        <img src="assets/images/listing/gallery-6.jpg" alt="gallery image">
                                    </div>
                                    <div class="gallery-item">
                                        <img src="assets/images/listing/gallery-7.jpg" alt="gallery image">
                                    </div>
                                    <div class="gallery-item">
                                        <img src="assets/images/listing/gallery-8.jpg" alt="gallery image">
                                    </div>
                                    <div class="gallery-item">
                                        <img src="assets/images/listing/gallery-6.jpg" alt="gallery image">
                                    </div>
                                </div>
                            </div>
                            <div class="listing-content mb-30 wow fadeInUp">
                                <h3 class="title">Descripcion</h3>
                                <p> <?php echo get_post_meta(get_the_ID(), 'main_information_metabox_descripcion', true); ?></p>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="icon-box icon-box-one">
                                            <div class="icon">
                                                <i class="ti-credit-card"></i>
                                            </div>
                                            <div class="info">
                                                <h6>Numero de bolsas de Aire: <?php echo get_post_meta(get_the_ID(), 'main_information_metabox_bolsas', true); ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="icon-box icon-box-one">
                                            <div class="icon">
                                                <i class="ti-paint-bucket"></i>
                                            </div>
                                            <div class="info">
                                                <h6>Kilometraje: <?php echo get_post_meta(get_the_ID(),'main_information_metabox_kilometraje',true);?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="icon-box icon-box-one">
                                            <div class="icon">
                                                <i class="ti-rss-alt"></i>
                                            </div>
                                            <div class="info">
                                                <h6>Transmision: <?php 
                                        // Obtener el valor del campo personalizado 'Modelo'
                                        echo get_post_meta(get_the_ID(), 'main_information_metabox_transmision', true);

                                        ?></h6>
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
                                                <i class="ti-car"></i>
                                            </div>
                                            <div class="info">
                                                <h6>Combustible: <?php  
                                                    $post_id = get_the_ID();
                                                    $terms = wp_get_post_terms($post_id, 'fuel');
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
                                                <i class="ti-credit-card"></i>
                                            </div>
                                            <div class="info">
                                                <h6>Num.Puertas: <?php echo get_post_meta(get_the_ID(),'main_information_metabox_puertas',true);?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="listing-play-box mb-30 wow fadeInUp">
                                <h4 class="title">Documentary</h4>
                                <div class="play-content bg_cover text-center" style="background-image: url(assets/images/bg/video-bg-3.jpg);">
                                    <a href="https://www.youtube.com/watch?v=lJyzByVH1oQ" class="video-popup"><i class="flaticon-play-button"></i></a>
                                </div>
                            </div>
                          
                            <div class="listing-tag-box mb-30 wow fadeInUp">
                                <h4 class="title">Popular Tag</h4>
                                <a href="#">Delivery</a>
                                <a href="#">Restaurant</a>
                                <a href="#">Free Internet</a>
                                <a href="#">Shopping</a>
                                <a href="#">Car Parking</a>
                            </div>
                            <div class="listing-rating-box wow fadeInUp">
                                <h4 class="title">Average Review (10 Reviews)</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-average-rating">
                                            <h5 class="title">Service</h5>
                                            <div class="single-average-wrap d-flex align-items-center">
                                                <div class="progress flex-grow-1">
                                                    <div class="progress-bar" style="width: 80%"></div>
                                                </div>
                                                <span class="rating">4.5</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-average-rating">
                                            <h5 class="title">Quality</h5>
                                            <div class="single-average-wrap d-flex align-items-center">
                                                <div class="progress flex-grow-1">
                                                    <div class="progress-bar" style="width: 80%"></div>
                                                </div>
                                                <span class="rating">4.5</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-average-rating">
                                            <h5 class="title">Location</h5>
                                            <div class="single-average-wrap d-flex align-items-center">
                                                <div class="progress flex-grow-1">
                                                    <div class="progress-bar" style="width: 80%"></div>
                                                </div>
                                                <span class="rating">4.5</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-average-rating">
                                            <h5 class="title">Price</h5>
                                            <div class="single-average-wrap d-flex align-items-center">
                                                <div class="progress flex-grow-1">
                                                    <div class="progress-bar" style="width: 80%"></div>
                                                </div>
                                                <span class="rating">4.5</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="listing-review-box mb-50 wow fadeInUp">
                                <h4 class="title">Customer Review</h4>
                                <ul class="review-list">
                                    <li class="review">
                                        <div class="thumb">
                                            <img src="assets/images/listing/review-1.jpg" alt="review image">
                                        </div>
                                        <div class="review-content">
                                            <h5>Moriana Steve</h5>
                                            <span class="date">Sep 02, 2021</span>
                                            <p>Musutrum orci montes hac at neque mollis taciti parturient vehicula interdum verra cubilia ipsum duis amet nullam sit ut ornare mattis urna. </p>
                                            <div class="content-meta d-flex align-items-center justify-content-between">
                                                <ul class="ratings ratings-three">
                                                    <li><span class="av-rate">4.5</span></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                </ul>
                                                <a href="#" class="reply"><i class="ti-share-alt"></i>Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="review">
                                        <div class="thumb">
                                            <img src="assets/images/listing/review-2.jpg" alt="review image">
                                        </div>
                                        <div class="review-content">
                                            <h5>Moriana Steve</h5>
                                            <span class="date">Sep 02, 2021</span>
                                            <p>Musutrum orci montes hac at neque mollis taciti parturient vehicula interdum verra cubilia ipsum duis amet nullam sit ut ornare mattis urna. </p>
                                            <div class="content-meta d-flex align-items-center justify-content-between">
                                                <ul class="ratings ratings-three">
                                                    <li><span class="av-rate">4.5</span></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                </ul>
                                                <a href="#" class="reply"><i class="ti-share-alt"></i>Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="review">
                                        <div class="thumb">
                                            <img src="assets/images/listing/review-3.jpg" alt="review image">
                                        </div>
                                        <div class="review-content">
                                            <h5>Moriana Steve</h5>
                                            <span class="date">Sep 02, 2021</span>
                                            <p>Musutrum orci montes hac at neque mollis taciti parturient vehicula interdum verra cubilia ipsum duis amet nullam sit ut ornare mattis urna. </p>
                                            <div class="content-meta d-flex align-items-center justify-content-between">
                                                <ul class="ratings ratings-three">
                                                    <li><span class="av-rate">4.5</span></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                    <li class="star"><i class="flaticon-star-1"></i></li>
                                                </ul>
                                                <a href="#" class="reply"><i class="ti-share-alt"></i>Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="listing-review-form mb-30 wow fadeInUp">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="title">Write a Review</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-rating">
                                            <ul class="ratings">
                                                <li><span>Rate Here:</span></li>
                                                <li class="star"><i class="flaticon-star-1"></i></li>
                                                <li class="star"><i class="flaticon-star-1"></i></li>
                                                <li class="star"><i class="flaticon-star-1"></i></li>
                                                <li class="star"><i class="flaticon-star-1"></i></li>
                                                <li class="star"><i class="flaticon-star-1"></i></li>
                                            </ul>
                                            <span>(02 Reviews)</span>
                                        </div>
                                    </div>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form_group">
                                                <textarea class="form_control" placeholder="Write Message" name="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form_group">
                                                <input type="text" class="form_control" placeholder="Your name" name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form_group">
                                                <input type="email" class="form_control" placeholder="Email here" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form_group">
                                                <div class="single-checkbox d-flex">
                                                    <input type="checkbox" id="check4" name="checkbox">
                                                    <label for="check4"><span>Save my name, email, and website in this browser for the next time i comment.</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form_group">
                                                <button class="main-btn icon-btn">Submit Review</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="releted-listing-area wow fadeInUp">
                            <h3 class="title mb-20">Similar Restaurant</h3>
                            <div class="releted-listing-slider-one">
                                <div class="listing-item listing-grid-item-two">
                                    <div class="listing-thumbnail">
                                        <img src="assets/images/listing/listing-grid-7.jpg" alt="Listing Image">
                                        <a href="#" class="cat-btn"><i class="flaticon-chef"></i></a>
                                        <span class="featured-btn">Featured</span>
                                     
                                    </div>
                                    <div class="listing-content">
                                        <h3 class="title"><a href="listing-details-1.html">Pizza Recipe</a></h3>
                                        <p>Popular restaurant in california</p>
                                        <span class="phone-meta"><i class="ti-tablet"></i><a href="tel:+982653652-05">+98 (265) 3652 - 05</a><span class="status st-open">Open</span></span>
                                        <div class="listing-meta">
                                            <ul>
                                                <li><span><i class="ti-location-pin"></i>California, USA</span></li>
                                                <li><span><i class="ti-heart"></i><a href="#">Save</a></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-item listing-grid-item-two">
                                    <div class="listing-thumbnail">
                                        <img src="assets/images/listing/listing-grid-8.jpg" alt="Listing Image">
                                        <a href="#" class="cat-btn"><i class="flaticon-dumbbell"></i></a>
                                        <ul class="ratings ratings-three">
                                            <li class="star"><i class="flaticon-star-1"></i></li>
                                            <li class="star"><i class="flaticon-star-1"></i></li>
                                            <li class="star"><i class="flaticon-star-1"></i></li>
                                            <li class="star"><i class="flaticon-star-1"></i></li>
                                            <li class="star"><i class="flaticon-star-1"></i></li>
                                            <li><span><a href="#">(02 Reviews)</a></span></li>
                                        </ul>
                                    </div>
                                    <div class="listing-content">
                                        <h3 class="title"><a href="listing-details-1.html">Gym Ground</a></h3>
                                        <p>Popular restaurant in california</p>
                                        <span class="phone-meta"><i class="ti-tablet"></i><a href="tel:+982653652-05">+98 (265) 3652 - 05</a><span class="status st-close">close</span></span>
                                        <div class="listing-meta">
                                            <ul>
                                                <li><span><i class="ti-location-pin"></i>California, USA</span></li>
                                                <li><span><i class="ti-heart"></i><a href="#">Save</a></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-item listing-grid-item-two">
                                    <div class="listing-thumbnail">
                                        <img src="assets/images/listing/listing-grid-9.jpg" alt="Listing Image">
                                        <a href="#" class="cat-btn"><i class="flaticon-government"></i></a>
                                        <span class="featured-btn">Caracteristicas</span>
                                     
                                    </div>
                                    <div class="listing-content">
                                        <h3 class="title"><a href="listing-details-1.html">City Palace</a></h3>
                                        <p>Popular restaurant in california</p>
                                        <span class="phone-meta"><i class="ti-tablet"></i><a href="tel:+982653652-05">+98 (265) 3652 - 05</a><span class="status st-open">Open</span></span>
                                        <div class="listing-meta">
                                            <ul>
                                                <li><span><i class="ti-location-pin"></i>California, USA</span></li>
                                                <li><span><i class="ti-heart"></i><a href="#">Save</a></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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