<?php
//Function to filter cars
function filtrar_por_palabra_clave() {
    $keyword = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';

    $args = array(
        'post_type' => 'cars',
        's' => $keyword, 
    );

    $query = new WP_Query($args);

    $results = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $post_data = array(
                'title' => get_the_title(),
                'permalink' => get_permalink(),
                'post_thumbnail_url' => get_the_post_thumbnail_url(get_the_ID(), 'car_size_photo'),
                'ciudad' => get_post_meta(get_the_ID(), 'administrative_area_level_1', true),
                'estado' => wp_get_post_terms(get_the_ID(), 'condition', array('fields' => 'names'))[0],
                'precio' => get_post_meta(get_the_ID(), 'main_information_metabox_precio', true),
            );

            $results[] = $post_data;
        }

        wp_reset_postdata(); 
    }

    wp_send_json($results);
    die();
}

add_action('wp_ajax_filtrar_por_palabra_clave', 'filtrar_por_palabra_clave');
add_action('wp_ajax_nopriv_filtrar_por_palabra_clave', 'filtrar_por_palabra_clave');


function filtrar_por_categoria() {
    $selected_brand = isset($_POST['cars-brand-selector']) ? $_POST['cars-brand-selector'] : 'Todas las marcas';
    $selected_fuel = isset($_POST['cars-fuel-selector']) ? $_POST['cars-fuel-selector'] : 'Todos los tipos de combustible';
    $selected_condition = isset($_POST['cars-condition-selector']) ? $_POST['cars-condition-selector'] : 'Todos las condiciones de autos';
    $selected_type_car = isset($_POST['cars-type_car-selector']) ? $_POST['cars-type_car-selector'] : 'Todas los tipos de auto';
    $selected_state = isset($_POST['cars-state-selector']) ? $_POST['cars-state-selector'] : 'Todas las opciones de estado';
    $selected_city = isset($_POST['cars-city-selector']) ? $_POST['cars-city-selector'] : 'Todas las opciones de ciudad';

    $selected_categories = array(
        $selected_brand,
        $selected_fuel,
        $selected_condition,
        $selected_type_car,
        $selected_state,
        $selected_city,
    );

    $tax_query = array();

    $selected_categories_count = count(array_filter($selected_categories, function ($category) {
        return $category !== 'Mostrar Todas';
    }));

    if ($selected_brand !== 'Mostrar Todas') {
        $tax_query[] = array(
            'taxonomy' => 'brand',
            'field' => 'slug',
            'terms' => $selected_brand,
        );
    }

    if ($selected_fuel !== 'Mostrar Todas') {
        $tax_query[] = array(
            'taxonomy' => 'fuel',
            'field' => 'slug',
            'terms' => $selected_fuel,
        );
    }

    if ($selected_condition !== 'Mostrar Todas') {
        $tax_query[] = array(
            'taxonomy' => 'condition',
            'field' => 'slug',
            'terms' => $selected_condition,
        );
    }

    if ($selected_type_car !== 'Mostrar Todas') {
        $tax_query[] = array(
            'taxonomy' => 'type_car',
            'field' => 'slug',
            'terms' => $selected_type_car,
        );
    }

    if ($selected_categories_count > 0) {
        $tax_query['relation'] = 'AND';
    } else {
        $tax_query['relation'] = 'OR';
    }

    // Realiza una consulta para obtener las entradas que coinciden con los campos de metabox.
    $metabox_args = array(
        'post_type' => 'cars',
        'posts_per_page' => -1,
        'meta_query' => array(),
    );

    if ($selected_state !== 'Todas las opciones de estado') {
        $metabox_args['meta_query'][] = array(
            'key' => 'administrative_area_level_1',
            'value' => $selected_state,
            'compare' => '='
        );
    }

    if ($selected_city !== 'Todas las opciones de ciudad') {
        $metabox_args['meta_query'][] = array(
            'key' => 'locality',
            'value' => $selected_city,
            'compare' => '='
        );
    }

    $metabox_query = new WP_Query($metabox_args);

    $metabox_post_ids = wp_list_pluck($metabox_query->posts, 'ID');

    // Combina los resultados de ambas consultas.
    $combined_query = new WP_Query(array(
        'post_type' => 'cars',
        'post__in' => $metabox_post_ids,
        'tax_query' => $tax_query,
    ));

    $results = array();
    if ($combined_query->have_posts()) {
        while ($combined_query->have_posts()) {
            $combined_query->the_post();

            $post_data = array(
                'title' => get_the_title(),
                'permalink' => get_permalink(),
                'post_thumbnail_url' => get_the_post_thumbnail_url(get_the_ID(),'car_size_photo'),
                'ciudad' => get_post_meta(get_the_ID(), 'locality', true),
                'estado' =>wp_get_post_terms(get_the_ID(), 'condition', array('fields' => 'names'))[0],
                'precio' => get_post_meta(get_the_ID(), 'main_information_metabox_precio', true),
            );

            $results[] = $post_data;
        }
        wp_reset_postdata();
    }

    wp_send_json($results);

    die();
}

add_action('wp_ajax_filtrar_por_categoria', 'filtrar_por_categoria');
add_action('wp_ajax_nopriv_filtrar_por_categoria', 'filtrar_por_categoria');
