<?php

function filtrar_por_marca()
{
   
    if (isset($_POST['brand'])) {
        $selected_brand = $_POST['brand'];

  
        $args = array(
            'post_type' => 'cars',
            'tax_query' => array(
                array(
                    'taxonomy' => 'brand', 
                    'field' => 'slug', 
                    'terms' => $selected_brand,
                ),
            ),
        );

        $query = new WP_Query($args);

        $results = array(); 
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $location_data = get_post_meta(get_the_ID(), 'main_information_metabox_ciudad', true);
                $post_id = get_the_ID();
                $terms = wp_get_post_terms($post_id, 'condition');
                                    // Verificar si se encontraron términos y mostrarlos si existen
                if (!empty($terms)) {
                                        
                    foreach ($terms as $term) {
                        $condicion = esc_html($term->name) ;
                    }
                } else {
                        echo 'Condicion no especificada';
                        }
                        
                                // Verifica si hay datos válidos
                if (!empty($location_data) && is_array($location_data)) {
                    // El campo pw_map generalmente almacena la ciudad en 'city'
                    $city = isset($location_data['city']) ? $location_data['city'] : '';

                    // Convierte $city en una cadena de texto antes de imprimir
                    $city_str = is_array($city) ? implode(', ', $city) : $city;

                    // Ahora puedes usar $city_str para mostrar el nombre de la ciudad en tu plantilla
                    if (!empty($city_str)) {
                        echo 'Ciudad: ' . $city_str;
                    } else {
                        echo 'Ciudad no disponible';
                    }
                } else {
                    echo 'Datos de ubicación no disponibles';
                }
                
                $post_data = array(
                    'title' => get_the_title(),
                    'permalink' => get_permalink(),
                    'post_thumbnail_url' => get_the_post_thumbnail_url(),
                    'ciudad' => $city_str,
                    'estado' => $condicion,
                    'precio' => get_post_meta(get_the_ID(), 'main_information_metabox_precio', true),
                   
                );

                $results[] = $post_data;
            }
        }

       
        wp_send_json($results);
    }

    die();
}


add_action('wp_ajax_filtrar_carros_por_marca', 'filtrar_por_marca');
add_action('wp_ajax_nopriv_filtrar_carros_por_marca', 'filtrar_por_marca');


function filtrar_por_combustible()
{
   
    if (isset($_POST['fuel'])) {
        $selected_fuel = $_POST['fuel'];

  
        $args = array(
            'post_type' => 'cars',
            'tax_query' => array(
                array(
                    'taxonomy' => 'fuel', 
                    'field' => 'slug', 
                    'terms' => $selected_fuel,
                ),
            ),
        );

        $query = new WP_Query($args);

        $results = array();
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

   
                $post_data = array(
                    'title' => get_the_title(),
                    'permalink' => get_permalink(),
                    'post_thumbnail_url' => get_the_post_thumbnail_url(),
                    'ciudad' => get_post_meta(get_the_ID(), 'Ciudad', true),
                    'estado' => get_post_meta(get_the_ID(), 'Estado', true),
                    'precio' => get_post_meta(get_the_ID(), 'Precio', true),
                   
                );

                $results[] = $post_data;
            }
        }

       
        wp_send_json($results);
    }

    die();
}


add_action('wp_ajax_filtrar_por_combustible', 'filtrar_por_combustible');
add_action('wp_ajax_nopriv_filtrar_por_combustible', 'filtrar_por_combustible');

function filtrar_por_condicion()
{
   
    if (isset($_POST['condition'])) {
        $selected_condition = $_POST['condition'];

  
        $args = array(
            'post_type' => 'cars',
            'tax_query' => array(
                array(
                    'taxonomy' => 'condition', 
                    'field' => 'slug', 
                    'terms' => $selected_condition,
                ),
            ),
        );

        $query = new WP_Query($args);

        $results = array();
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

   
                $post_data = array(
                    'title' => get_the_title(),
                    'permalink' => get_permalink(),
                    'post_thumbnail_url' => get_the_post_thumbnail_url(),
                    'ciudad' => get_post_meta(get_the_ID(), 'Ciudad', true),
                    'estado' => get_post_meta(get_the_ID(), 'Estado', true),
                    'precio' => get_post_meta(get_the_ID(), 'Precio', true),
                    
                );

                $results[] = $post_data;
            }
        }

       
        wp_send_json($results);
    }

    die();
}


add_action('wp_ajax_filtrar_por_condicion', 'filtrar_por_condicion');
add_action('wp_ajax_nopriv_filtrar_por_condicion', 'filtrar_por_condicion');


function filtrar_por_tipo_car()
{
   
    if (isset($_POST['type_car'])) {
        $type_car = $_POST['type_car'];

  
        $args = array(
            'post_type' => 'cars',
            'tax_query' => array(
                array(
                    'taxonomy' => 'type_car', 
                    'field' => 'slug', 
                    'terms' => $type_car,
                ),
            ),
        );

        $query = new WP_Query($args);

        $results = array();
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

   
                $post_data = array(
                    'title' => get_the_title(),
                    'permalink' => get_permalink(),
                    'post_thumbnail_url' => get_the_post_thumbnail_url(),
                    'ciudad' => get_post_meta(get_the_ID(), 'Ciudad', true),
                    'estado' => get_post_meta(get_the_ID(), 'Estado', true),
                    'precio' => get_post_meta(get_the_ID(), 'Precio', true),
                );

                $results[] = $post_data;
            }
        }

       
        wp_send_json($results);
    }

    die();
}



add_action('wp_ajax_filtrar_por_tipo_car', 'filtrar_por_tipo_car');
add_action('wp_ajax_nopriv_filtrar_por_tipo_car', 'filtrar_por_tipo_car');
