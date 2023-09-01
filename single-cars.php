<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package Multi_Carros
*/

get_header();
?>
<main id="primary" class="site-main">
<?php
while (have_posts()) :
    the_post();
// Mostrar título y contenido del carro

the_content();
get_template_part('template-parts/single-page/section', 'details');

the_post_navigation(
array(
'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'multi-carros') . '</span> <span class="nav-title">%title</span>',
'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'multi-carros') . '</span> <span class="nav-title">%title</span>',
)
);

// Si los comentarios están abiertos o hay al menos un comentario, carga la plantilla de comentarios.
if (comments_open() || get_comments_number()) :
    comments_template();
endif;

endwhile; // End of the loop.
?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>
