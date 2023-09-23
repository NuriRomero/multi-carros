<?php
function filtrar_por_criterios()
{
    // Recopila todos los criterios seleccionados en tu formulario.
    $selected_brand = isset($_POST['brand']) ? $_POST['brand'] : '';
    $selected_fuel = isset($_POST['fuel']) ? $_POST['fuel'] : '';
    $selected_condition = isset($_POST['condition']) ? $_POST['condition'] : '';
    $type_car = isset($_POST['type_car']) ? $_POST['type_car'] : '';

    // Construye los argumentos de la consulta WP_Query con los criterios seleccionados.
    $args = array(
        'post_type' => 'cars',
        'relation' => 'AND', // Opcional: Puedes utilizar 'OR' si quieres resultados que cumplan con cualquiera de los criterios.
        'tax_query' => array(),
    );

    if (!empty($selected_brand)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'brand',
            'field' => 'slug',
            'terms' => $selected_brand,
        );
    }

    if (!empty($selected_fuel)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'fuel',
            'field' => 'slug',
            'terms' => $selected_fuel,
        );
    }

    if (!empty($selected_condition)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'condition',
            'field' => 'slug',
            'terms' => $selected_condition,
        );
    }

    if (!empty($type_car)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'type_car',
            'field' => 'slug',
            'terms' => $type_car,
        );
    }

    // Ejecuta la consulta WP_Query con los argumentos construidos.
    $query = new WP_Query($args);

    $results = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            // Obtén los datos del automóvil como lo hiciste antes y agrégalos a $results.
            // Asegúrate de adaptar esta parte según tus necesidades.

            $post_id = get_the_ID();
            $terms = wp_get_post_terms($post_id, 'condition');
            // Verificar si se encontraron términos y mostrarlos si existen
            if (!empty($terms)) {
                
                foreach ($terms as $term) {
                    $condicion=esc_html($term->name) ;
                }
                } else {
                echo 'Condicion no especificado';
            }
                                    
            $post_data = array(
                'title' => get_the_title(),
                'permalink' => get_permalink(),
                'post_thumbnail_url' => get_the_post_thumbnail_url(),
                'ciudad' => get_post_meta(get_the_ID(), 'main_information_metabox_ciudad', true),
                'estado' => $condicion,
                'precio' => get_post_meta(get_the_ID(), 'main_information_metabox_precio', true),
            );

            $results[] = $post_data;
        }
    }

    // Envía los resultados como JSON al cliente.
    wp_send_json($results);

    die();
}

// Agrega acciones de WordPress para manejar las solicitudes AJAX para este filtro.
add_action('wp_ajax_filtrar_por_criterios', 'filtrar_por_criterios');
add_action('wp_ajax_nopriv_filtrar_por_criterios', 'filtrar_por_criterios');
?>