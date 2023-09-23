<?php

function filtrar_por_marca()
{
   
    if (isset($_POST['brand'])) {
        $selected_fuel = $_POST['brand'];

  
        $args = array(
            'post_type' => 'cars',
            'tax_query' => array(
                array(
                    'taxonomy' => 'brand', 
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
                    'estado' => wp_get_post_terms(get_the_ID(), 'condition', array('fields' => 'names'))[0],
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
                    'estado' => wp_get_post_terms(get_the_ID(), 'condition', array('fields' => 'names'))[0],
                    'precio' => get_post_meta(get_the_ID(), 'main_information_metabox_precio', true),
                   
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
                    'estado' => wp_get_post_terms(get_the_ID(), 'condition', array('fields' => 'names'))[0],
                    'precio' => get_post_meta(get_the_ID(), 'main_information_metabox_precio', true),
                    
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
                    'estado' => wp_get_post_terms(get_the_ID(), 'condition', array('fields' => 'names'))[0],
                    'precio' => get_post_meta(get_the_ID(), 'main_information_metabox_precio', true),
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