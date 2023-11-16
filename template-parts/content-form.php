<!--====== Start Hero Section ======-->
<style>
    /* Estilos para el botón */
    .add-listing-form input[type="submit"] {
        display: block;
        margin: 0 auto; /* Centra el botón horizontalmente */
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        text-align: center;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .add-listing-form input[type="submit"]:hover {
        background-color: #0056b3;
    }

    /* Estilos adicionales según tus necesidades */
    .add-listing-form {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .title {
        color: #333;
    }

    .breadcrumbs-link a {
        color: #007bff;
        text-decoration: none;
    }

    .breadcrumbs-link a:hover {
        text-decoration: underline;
    }
</style>

<section class="hero-area">
	<div class="breadcrumbs-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="page-title">
						<h1 class="title">Publicar un Auto</h1>
						<ul class="breadcrumbs-link">
							<li><a href="index.html">Inicio</a></li>
							<li class="active">Listar</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</section>
<!--====== End Hero Section ======-->
<!--====== Start Add Listing Section ======-->
<section class="fioxen-add-listing pt-120 pb-120">
	<div class="container">
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" enctype="multipart/form-data">
			<input type="hidden" name="action" value="submit_car_listing">
			<div class="row justify-content-center">
				<div class="col-lg-20">
					<div class="add-listing-form general-listing-form mb-50 wow fadeInUp">
						<h4 class="title">Registrar Auto</h4>
							<?php echo do_shortcode('[car_shortcode]'); ?>
				    </div>
			    </div>
		    </div>
		</form>
	</div>
</section>
<!--====== End Add Listing Section ======-->
