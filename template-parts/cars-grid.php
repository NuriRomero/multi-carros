
<div class="col-12">
	<div class="listing-item listing-grid-one mb-45 wow fadeInUp">
		<div class="listing-thumbnail">
			<?php the_post_thumbnail( get_the_ID(),'car_size_photo');?>
			<span class="featured-btn"> <?php echo  wp_get_post_terms(get_the_ID(), 'condition', array('fields' => 'names'))[0]; ?>
		</span>
		</div>
		<div class="listing-content">
			<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="listing-meta">
				<ul>
					<li><span><i class="ti-location-pin"></i>
					<?php echo get_post_meta( get_the_ID(), 'administrative_area_level_1', true );?>
					</span></li>
				</ul>
			</div>
			<span class="price" style="display: block;font-weight: 600;color: #0d0d0d;margin-bottom: 15px;">
				Precio: <?php echo get_post_meta( get_the_ID(), 'main_information_metabox_precio', true ); ?>
			</span>
		</div>
	</div>
</div>
