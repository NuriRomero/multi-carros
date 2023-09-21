<?php
// Agrega las acciones de AJAX para las funciones de filtrado
add_action('wp_ajax_filtrar_resultados', 'filtrar_resultados');
add_action('wp_ajax_nopriv_filtrar_resultados', 'filtrar_resultados');

// Función de filtrado
function filtrar_resultados() {
    // Obtener las selecciones de los selectores
    $selected_brand = isset($_POST['cars-brand-selector']) ? $_POST['cars-brand-selector'] : '';
    $selected_fuel = isset($_POST['cars-fuel-selector']) ? $_POST['cars-fuel-selector'] : '';
    $selected_condition = isset($_POST['cars-condition-selector']) ? $_POST['cars-condition-selector'] : '';
    $selected_type_car = isset($_POST['cars-type_car-selector']) ? $_POST['cars-type_car-selector'] : '';

    // Realizar la consulta para obtener resultados en función de las selecciones
    $args = array(
        'post_type' => 'cars',
        'posts_per_page' => -1, // Para mostrar todos los resultados
        'tax_query' => array(),
    );

    // Agregar taxonomías y términos según las selecciones
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

    if (!empty($selected_type_car)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'type_car',
            'field' => 'slug',
            'terms' => $selected_type_car,
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            
            // Aquí puedes construir la salida HTML de los resultados
            ?>
            <div class="resultado">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p>Ciudad: <?php echo get_post_meta(get_the_ID(), 'Ciudad', true); ?></p>
                <p>Estado: <?php echo get_post_meta(get_the_ID(), 'main_information_metabox_condition', true); ?></p>
                <p>Precio: <?php echo get_post_meta(get_the_ID(), 'main_information_metabox_precio', true); ?></p>
                <?php the_post_thumbnail(); ?>
            </div>
            <?php
        }
    } else {
        echo '<p>No se encontraron resultados.</p>';
    }

    // Termina la ejecución de WordPress
    wp_die();
}


?>