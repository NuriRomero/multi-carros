<?php
/**
 * The template for displaying archive cars, this template renders the cars listing in grid format
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
											name="search" required>
										<i class="ti-search"></i>
									</div>
									<div class="form_group cars-categories" id="filtro-multiple">
										<!-- brand selector  -->
										<select class="wide" id="cars-brand-selector" class="filtro-select">
											<option data-display="Todas las marcas">Todas las marcas</option>
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
										<select class="wide" id="cars-fuel-selector" class="filtro-select">
											<option data-dsplay="Todos los tipos de combustibles">Todos los tipos de
												combustible</option>
											<?php
											$args      = array(
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
										<select class="wide" id="cars-condition-selector" class="filtro-select">
											<option data-dsplay="Todos las condiciones de autos">Todas las condiciones
												de autos</option>
											<?php
											$args           = array(
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
										<select class="wide" id="cars-type_car-selector" class="filtro-select">
											<option data-dsplay="Todos los estados">Todas los tipos de auto</option>
											<?php
											$args       = array(
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
										<span>Mostrando resultados  1-09</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row listing-grid-wrapper" id="listing-cars">
						<?php 
						
						$term_slugs = array(
							'brand' => 'Chevrolet',       // Término "Toyota" en la taxonomía "brand"
							'fuel' => 'Gasolina',     // Término "Gasoline" en la taxonomía "fuel"
							'condition' => 'Usado', // Término "Excellent" en la taxonomía "condition"
							'type_car' => 'Camioneta pickup', // Término "Excellent" en la taxonomía "condition"
							);
							// Realizamos una consulta para encontrar posts que cumplan con todas las condiciones
							$query = new WP_Query(array(
							'post_type' => 'cars', // Tipo de post "cars"
							'tax_query' => array(
								'relation' => 'AND', // Relación "AND" para asegurarnos de que cumpla con todas las condiciones
								// Agregamos las condiciones de taxonomía
								array(
									'taxonomy' => 'brand',
									'field' => 'slug',
									'terms' => $term_slugs['brand'],
								),
								array(
									'taxonomy' => 'fuel',
									'field' => 'slug',
									'terms' => $term_slugs['fuel'],
								),
								array(
									'taxonomy' => 'condition',
									'field' => 'slug',
									'terms' => $term_slugs['condition'],
								),
								array(
									'taxonomy' => 'type_car',
									'field' => 'slug',
									'terms' => $term_slugs['type_car'],
								),
							),
							));
							// Verificamos si hay posts que cumplan con todas las condiciones
							if ($query->have_posts()) {
							echo 'Los siguientes posts cumplen con todas las condiciones:';
							while ($query->have_posts()) {
								$query->the_post();
								echo '<br>';
								echo 'Título: ' . get_the_title();
								echo '<br>';
								echo 'URL: ' . get_permalink();
								echo '<br>';
								// Agrega más detalles del post según sea necesario
							}
							wp_reset_postdata(); // Restauramos los datos del post
							} else {
							echo 'Ningún post cumple con todas las condiciones.';
							}
						?>
						<?php
						if ( have_posts() ) :
							$count = 0; // Contador para las columnas
							while ( have_posts() ) :
								the_post();
								++$count;
								?>
						<div class="col-md-4">
							<!-- Aquí está el contenido de cada carro -->
								<?php get_template_part( 'template-parts/cars', 'grid' ); ?>
						</div>
								<?php
								if ( $count % 3 == 0 ) {
									echo '</div><div class="row listing-grid-wrapper">';
								}
							endwhile;
						else :
							get_template_part( 'template-parts/cars', 'none' );
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== End Listing Section ======-->

</main><!-- #main -->
<script>
	// Obtener los valores seleccionados de los selectores
var selectedBrand = document.getElementById("cars-brand-selector").value;
var selectedFuel = document.getElementById("cars-fuel-selector").value;
var selectedCondition = document.getElementById("cars-condition-selector").value;
var selectedTypeCar = document.getElementById("cars-type_car-selector").value;

// Crear un objeto de consulta de WordPress (WP_Query)
var queryArgs = {
  'post_type': 'cars', // Tipo de post 'cars'
  'posts_per_page': -1, // Mostrar todos los resultados
  'tax_query': {
    'relation': 'AND', // Relación "AND" para asegurarse de que cumpla con todas las condiciones
    'brand': {
      'taxonomy': 'brand',
      'field': 'slug',
      'terms': selectedBrand
    },
    'fuel': {
      'taxonomy': 'fuel',
      'field': 'slug',
      'terms': selectedFuel
    },
    'condition': {
      'taxonomy': 'condition',
      'field': 'slug',
      'terms': selectedCondition
    },
    'type_car': {
      'taxonomy': 'type_car',
      'field': 'slug',
      'terms': selectedTypeCar
    }
  }
};

// Realizar la consulta de WordPress
var carQuery = new WP_Query(queryArgs);

// Verificar si hay carros que cumplan con las condiciones
if (carQuery.have_posts()) {
  console.log('Los siguientes carros cumplen con todas las condiciones:');
  while (carQuery.have_posts()) {
    carQuery.next_post();
    console.log('Título: ' + carQuery.post.title);
    console.log('URL: ' + carQuery.post.permalink);
    // Agregar más detalles del carro según sea necesario
  }
} else {
  console.log('Ningún carro cumple con todas las condiciones.');
}

</script>

<?php
get_footer();
