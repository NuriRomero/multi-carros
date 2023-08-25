<?php

if( ! function_exists( 'get_cars' ) ) {

    /**
     * This function retrieves the cars cpt
     * 
     * @since 1.0.0
     * 
     * @param $posts_per_page integer This is the number to limit the query in the DDBB.
     */
    function get_cars( $posts_per_page = 6 ) {

        $args = array(
            'post_type' => 'cars',
            'posts_per_page' => $posts_per_page,
        );
        $cars = new WP_Query( $args );

        return $cars;

    }

}