<?php

if ( ! function_exists( 'get_cars' ) ) {

	/**
	 * This function retrieves the cars cpt
	 *
	 * @since 1.0.0
	 *
	 * @param $posts_per_page integer This is the number to limit the query in the DDBB.
	 */
	function get_cars( $posts_per_page = 6 ) {

		// WP_Query arguments
		$args = array(
			'post_type'              => array( 'cars' ),
			'posts_per_page'         => $posts_per_page,
		);

		// The Query
		$cars = new WP_Query( $args );

		return $cars;
	}

}
if( ! function_exists( 'query_db_metavalue' ) ) {

	function query_db_metavalue( $post_meta ) {

		global $wpdb;

		$meta_key_values = $wpdb->get_col(
			$wpdb->prepare(
				"SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s",
				$post_meta
			)
		);
		return $meta_key_values;

	}

if ( ! function_exists('query_cities_by_state') ) {
	function query_cities_by_state( $selected_state ) {
		
		global $wpdb;

		$query = $wpdb->prepare(
			"SELECT DISTINCT post_title FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
			WHERE $wpdb->postmeta.meta_key = 'estado' AND $wpdb->postmeta.meta_value = %s
			AND $wpdb->posts.post_type = 'ciudad'",
			$selected_state
		);

		$cities = $wpdb->get_col($query);

		return $cities;
	}
}

}