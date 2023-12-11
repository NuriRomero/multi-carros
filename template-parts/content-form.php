<!--====== Start Hero Section ======-->
<style>
    /* Estilos para el botón */
    .add-listing-form input[type="submit"] {
        display: block;
        margin: 0 auto; /* Centra el botón horizontalmente */
        background-color: #4caf50;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        text-align: center;
        text-decoration: none;
        border: 2px solid #4caf50;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease, border 0.3s ease;
    }

    .add-listing-form input[type="submit"]:hover {
        background-color: #45a049;
    }

    /* Estilos adicionales según tus necesidades */
    .hero-area {
        background-color: #f5f5f5;
        padding: 50px 0;
        text-align: center;
    }

    .page-title {
        margin-bottom: 30px;
    }

    .fioxen-add-listing {
        background-color: #fff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 30px;
    }

    .add-listing-form h4 {
        color: #007bff;
        margin-bottom: 20px;
    }

    .add-listing-form form {
        max-width: 800px;
        margin: 0 auto;
    }

    .add-listing-form label {
        display: block;
        margin-bottom: 10px;
        color: #555;
    }

    .add-listing-form input[type="text"],
    .add-listing-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
</style>

<section class="hero-area">
	<div class="breadcrumbs-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="page-title">
						<h1 class="title">Publicar un Auto</h1>
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
				<div class="col-12">
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
