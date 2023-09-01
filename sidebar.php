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
        <h2>Filtrar por Categoría</h2>
        <?php
        $categories = get_categories(array('slug' => 'cars')); // Obtener categoría "cars"
        foreach ($categories as $category) {
            echo '<label><input type="checkbox" name="category[]" value="' . $category->term_id . '"> ' . $category->name . '</label><br>';
        }
        ?>
        <input type="submit" value="Filtrar">
    </form>
</aside><!-- #secondary -->

