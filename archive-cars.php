<?php
/**
 * The template for displaying archive cars, this template renders the cars listing in grid format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Multi_Carros
 */



get_header();
?>

<main id="primary" class="site-main">
    <!--====== Start Listing Section ======-->
    <section class="listing-grid-area pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Sidebar Content -->
                    <div class="sidebar-widget-area">
                        <div class="widget search-listing-widget mb-30 wow fadeInUp">
                            <h4 class="widget-title">Filtrar Busqueda</h4>
                            <form>
                                <div class="search-form">
                                    <div class="form_group">
                                        <input type="search" class="form_control" placeholder="Buscar por palabra clave"
                                            name="search" id="search-input" required>
                                    </div>
                                    <div class="form_group cars-categories" id="filtro-multiple">
                                        <!-- brand selector  -->
                                        <select class="wide filtro-select" id="cars-brand-selector">
                                            <option data-display="Todas las marcas" value="Mostrar Todas">Todas las marcas</option>
                                            <?php
											$args       = array(
												'orderby' => 'name',
												'order'   => 'ASC',
												'hide_empty' => true,
											);
											$cars_brand = get_terms( 'brand', $args );
											foreach ( $cars_brand as $item_brand ) {
												echo '<option value="' . $item_brand->slug . '">' . $item_brand->name . '</option>';
											}
											?>
                                        </select>
                                        <!-- fuel selector  -->
                                        <select class="wide filtro-select" id="cars-fuel-selector">
                                            <option data-display="Todos los tipos de combustibles" value="Mostrar Todas">Todos los tipos de combustible</option>
                                            <?php
											$args = array(
												'orderby' => 'name',
												'order'   => 'ASC',
												'hide_empty' => true,
											);
											$cars_fuel = get_terms( 'fuel', $args );
											foreach ( $cars_fuel as $item_fuel ) {
												echo '<option value="' . $item_fuel->slug . '">' . $item_fuel->name . '</option>';
											}
											?>
                                        </select>
                                        <!-- condition selector  -->
                                        <select class="wide filtro-select" id="cars-condition-selector">
                                            <option data-display="Todos las condiciones de autos" value="Mostrar Todas">Todas las condiciones</option>
                                            <?php
											$args = array(
												'orderby' => 'name',
												'order'   => 'ASC',
												'hide_empty' => true,
											);
											$cars_condition = get_terms( 'condition', $args );
											foreach ( $cars_condition as $item_condition ) {
												echo '<option value="' . $item_condition->slug . '">' . $item_condition->name . '</option>';
											}
											?>
                                        </select>
                                        <!-- type_car selector  -->
                                        <select class="wide filtro-select" id="cars-type_car-selector">
                                            <option data-display="Todos los tipos de auto" value="Mostrar Todas">Todos los tipos de auto</option>
                                            <?php
											$args = array(
												'orderby' => 'name',
												'order'   => 'ASC',
												'hide_empty' => true,
											);
											$cars_types = get_terms( 'type_car', $args );
											foreach ( $cars_types as $item_type_car ) {
												echo '<option value="' . $item_type_car->slug . '">' . $item_type_car->name . '</option>';
											}
											?>
                                        </select>
                                        <!-- estate selector  -->
                                        <select class="wide filtro-select estados-select" id="cars-state-selector">
                                            <option data-display="Todos los estados" value="Mostrar Todas">Todos los estados</option>     
                                            <?php

                                            $estados = query_db_metavalue('administrative_area_level_1');

                                            if ( !empty( $estados ) ) {
                                                foreach ( $estados as $estado ) {
                                                    echo '<option value="' . esc_attr( $estado ) . '">' . esc_html( $estado ) . '</option>';
                                                }
                                            }

                                            ?>     
                                        </select>
                                        <!-- city selector  -->
                                        <select class="wide filtro-select ciudades-select" id="cars-city-selector">
                                            <option data-display="Todas las ciudades" value="Mostrar Todas">Todas las ciudades</option>
                                            <?php

                                            $ciudades = query_db_metavalue('locality');

                                            if ( !empty( $ciudades ) ) {
                                                foreach ( $ciudades as $ciudad ) {
                                                    echo '<option value="' . esc_attr( $ciudad ) . '">' . esc_html( $ciudad ) . '</option>';
                                                }
                                            }

                                            ?>     
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="listing-search-filter mb-40">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="filter-left d-flex align-items-center">
                                    <div class="show-text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row listing-grid-wrapper" id="listing-cars">
                        <?php
						if ( have_posts() ) :

							$count = 0; 

							while (have_posts()) :
                                
								the_post();
								++$count;
						?>
                        <div class="col-md-6">
                            <?php get_template_part('template-parts/cars', 'grid'); ?>
                        </div>
                        <?php
                        if ( $count % 2 == 0 ) { 

                            echo '</div><div class="row listing-grid-wrapper">';

                        }
                        endwhile;
                        else :

                            get_template_part('template-parts/cars', 'none');

                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== End Listing Section ======-->
</main><!-- #main -->
<?php
get_footer();