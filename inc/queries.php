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
if ( ! function_exists( 'query_db_metavalue' ) ) {
    function query_db_metavalue( $post_meta ) {
        global $wpdb;
        $meta_key_values = $wpdb->get_col(
            $wpdb->prepare(
                "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s AND meta_value <> ''",
                $post_meta
            )
        );
        return $meta_key_values;
    }
}


if (!function_exists('query_db_metavalue_estados')) {
    function query_db_metavalue_estados($post_meta) {

        global $wpdb;
        $estados = $wpdb->get_col(
            $wpdb->prepare(
                "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s",
                'administrative_area_level_1'
            )
        );

        return $estados; // Devuelve el resultado
    }
}
