<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Multi_Carros
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
        if(have_posts(  )):

            while( have_posts(  ) ):
                
                the_content( );
                the_post(  );
                get_template_part( 'template-parts/front-page/section', 'hero' );
                get_template_part( 'template-parts/front-page/section', 'category' );
                get_template_part( 'template-parts/front-page/cars', 'listing' );
                get_template_part( 'template-parts/front-page/cars', 'features' );

            endwhile;
        endif;
        ?>
	</main>
    
<?php

get_sidebar();
get_footer();
?>
