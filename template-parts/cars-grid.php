<<<<<<< HEAD
<!-- Listing cars  -->
<div class="col-md-12 col-sm-12">
	<div class="listing-item listing-grid-item-two mb-30 wow fadeInUp">
		<div class="listing-thumbnail">
			<?php the_post_thumbnail( get_the_ID(),'car_size_photo');?>
			<span class="featured-btn"> <?php echo ! empty( $terms = wp_get_post_terms( get_the_ID(), 'condition' ) ) ? esc_html( $terms[0]->name ) : 'Condicion no especificada'; ?>
=======

<div class="col-12">
	<div class="listing-item listing-grid-one mb-45 wow fadeInUp">
		<div class="listing-thumbnail">
			<?php the_post_thumbnail( get_the_ID(),'car_size_photo');?>
			<span class="featured-btn"> <?php echo  wp_get_post_terms(get_the_ID(), 'condition', array('fields' => 'names'))[0]; ?>
>>>>>>> ba1e572 (Fixed cars-grid)
		</span>
		</div>
		<div class="listing-content">
			<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="listing-meta">
				<ul>
<<<<<<< HEAD
				<li><span><i class="ti-location-pin"></i><?php echo "Ciudad: ".get_post_meta( get_the_ID(), 'administrative_area_level_1', true );?></span></li>
=======
					<li><span><i class="ti-location-pin"></i>
					<?php echo get_post_meta( get_the_ID(), 'administrative_area_level_1', true );?>
					</span></li>
>>>>>>> ba1e572 (Fixed cars-grid)
				</ul>
			</div>
			<span class="price" style="display: block;font-weight: 600;color: #0d0d0d;margin-bottom: 15px;">
				Precio: <?php echo get_post_meta( get_the_ID(), 'main_information_metabox_precio', true ); ?>
			</span>
		</div>
	</div>
</div>