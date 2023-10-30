<!-- Listing cars to filter -->
<div class="col-md-6 col-sm-12">
    <div class="listing-item listing-grid-item-two mb-30 wow fadeInUp">
        <div class="listing-thumbnail">
            <?php
				$image_url = the_post_thumbnail( get_the_ID(), 'car_size_photo' );
			if ( $image_url ) {
				echo '<img src="' . esc_url( $image_url ) . '" href="' . esc_url( $image_url ) . '" class="img-fluid img-popup" alt="' . esc_attr( get_the_title() ) . '">';
			} 
			?>
            <span class="featured-btn">
                <?php echo ! empty( $terms = wp_get_post_terms( get_the_ID(), 'condition' ) ) ? esc_html( $terms[0]->name ) : 'Condicion no especificada'; ?>
            </span>
        </div>
        <div class="listing-content">
            <h3 class="title">
                <a href="<?php the_permalink(); ?>"><?php echo get_the_title();?></a>
            </h3>
            <div class="listing-meta">
                <ul>
                    <li><span><i class="ti-location-pin"><?php echo get_post_meta( get_the_ID(), 'administrative_area_level_1', true );?></i></span></li>
					<li style="display: block;font-weight: 600;color: #0d0d0d;margin-bottom: 15px;">Precio: <?php echo get_post_meta( get_the_ID(), 'main_information_metabox_precio', true ); ?></li>
                </ul>
            </div>
        </div>
        <div class="listing-meta">
        </div>
    </div>
</div>