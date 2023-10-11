<?php
function filtrar_por_palabra_clave() {
    $keyword = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';

    $args = array(
        'post_type' => 'cars',
        's' => $keyword, // Utiliza la palabra clave para buscar en el contenido del post
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

        wp_reset_postdata(); // Restauramos los datos del post
    }

    wp_send_json($results);
    die();
}

add_action('wp_ajax_filtrar_por_palabra_clave', 'filtrar_por_palabra_clave');
add_action('wp_ajax_nopriv_filtrar_por_palabra_clave', 'filtrar_por_palabra_clave');


//Function to filter cars
function filtrar_por_categoria() {
	$selected_brand = isset($_POST['cars-brand-selector']) ? $_POST['cars-brand-selector'] : 'Todas las marcas';
	$selected_fuel = isset($_POST['cars-fuel-selector']) ? $_POST['cars-fuel-selector'] : 'Todos los tipos de combustible';
	$selected_condition = isset($_POST['cars-condition-selector']) ? $_POST['cars-condition-selector'] : 'Todos las condiciones de autos';
	$selected_type_car = isset($_POST['cars-type_car-selector']) ? $_POST['cars-type_car-selector'] : 'Todas los tipos de auto';

	$selected_categories = array(
		$selected_brand,
		$selected_fuel,
		$selected_condition,
		$selected_type_car,
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

	if ($selected_categories_count > 1) {
		$tax_query['relation'] = 'AND';
	} else {
		$tax_query['relation'] = 'OR';
	}

	$query = new WP_Query(array(
		'post_type' => 'cars',
		'tax_query' => $tax_query,
	));

	$results = array();
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();

			$post_data = array(
				'title' => get_the_title(),
				'permalink' => get_permalink(),
				'post_thumbnail_url' => get_the_post_thumbnail_url( get_the_ID(),'car_size_photo'),
				'ciudad' => get_post_meta(get_the_ID(), 'administrative_area_level_1', true),
				'estado' => wp_get_post_terms(get_the_ID(), 'condition', array('fields' => 'names'))[0],
				'precio' => get_post_meta(get_the_ID(), 'main_information_metabox_precio', true),
			);

			$results[] = $post_data;
		}
		wp_reset_postdata(); // Restauramos los datos del post
	}

	wp_send_json($results);

	die();
}

add_action('wp_ajax_filtrar_por_categoria', 'filtrar_por_categoria');
add_action('wp_ajax_nopriv_filtrar_por_categoria', 'filtrar_por_categoria');

