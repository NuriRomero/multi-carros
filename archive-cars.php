<?php
/**
 * The template for displaying archive cars,this template render the cars listing in grid format
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
                    <div class="sidebar-widget-area">
                        <div class="widget search-listing-widget mb-30 wow fadeInUp">
                            <h4 class="widget-title">Filter Search</h4>
                            <form>
                                <div class="search-form">
                                    <div class="form_group">
                                        <input type="search" class="form_control" placeholder="Search keyword" name="search" required>
                                        <i class="ti-search"></i>
                                    </div>
                                    <div class="form_group cars-categories">
                                        <!-- brand selector  -->
                                        <select class="wide" id="cars-brand-selector">
                                            <option data-display="Todas las marcas">Todas las marcas</option>
                                            <?php
                                            $args = array(
                                                'orderby' => 'name',
                                                'order' => 'ASC',
                                                'hide_empty' => true,
                                            );
                                            $cars_brand = get_terms('brand', $args);
                                            foreach ($cars_brand as $item_brand) {
                                                echo '<option value="'.$item_brand->slug.'">'.$item_brand->name.'</option>';
                                            }
                                            
                                            ?>       
                                        </select>
                                        
                                        <!-- fuel selector  -->
                                        <select class="wide" id="cars-fuel-selector">
                                            <option data-dsplay="Todas los tipos de combustibles">Todos los tipos de combustible</option>
                                            <?php
                                            $args = array(
                                                'orderby' => 'name',
                                                'order' => 'ASC',
                                                'hide_empty' => true,
                                            );
                                            $cars_fuel = get_terms('fuel', $args);
                                            foreach ($cars_fuel as $item_fuel) {
                                                echo '<option value="'.$item_fuel->slug.'">'.$item_fuel->name.'</option>';
                                            }
                                            ?>       
                                        </select>
                                       
                                        <!-- condition selector  -->
                                        <select class="wide" id="cars-condition-selector">
                                            <option data-dsplay="Todos las condiciones de autos">Todas las condiciones de autos</option>
                                            <?php
                                            $args = array(
                                                'orderby' => 'name',
                                                'order' => 'ASC',
                                                'hide_empty' => true,
                                            );
                                            $cars_condition = get_terms('condition', $args);
                                            foreach ($cars_condition as $item_condition) {
                                                echo '<option value="'.$item_condition->slug.'">'.$item_condition->name.'</option>';
                                            }
                                            ?>       
                                        </select>
                                          <!-- type_car selector  -->
                                          <select class="wide" id="cars-type_car-selector">
                                            <option data-dsplay="Todos los estados">Todas los tipos de auto</option>
                                            <?php
                                            $args = array(
                                                'orderby' => 'name',
                                                'order' => 'ASC',
                                                'hide_empty' => true,
                                            );
                                            $cars_types = get_terms('type_car', $args);
                                            foreach ($cars_types as $item_type_car) {
                                                echo '<option value="'.$item_type_car->slug.'">'.$item_type_car->name.'</option>';
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
                                        <span>Showing Result 1-09</span>
                                    </div>
                                    <div class="sorting-dropdown">
                                        <select>
                                            <option data-dsplay="Default Sorting">Default Sorting</option>
                                            <option value="01">Museums</option>
                                            <option value="02">Restaurant</option>
                                            <option value="03">Party Center</option>
                                            <option value="04">Fitness Zone</option>
                                            <option value="05">Game Field</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="filter-right">
                                    <ul class="filter-nav">
                                        <li><a href="listing-grid.html" class="active"><i class="ti-view-grid"></i></a></li>
                                        <li><a href="listing-list.html"><i class="ti-view-list-alt"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="listing-grid-wrapper" id="listing-cars">
                        <?php
                        if(have_posts()):
                            while (have_posts()):
                                the_post();
                                /*
                                 * Include the Post-Type-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                 */
                                get_template_part('template-parts/cars', 'grid');

                            endwhile;
                        else:
                            get_template_part('template-parts/cars', 'none');

                        endif;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== End Listing Section ======-->

</main><!-- #main -->

<?php
get_footer();