<?php
function filtrar_por_categoria() {
	if ( isset( $_POST['cars-brand-selector'] ) || isset( $_POST['cars-fuel-selector'] ) || isset( $_POST['cars-condition-selector'] ) || isset( $_POST['cars-type_car-selector'] ) ) {
		$selected_brand     = $_POST['cars-brand-selector'];
		$selected_fuel      = $_POST['cars-fuel-selector'];
		$selected_condition = $_POST['cars-condition-selector'];
		$selected_type_car  = $_POST['cars-type_car-selector'];

		$args = array(
			'post_type' => 'cars',
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'brand',
					'field'    => 'slug',
					'terms'    => $selected_brand,
				),
				array(
					'taxonomy' => 'fuel',
					'field'    => 'slug',
					'terms'    => $selected_fuel,
				),
				array(
					'taxonomy' => 'condition',
					'field'    => 'slug',
					'terms'    => $selected_condition,
				),
				array(
					'taxonomy' => 'type_car',
					'field'    => 'slug',
					'terms'    => $selected_type_car,
				),
			),
		);

		$query = new WP_Query( $args );

		$results = array();
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();

				$post_data = array(
					'title'              => get_the_title(),
					'permalink'          => get_permalink(),
					'post_thumbnail_url' => get_the_post_thumbnail_url(),
					'ciudad'             => get_post_meta( get_the_ID(), 'Ciudad', true ),
					'estado'             => wp_get_post_terms( get_the_ID(), 'condition', array( 'fields' => 'names' ) )[0],
					'precio'             => get_post_meta( get_the_ID(), 'main_information_metabox_precio', true ),
				);

				$results[] = $post_data;
			}
		}

		wp_send_json( $results );
	}

	die();
}

add_action( 'wp_ajax_filtrar_carros_por_categoria', 'filtrar_por_categoria' );
add_action( 'wp_ajax_nopriv_filtrar_carros_por_categoria', 'filtrar_por_categoria' );
