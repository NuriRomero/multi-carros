<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Multi_Carros
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar('sidebar-1'); ?>

    <!-- Agrega el formulario de filtrado aquí -->
    <form action="" method="get">

        <h2>Filtrar por Marca</h2>
        <?php
         $terms_brand = get_terms(array(
            'taxonomy' => 'brand', 
            'hide_empty' => false,
        ));

        foreach ($terms_brand as $term) {
            echo '<label><input type="checkbox" name="brand[]" value="' . $term->slug . '"> ' . $term->name . '</label><br>';
            
        }
        ?>

        <h2>Tipo de combustible</h2>
        <?php
        $terms_type_car = get_terms(array(
            'taxonomy' => 'type_car', 
            'hide_empty' => false,
        ));

        foreach ($terms_type_car as $term) {
            echo '<label><input type="checkbox" name="type_car[]" value="' . $term->slug . '"> ' . $term->name . '</label><br>';
        }
        ?>
      

        <h2>Estatus</h2>
        <?php
        $terms_type_car = get_terms(array(
            'taxonomy' => 'status', 
            'hide_empty' => false, 
        ));

        foreach ($terms_type_car as $term) {
            echo '<label><input type="checkbox" name="status[]" value="' . $term->slug . '"> ' . $term->name . '</label><br>';
        }
        ?>
        
        <h2>Tipo de auto</h2>
        <?php
        $terms_type_car = get_terms(array(
            'taxonomy' => 'type_car', 
            'hide_empty' => false, 
        ));

        foreach ($terms_type_car as $term) {
            echo '<label><input type="checkbox" name="type_car[]" value="' . $term->slug . '"> ' . $term->name . '</label><br>';
        }
        ?>
        <input type="submit" value="Filtrar">
    </form>
</aside><!-- #secondary -->

