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

	add_image_size( 'car_size_photo', 770, 500, true);
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Multi Carros, use a find and replace
		* to change 'multi-carros' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'multi-carros', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary', 'multi-carros' ),
			'footer-menu' => esc_html__( 'Secondary', 'multi-carros' ),
			'footer-menu-quick-links' => esc_html__( 'Tertiary', 'multi-carros' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
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

	// Set up the WordPress core custom background feature.
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

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
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
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function multi_carros_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'multi_carros_content_width', 640 );
}
add_action( 'after_setup_theme', 'multi_carros_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
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

// Función para manejar el formulario
function submit_car_listing_handler() {
    if (isset($_POST['action']) && $_POST['action'] === 'submit_car_listing') {
        $post_title = sanitize_text_field($_POST['marca'] . ' ' . $_POST['modelo']);
        $post_content = wp_kses_post($_POST['descripcion']);

        // Asegurarse de registrar el tipo de post personalizado "cars" previamente

        $transmision = isset($_POST['transmision']) ? implode(', ', $_POST['transmision']) : '';

        $new_post = array(
            'post_title'   => $post_title,
            'post_content' => $post_content,
            'post_status'  => 'publish',
            'post_type'    => 'cars' // cars
        );

        // new post
        $post_id = wp_insert_post($new_post);

        if ($post_id) {
            // metadata
            update_post_meta($post_id, 'marca', sanitize_text_field($_POST['marca']));
            update_post_meta($post_id, 'modelo', sanitize_text_field($_POST['modelo']));
            update_post_meta($post_id, 'color', sanitize_text_field($_POST['color']));
            update_post_meta($post_id, 'anio_modelo', sanitize_text_field($_POST['anio_modelo']));
            update_post_meta($post_id, 'ciudad', sanitize_text_field($_POST['ciudad']));
            update_post_meta($post_id, 'transmision', $transmision);
            update_post_meta($post_id, 'precio', floatval($_POST['precio']));

            // Subir y adjuntar la imagen al post
            if ($_FILES['imagen']['tmp_name']) {
                $upload = wp_upload_bits($_FILES['imagen']['name'], null, file_get_contents($_FILES['imagen']['tmp_name']));
                if (isset($upload['error']) && $upload['error'] != 0) {
                    echo "Hubo un error al subir la imagen.";
                } else {
                    $image_path = $upload['file'];
                    $file_type = wp_check_filetype(basename($image_path), null);
                    $attachment = array(
                        'post_mime_type' => $file_type['type'],
                        'post_title' => $post_title,
                        'post_content' => '',
                        'post_status' => 'inherit'
                    );
                    $attachment_id = wp_insert_attachment($attachment, $image_path, $post_id);
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    $attachment_data = wp_generate_attachment_metadata($attachment_id, $image_path);
                    wp_update_attachment_metadata($attachment_id, $attachment_data);
                    set_post_thumbnail($post_id, $attachment_id);
                }
            }

            echo "¡El post de tipo 'cars' se creó exitosamente! Puedes verlo <a href='" . get_permalink($post_id) . "'>aquí</a>.";
        } else {
            echo "Hubo un error al crear el post.";
        }
    }
}

// Registra la acción para manejar el formulario
add_action('admin_post_submit_car_listing', 'submit_car_listing_handler');
add_action('admin_post_nopriv_submit_car_listing', 'submit_car_listing_handler');

/**
 * Enqueue scripts and styles.
 */
function multi_carros_scripts() {

	wp_enqueue_style( 'multi-carros-style', get_stylesheet_uri(), array(), MULTI_CARROS_VERSION );
	wp_enqueue_style( 'bootstrap',get_template_directory_uri(). '/assets/css/bootstrap.min.css', array(),'4.6.0');
	wp_enqueue_style( 'themify-icons',get_template_directory_uri(). '/assets/fonts/themify-icons/themify-icons.css', array(),MULTI_CARROS_VERSION);
	wp_enqueue_style( 'flaticon',get_template_directory_uri(). '/assets/fonts/flaticon/flaticon.css', array(),MULTI_CARROS_VERSION);
	wp_enqueue_style( 'magnific-popup',get_template_directory_uri(). '/assets/css/magnific-popup.css', array(),MULTI_CARROS_VERSION);
	wp_enqueue_style( 'slick',get_template_directory_uri(). '/assets/css/slick.css', array(),MULTI_CARROS_VERSION);
	wp_enqueue_style( 'nice-select',get_template_directory_uri(). '/assets/css/nice-select.css', array(),MULTI_CARROS_VERSION);
	wp_enqueue_style( 'jquery-ui',get_template_directory_uri(). '/assets/css/jquery-ui.min.css', array(),MULTI_CARROS_VERSION);
	wp_enqueue_style( 'animate',get_template_directory_uri(). '/assets/css/animate.css', array(),MULTI_CARROS_VERSION);
	wp_enqueue_style( 'default',get_template_directory_uri(). '/assets/css/default.css', array(),MULTI_CARROS_VERSION);
	wp_enqueue_style( 'style-fioxen',get_template_directory_uri(). '/assets/css/style.css', array(),MULTI_CARROS_VERSION);
	wp_style_add_data( 'multi-carros-style', 'rtl', 'replace' );

	wp_enqueue_script( 'multi-carros-navigation', get_template_directory_uri() . '/js/navigation.js', array(), MULTI_CARROS_VERSION, true );
	wp_enqueue_script('jquery');
	wp_enqueue_script('popper', get_template_directory_uri().'/assets/js/popper.min.js', array(), MULTI_CARROS_VERSION,true);
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), MULTI_CARROS_VERSION,true);
	wp_enqueue_script('slick', get_template_directory_uri().'/assets/js/slick.min.js', array(), MULTI_CARROS_VERSION,true);
	wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js', array(), MULTI_CARROS_VERSION, true);
	wp_enqueue_script('isotope', get_template_directory_uri().'/assets/js/isotope.pkgd.min.js', array(), MULTI_CARROS_VERSION, true);
	wp_enqueue_script('imagesloaded', get_template_directory_uri().'/assets/js/imagesloaded.pkgd.min.js', array(),MULTI_CARROS_VERSION, true);
	wp_enqueue_script('jquery-nice-select', get_template_directory_uri().'/assets/js/jquery.nice-select.min.js', array(), MULTI_CARROS_VERSION, true);
	wp_enqueue_script('counterup', get_template_directory_uri().'/assets/js/jquery.counterup.min.js', array(), MULTI_CARROS_VERSION,true);
	wp_enqueue_script('jquery-waypoints', get_template_directory_uri().'/assets/js/jquery.waypoints.js', array(),MULTI_CARROS_VERSION,true);
	wp_enqueue_script('jquery-ui ', get_template_directory_uri().'/assets/js/jquery-ui.min.js', array(), MULTI_CARROS_VERSION,true);
	wp_enqueue_script('wow', get_template_directory_uri().'/assets/js/wow.min.js', array(), MULTI_CARROS_VERSION,true);
	wp_enqueue_script('main-fioxen', get_template_directory_uri().'/assets/js/main.js', array(), MULTI_CARROS_VERSION,true);
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_localize_script( 'main-fioxen','cars',array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'multi_carros_scripts' );

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