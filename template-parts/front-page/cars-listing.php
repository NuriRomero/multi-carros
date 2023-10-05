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
<section class="listing-grid-area pt-75 pb-110">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
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
			<div class="col-lg-4 col-md-6 col-sm-12">
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
							    <?php
								$location = get_post_meta( get_the_ID(), 'main_information_metabox_ciudad', true );
								if ( $location ) {
									$api_key  = 'AIzaSyAiB8jZxGdD-xHPvnKLCc6m7WeyWldSUBs'; // Reemplaza con tu propia API Key
									$latitud  = $location['latitude'];
									$longitud = $location['longitude'];
									$url      = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$latitud},{$longitud}&key={$api_key}";
									$response = wp_remote_get( $url );

									if ( is_wp_error( $response ) ) {
										echo 'Error al obtener la información de geolocalización.';
									} else {
										$body = wp_remote_retrieve_body( $response );
										$data = json_decode( $body );

										if ( $data->status === 'OK' ) {
											$direccion = $data->results[0]->formatted_address;
											$ciudad    = '';
											foreach ( $data->results[0]->address_components as $component ) {
												if ( in_array( 'locality', $component->types ) ) {
													$ciudad = $component->long_name;
													break;
												}
											}

											echo '<li><span><i class="ti-location-pin"></i>';
											
											echo  $ciudad;
											echo '</span></li>';
										} else {
											echo 'No se pudo obtener la información de geolocalización.';
										}
									}
								} else {
									echo 'No se han proporcionado valores de latitud y longitud.';
								}
								?>
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
