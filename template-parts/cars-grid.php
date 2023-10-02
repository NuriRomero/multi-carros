
<div class="col-12">
	<div class="listing-item listing-grid-item-two mb-30 wow fadeInUp">
		<div class="listing-thumbnail">
			<?php
			$image_url = get_the_post_thumbnail_url( get_the_ID(), 'car_size_photo' );
			if ( $image_url ) {
				echo '<img src="' . esc_url( $image_url ) . '" href="' . esc_url( $image_url ) . '" class="img-fluid img-popup" alt="' . esc_attr( get_the_title() ) . '">';
			} else {
				echo 'No se ha proporcionado una imagen válida.';
			}
			?>
			<span class="featured-btn"> <?php echo ! empty( $terms = wp_get_post_terms( get_the_ID(), 'condition' ) ) ? esc_html( $terms[0]->name ) : 'Condicion no especificada'; ?>
		</span>
		</div>
		<div class="listing-content">
			<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
					</span></li>
				</ul>
			</div>
			<span class="price" style="display: block;font-weight: 600;color: #0d0d0d;margin-bottom: 15px;">
				Precio: <?php echo get_post_meta( get_the_ID(), 'Precio', true ); ?>
			</span>
		</div>
	</div>
</div>
