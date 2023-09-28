<?php
/**
 * Multi Carros functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Multi_Carros
 */

if ( ! defined( 'MULTI_CARROS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'MULTI_CARROS_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function multi_carros_setup() {
	load_theme_textdomain( 'multi-carros', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'primary-menu'            => esc_html__( 'Primary', 'multi-carros' ),
			'footer-menu'             => esc_html__( 'Secondary', 'multi-carros' ),
			'footer-menu-quick-links' => esc_html__( 'Tertiary', 'multi-carros' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'multi_carros_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'multi_carros_setup' );
/**
 * Define the content width for embedded media and images.
 */
function multi_carros_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'multi_carros_content_width', 640 );
}
add_action( 'after_setup_theme', 'multi_carros_content_width', 0 );
/**
 * Register widget area.
 */
function multi_carros_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'multi-carros' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'multi-carros' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'multi_carros_widgets_init' );
/**
 * Handles the submission of car listings from a form.
 */
function submit_car_listing_handler() {
	// Verificar si se ha enviado el formulario correctamente.
	if ( isset( $_POST['action'] ) && 'submit_car_listing' === $_POST['action'] ) {
		check_admin_referer( 'car_listing_nonce' );

		// Verificar si los índices del array $_POST están definidos antes de usarlos.
		$marca       = isset( $_POST['marca'] ) ? sanitize_text_field( wp_unslash( $_POST['marca'] ) ) : '';
		$modelo      = isset( $_POST['modelo'] ) ? sanitize_text_field( wp_unslash( $_POST['modelo'] ) ) : '';
		$descripcion = isset( $_POST['descripcion'] ) ? sanitize_textarea_field( wp_unslash( $_POST['descripcion'] ) ) : '';
		$transmision = isset( $_POST['transmision'] ) ? sanitize_text_field( wp_unslash( $_POST['transmision'] ) ) : '';
		$color       = isset( $_POST['color'] ) ? sanitize_text_field( wp_unslash( $_POST['color'] ) ) : '';
		$anio_modelo = isset( $_POST['anio_modelo'] ) ? sanitize_text_field( wp_unslash( $_POST['anio_modelo'] ) ) : '';
		$ciudad      = isset( $_POST['ciudad'] ) ? sanitize_text_field( wp_unslash( $_POST['ciudad'] ) ) : '';
		$precio      = isset( $_POST['precio'] ) ? floatval( $_POST['precio'] ) : 0.0; // Asumiendo que el precio es un número decimal.

		// Crear un nuevo post de tipo "car_listing".
		$new_post = array(
			'post_title'   => $marca . ' ' . $modelo, // Título del post.
			'post_content' => $descripcion, // Contenido del post.
			'post_status'  => 'publish', // Estado del post (publicado).
			'post_type'    => 'car_listing', // Tipo de contenido personalizado.
		);

		// Insertar el nuevo post en la base de datos.
		$post_id = wp_insert_post( $new_post );

		// Asignar categorías al post si es necesario.
		$categorias = array( 'nombre_de_la_categoria' ); // Reemplaza 'nombre_de_la_categoria' con el nombre de la categoría adecuada.
		wp_set_post_categories( $post_id, $categorias );

		// Actualizar campos personalizados si es necesario.
		update_post_meta( $post_id, 'transmision', $transmision );
		update_post_meta( $post_id, 'color', $color );
		update_post_meta( $post_id, 'anio_modelo', $anio_modelo );
		update_post_meta( $post_id, 'ciudad', $ciudad );
		update_post_meta( $post_id, 'precio', $precio );

		// Redirigir después de crear el post.
		wp_safe_redirect( get_permalink( $post_id ) );
		exit;

	}
}

// Agregar las acciones con los ganchos adecuados.
add_action( 'admin_post_submit_car_listing', 'submit_car_listing_handler' );
add_action( 'admin_post_nopriv_submit_car_listing', 'submit_car_listing_handler' );

/**
 * Enqueue scripts and styles for the theme .
 */
function multi_carros_scripts() {
	wp_enqueue_style( 'multi-carros-style', get_stylesheet_uri(), array(), MULTI_CARROS_VERSION );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.6.0' );
	wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/fonts/themify-icons/themify-icons.css', array(), MULTI_CARROS_VERSION );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/flaticon.css', array(), MULTI_CARROS_VERSION );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), MULTI_CARROS_VERSION );
	wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), MULTI_CARROS_VERSION );
	wp_enqueue_style( 'owl.theme.default', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), MULTI_CARROS_VERSION );
	wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css', array(), MULTI_CARROS_VERSION );
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css', array(), MULTI_CARROS_VERSION );
	wp_enqueue_style( 'meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.min.css', array(), MULTI_CARROS_VERSION );
	wp_enqueue_style( 'wow', get_template_directory_uri() . '/assets/css/animate.css', array(), MULTI_CARROS_VERSION );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array(), MULTI_CARROS_VERSION );

	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array( 'jquery' ), '1.16.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '4.6.0', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.js', array( 'jquery' ), MULTI_CARROS_VERSION, true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(), MULTI_CARROS_VERSION, true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array( 'jquery' ), MULTI_CARROS_VERSION, true );
	wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), MULTI_CARROS_VERSION, true );
	wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.js', array( 'jquery' ), MULTI_CARROS_VERSION, true );
	wp_enqueue_script( 'ajax-mail', get_template_directory_uri() . '/assets/js/ajax-mail.js', array(), MULTI_CARROS_VERSION, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), MULTI_CARROS_VERSION, true );

	wp_localize_script( 'ajax-mail', 'ajax_mail_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'multi_carros_scripts' );

/**
 * Enqueue comments reply script for threaded comments.
 */
function multi_carros_enqueue_comments_reply() {
	if ( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'comment_form_before', 'multi_carros_enqueue_comments_reply' );

/**
 * Enqueue live preview scripts for the customizer.
 */
function multi_carros_customizer_live_preview() {
	wp_enqueue_script(
		'multi-carros-themecustomizer',
		get_template_directory_uri() . '/assets/js/themecustomizer.js',
		array( 'jquery', 'customize-preview' ),
		MULTI_CARROS_VERSION,
		true
	);
}
add_action( 'customize_preview_init', 'multi_carros_customizer_live_preview' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/cars-filters.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load custom queries.
 */
require_once get_template_directory() . '/inc/queries.php';
