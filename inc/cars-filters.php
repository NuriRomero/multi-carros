<?php
/**
 * Archivo para gestionar la filtración de autos.
 *
 * @package TuTema
 */

/**
 * Filtra los autos por marca.
 */
function filtrar_por_marca() {
	check_ajax_referer( 'nombre_del_nonce', 'nombre_del_nonce_field' ); // Agrega verificación de nonce.

	if ( isset( $_POST['brand'] ) ) {
		$selected_brand = sanitize_text_field( wp_unslash( $_POST['brand'] ) ); // Deshacer el escapado de la variable y sanitizarla.

		$args = array(
			'post_type' => 'cars',
			'tax_query' => array(
				array(
					'taxonomy' => 'brand',
					'field'    => 'slug',
					'terms'    => $selected_brand,
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
					'estado'             => get_post_meta( get_the_ID(), 'Estado', true ),
					'precio'             => get_post_meta( get_the_ID(), 'Precio', true ),
				);

				$results[] = $post_data;
			}
		}

		wp_send_json( $results );
	}

	die();
}

add_action( 'wp_ajax_filtrar_carros_por_marca', 'filtrar_por_marca' );
add_action( 'wp_ajax_nopriv_filtrar_carros_por_marca', 'filtrar_por_marca' );

/**
 * Filtra los autos por tipo de combustible.
 */
function filtrar_por_combustible() {
	check_ajax_referer( 'nombre_del_nonce', 'nombre_del_nonce_field' ); // Agrega verificación de nonce.

	if ( isset( $_POST['fuel'] ) ) {
		$selected_fuel = sanitize_text_field( wp_unslash( $_POST['fuel'] ) ); // Deshacer el escapado de la variable y sanitizarla.

		$args = array(
			'post_type' => 'cars',
			'tax_query' => array(
				array(
					'taxonomy' => 'fuel',
					'field'    => 'slug',
					'terms'    => $selected_fuel,
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
					'estado'             => get_post_meta( get_the_ID(), 'Estado', true ),
					'precio'             => get_post_meta( get_the_ID(), 'Precio', true ),
				);

				$results[] = $post_data;
			}
		}

		wp_send_json( $results );
	}

	die();
}

add_action( 'wp_ajax_filtrar_por_combustible', 'filtrar_por_combustible' );
add_action( 'wp_ajax_nopriv_filtrar_por_combustible', 'filtrar_por_combustible' );

/**
 * Filtra los autos por condición.
 */
function filtrar_por_condicion() {
	check_ajax_referer( 'nombre_del_nonce', 'nombre_del_nonce_field' ); // Agrega verificación de nonce.

	if ( isset( $_POST['condition'] ) ) {
		$selected_condition = sanitize_text_field( wp_unslash( $_POST['condition'] ) ); // Deshacer el escapado de la variable y sanitizarla.

		$args = array(
			'post_type' => 'cars',
			'tax_query' => array(
				array(
					'taxonomy' => 'condition',
					'field'    => 'slug',
					'terms'    => $selected_condition,
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
					'estado'             => get_post_meta( get_the_ID(), 'Estado', true ),
					'precio'             => get_post_meta( get_the_ID(), 'Precio', true ),
				);

				$results[] = $post_data;
			}
		}

		wp_send_json( $results );
	}

	die();
}

add_action( 'wp_ajax_filtrar_por_condicion', 'filtrar_por_condicion' );
add_action( 'wp_ajax_nopriv_filtrar_por_condicion', 'filtrar_por_condicion' );

/**
 * Filtra los autos por tipo de carro.
 */
function filtrar_por_tipo_car() {
	check_ajax_referer( 'nombre_del_nonce', 'nombre_del_nonce_field' ); 

	if ( isset( $_POST['type_car'] ) ) {
		$type_car = sanitize_text_field( wp_unslash( $_POST['type_car'] ) ); 

		$args = array(
			'post_type' => 'cars',
			'tax_query' => array(
				array(
					'taxonomy' => 'type_car',
					'field'    => 'slug',
					'terms'    => $type_car,
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
					'estado'             => get_post_meta( get_the_ID(), 'Estado', true ),
					'precio'             => get_post_meta( get_the_ID(), 'Precio', true ),
				);

				$results[] = $post_data;
			}
		}

		wp_send_json( $results );
	}

	die();
}

add_action( 'wp_ajax_filtrar_por_tipo_car', 'filtrar_por_tipo_car' );
add_action( 'wp_ajax_nopriv_filtrar_por_tipo_car', 'filtrar_por_tipo_car' );
