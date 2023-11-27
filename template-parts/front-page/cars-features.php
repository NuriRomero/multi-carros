
<!--====== Start Features Section ======-->
<section class="features-area">
	<div class="features-wrapper-one pt-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="features-img wow fadeInLeft">
						<img src="https://img.freepik.com/foto-gratis/hombre-comprando-carro_1303-13714.jpg?w=2000" alt="Features Image">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="features-content-box features-content-box-one">
						<div class="section-title section-title-left mb-25 wow fadeInUp">
							<span class="sub-title">Nuestra Especialidad</span>
							<h2>Descubre una Amplia Variedad de Opciones</h2>
						</div>
						<h5>Encuentra el automóvil que se ajusta a tus necesidades y deseos. En nuestro sitio de compra y venta de autos, te ofrecemos una amplia selección para elegir.</h5>
						<ul class="features-list-one">
							<li class="list-item wow fadeInUp" data-wow-delay="10ms">
								<div class="icon">
									<i class="flaticon-find"></i>
								</div>
								<div class="content">
									<h5>Sencillez y Comodidad en Cada Elección</h5>
									<p>Hacer tu elección nunca ha sido tan fácil. Navega por nuestras opciones con tranquilidad, sabiendo que cada paso es intuitivo y cómodo.</p>
								</div>
							</li>
							<li class="list-item wow fadeInUp" data-wow-delay="20ms">
								<div class="icon">
									<i class="flaticon-place"></i>
								</div>
								<div class="content">
									<h5>Asesoramiento en Línea en Vivo</h5>
									<p>No estás solo en este proceso. Nuestros expertos están aquí para asistirte en cada etapa. Desde responder preguntas hasta brindarte consejos útiles, estamos a tu disposición.</p>
								</div>
							</li>
							<li class="list-item wow fadeInUp" data-wow-delay="30ms">
								<div class="icon">
									<i class="flaticon-social-care"></i>
								</div>
								<div class="content">
									<h5>Encuentra lo que Buscas sin Complicaciones</h5>
									<p>No pierdas tiempo en la búsqueda. Nuestra plataforma te permite encontrar exactamente lo que necesitas, sin complicaciones ni demoras.</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====== End Features Section ======-->
<!--====== Start Place Section ======-->

<!--====== End Place Section ======-->
<!--====== Start Download Section ======-->
<section class="download-app">
	<div class="download-wrapper-one pt-115">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="app-img wow fadeInLeft">
						<img src="https://i.pinimg.com/736x/a0/b8/8f/a0b88ffc0f29251c90f2f8b26b30e5a5.jpg" alt="App Image">
					</div>
				</div>
				<div class="col-lg-7">
					<div class="download-content-box download-content-box-one">
						<div class="section-title section-title-left mb-25 wow fadeInUp">
							<span class="sub-title">Explora</span>
							<h2>Encuentra el auto perfecto en Multi Carros: la mejor opción para autos nuevos y usados</h2>
						</div>
						<p>Descubre vehículos de calidad en Multi Carros: tu destino para autos nuevos y usados.</p>
						
						<div class="counter-area pt-120">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-ms-12">
									<div class="counter-item counter-item-one wow fadeInUp">
										<div class="info">
											<h4><span>Autos</span>Nuevos Registrados</h4>
											<h3><span class="count"><?php echo obtener_numero_total_autos_nuevos(); ?></span> +</h3>
											
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-ms-12">
									<div class="counter-item counter-item-one wow fadeInUp">
										<div class="info">
											<h4><span>Autos</span>Semi Nuevos Registrados</h4>
											<h3><span class="count"><?php echo obtener_numero_total_autos_semi_nuevos(); ?></span> +</h3>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-ms-12">
									<div class="counter-item counter-item-one wow fadeInUp">
										<div class="info">
											<h4><span>Autos</span>Usados Registrados</h4>
											<h3><span class="count"><?php echo obtener_numero_total_autos_usados(); ?></span> +</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====== End Download Section ======-->
<br>
<!--====== Start Testimonial Section ======-->
<section class="testimonial-area bg_cover pt-110 pb-140"  style="background-color: red;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title section-title-two section-title-white text-center mb-55 wow fadeInUp">
					<h2><span>Preguntas</span> Frecuentes</h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="testimonial-wrapper-one text-center wow fadeInUp">
					<div class="testimonial-review-area">
						<div class="testimonial-content-slider-one">
							<?php
							$faq_page_id = get_page_by_path('preguntas-frecuentes');
							$faq_group = get_post_meta($faq_page_id->ID, 'main_information_metabox_faq_group', true);

							if ( $faq_group ) {

								
								foreach ( $faq_group as $group ) {
									echo '<div class="testimonial-item">';
									echo '<div class="testimonial-content">';	
									echo '<h4>' . esc_html($group['main_information_metabox_question']) . '</h4>';
									echo '<div class="author-info">';
									echo '<div class="author-title">';
									echo '<span class="position">'  . esc_html($group['main_information_metabox_answer']) . '</span>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							}

							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====== End Testimonial Section ======-->



