<?php
/**
 * Template part for displaying the hero banner in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Multi_Carros
 */

$cars = get_cars( 10 );

if ( $cars->have_posts() ) :
	?>
<!--====== Start Listing Section POST======-->
<section class="listing-grid-area pt-35 pb-110">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="section-title text-center mb-60 wow fadeInUp">
					<h2>Agregados Recientemente</h2>
				</div>
			</div>
		</div>
		<div class="listing-slider-one wow fadeInDown">
			<?php
			while ( $cars->have_posts() ) :
				$cars->the_post();
				?>
			<div class="col-lg-8 col-md-8 col-sm-12">
				<div class="listing-item listing-grid-item-two">
					<div class="listing-thumbnail">
						<?php the_post_thumbnail('car_size_photo');?>
						<span class="featured-btn"></i><?php echo ! empty( $terms = wp_get_post_terms( get_the_ID(), 'condition' ) ) ? esc_html( $terms[0]->name ) : 'Condicion no especificada'; ?>
						</span>
						</li></span>
					</div>
					<div class="listing-content">
						<h3 class="title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>
						<div class="listing-meta">
							<ul>
							    <?php echo get_post_meta( get_the_ID(), 'administrative_area_level_1', true ); ?>
							</ul>
							
						</div>
						<span class="price">Precio: <?php echo get_post_meta( get_the_ID(), 'main_information_metabox_precio', true ); ?></span>
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
else :
	echo '<h4> no hay carros que listar </h4>';
endif;

wp_reset_postdata();
?>
