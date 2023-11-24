<?php
/**
 * Template part for displaying the hero banner in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Multi_Carros
 */

?>

<!--====== Start Hero Section ======-->
<section class="hero-area">
    <div class="hero-wrapper-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <h1 class="wow fadeInUp" wow-data-delay="30mss">Adéntrate en una experiencia apasionante</h1>
                        <h3 class="wow fadeInDown" wow-data-delay="50ms">"Aquí los autos encuentran a sus dueños." ¡Descubre el tuyo hoy mismo!</h3>
                        <div class="hero-search-wrapper wow fadeInUp" wow-data-delay="70ms">
                            <form class="row">
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                    <select class="wide filtro-select" id="cars-condition-selector">
                                        <option data-display="Condicion" value="Mostrar Todas">Todas las condiciones</option>
                                        <?php
                                        $args = array(
                                            'orderby' => 'name',
                                            'order'   => 'ASC',
                                            'hide_empty' => true,
                                        );
                                        $cars_condition = get_terms('condition', $args);
                                        foreach ($cars_condition as $item_condition) {
                                            echo '<option value="' . $item_condition->slug . '">' . $item_condition->name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- Repite este bloque para cada select -->
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                    <select class="wide filtro-select" id="cars-type_car-selector">
                                        <option data-display="Tipo de auto" value="Mostrar Todas">Todos los tipos de auto</option>
                                        <?php
                                        $args = array(
                                            'orderby' => 'name',
                                            'order'   => 'ASC',
                                            'hide_empty' => true,
                                        );
                                        $cars_types = get_terms('type_car', $args);
                                        foreach ($cars_types as $item_type_car) {
                                            echo '<option value="' . $item_type_car->slug . '">' . $item_type_car->name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                    <select class="wide filtro-select" id="cars-brand-selector">
                                        <option data-display="Marca" value="Mostrar Todas">Todas las marcas</option>
                                        <?php
                                        $args = array(
                                            'orderby' => 'name',
                                            'order' => 'ASC',
                                            'hide_empty' => true,
                                        );
                                        $cars_brand = get_terms('brand', $args);
                                        foreach ($cars_brand as $item_brand) {
                                            echo '<option value="' . $item_brand->slug . '">' . $item_brand->name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- Repite este bloque para cada select -->
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                    <select class="wide filtro-select" id="cars-fuel-selector" name="fuel">
                                        <option data-display="Tipo de combustible" value="Mostrar Todas">Todos los tipos de combustible</option>
                                        <?php
                                        $args = array(
                                            'orderby' => 'name',
                                            'order' => 'ASC',
                                            'hide_empty' => true,
                                        );
                                        $cars_fuel = get_terms('fuel', $args);
                                        foreach ($cars_fuel as $item_fuel) {
                                            echo '<option value="' . $item_fuel->slug . '">' . $item_fuel->name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- Fin del bloque repetido -->
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                    <select class="wide filtro-select estados-select" id="cars-state-selector">
                                        <option data-display="Estados" value="Mostrar Todas">Todos los estados</option>
                                        <?php
                                        $estados = query_db_metavalue('administrative_area_level_1');
                                        if (!empty($estados)) {
                                            foreach ($estados as $estado) {
                                                echo '<option value="' . esc_attr($estado) . '">' . esc_html($estado) . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                    <select class="wide filtro-select ciudades-select" id="cars-city-selector">
                                        <option data-display="Ciudades" value="Mostrar Todas">Todas las ciudades</option>
                                        <?php
                                        $ciudades = query_db_metavalue('locality');
                                        if (!empty($ciudades)) {
                                            foreach ($ciudades as $ciudad) {
                                                echo '<option value="' . esc_attr($ciudad) . '">' . esc_html($ciudad) . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                    <div class="form_group">
                                        <button class="main-btn icon-btn" id="buscar-button">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- <p class="tags"><span>Popular:</span><a href="#">Saloon</a>,<a href="#">Restaurant</a>,<a href="#">Game</a>,<a href="#">Counter</a>,<a href="#">Train Station</a>,<a href="#">Parking</a>,<a href="#">Shooping</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== End Hero Section ======-->
