<!--====== Start Hero Section ======-->
<section class="hero-area">
	<div class="breadcrumbs-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="page-title">
						<h1 class="title">Add Listing</h1>
						<ul class="breadcrumbs-link">
							<li><a href="index.html">Home</a></li>
							<li class="active">Listing</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====== End Hero Section ======-->
<!--====== Start Add Listing Section ======-->
<!--====== Start Add Listing Section ======-->
<section class="fioxen-add-listing pt-120 pb-120">
	<div class="container">
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" enctype="multipart/form-data">
			<input type="hidden" name="action" value="submit_car_listing">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="add-listing-form general-listing-form mb-60 wow fadeInUp">
						<h4 class="title">Registrar Auto</h4>
						<div class="row">
							<div class="col-lg-6">
								<div class="form_group">
									<input type="text" class="form_control" placeholder="Marca" name="marca" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form_group">
									<input type="text" class="form_control" placeholder="Modelo" name="modelo" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form_group">
									<input type="text" class="form_control" placeholder="Color" name="color" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form_group">
									<input type="text" class="form_control" placeholder="Año Modelo" name="ano_modelo" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form_group">
									<input type="text" class="form_control" placeholder="Ciudad" name="ciudad" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form_group">
									<p>Transmisión:</p>
									<div class="single-checkbox d-flex">
										<input type="checkbox" id="manual" name="transmision[]" value="manual">
										<label for="manual"><span>Manual </span></label>

									<div class="single-checkbox d-flex">
										<input type="checkbox" id="automatico" name="transmision[]" value="automatico">
										<label for="automatico"><span>Automático</span></label>
									</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form_group">
									<input type="number" class="form_control" placeholder="Precio" name="precio" required>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form_group">
									<textarea class="form_control" placeholder="Descripción" name="descripcion"></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form_group">
									<label for="imagen">Imagen:</label>
									<input type="file" name="imagen" required>
								</div>
							</div>
						</div>
					</div>
					<div class="button text-center">
						<button class="main-btn icon-btn" type="submit">Publicar</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
<!--====== End Add Listing Section ======-->
