<?php
/**
 * steklodom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package steklodom
 */

if ( ! function_exists( 'steklodom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function steklodom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on steklodom, use a find and replace
		 * to change 'steklodom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'steklodom', get_template_directory() . '/languages' );
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'video' ) );

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
		register_nav_menus( array(
			'menu-top' => esc_html__( 'Primary', 'steklodom' ),
			'menu-categories' => esc_html__( 'Categories', 'steklodom' ),
			'menu-footer' => esc_html__( 'Footer', 'steklodom' ),
			'menu-footer-catalog' => esc_html__( 'Footer catalog', 'steklodom' ),
			'menu-sidebar' => esc_html__( 'Menu sidebar', 'steklodom' ),
			'menu-order-page' => esc_html__( 'Menu for order page', 'steklodom' ),
		) );

		class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu{

			function start_lvl(&$output, $depth = 0, $args = array()){
				$indent = str_repeat("\t", $depth); 
			}
			function end_lvl(&$output, $depth = 0, $args = array()){
				$indent = str_repeat("\t", $depth);
			}
			function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		 		
		 		$output .= '<option value="' . $item->title . '">' . $item->title;
			}	
			function end_el(&$output, $item, $depth = 0, $args = array()){
				$output .= "</option>\n";
			}
		}

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'steklodom_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'steklodom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function steklodom_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'steklodom_content_width', 640 );
}
add_action( 'after_setup_theme', 'steklodom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function steklodom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'steklodom' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'steklodom' ),
		'before_widget' => '<div class="catalog">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="catalog-heading">',
		'after_title'   => '</p>',
	) );

	register_sidebar(array(
		'name'			=> esc_html__('Dropdwn menu for order', 'steklodom'),
		'id'			=> 'sidebar-2',
		'description'	=> esc_html__('Add widget for order page', 'steklodom'),
	));
}
add_action( 'widgets_init', 'steklodom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function steklodom_scripts() {
	wp_enqueue_style( 'steklodom-style', get_stylesheet_uri() );

	wp_enqueue_style( 'steklodom-bootstrap-3.3.7', get_template_directory_uri() . '/assets/css/bootstrap-3.3.7.min.css' );

	wp_enqueue_style( 'steklodom-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );

	wp_enqueue_style( 'steklodom-screen', get_template_directory_uri() . '/assets/css/screen.css' );


	wp_deregister_script('jquery');

	wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', null, null, false);

	wp_enqueue_script('steclodom-owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '', true);

	wp_enqueue_script('steclodom-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true);

	wp_enqueue_script('steclodom-jquery-mask-js', get_template_directory_uri() . '/assets/js/jquery.mask.js', array('jquery'), '', true);

	wp_enqueue_script('api-maps-yandex', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU', array('jquery'), '', true );

	wp_enqueue_script('steclodom-scripts-js', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '', true);
	/*wp_enqueue_script( 'steklodom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'steklodom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}*/


}
add_action( 'wp_enqueue_scripts', 'steklodom_scripts' );

// Регистрирую настройки для отображения телефонов
function steclodom_options()
{
	add_settings_field('total_title', 'Полное название компании', 'total_title_company', 'general');
	register_setting('general', 'total_title_company');

	add_settings_field('phones_company', 'Телефоны компании (1)', 'telephone_company', 'general');
	register_setting('general', 'phones_company');

	add_settings_field('phones_company_2', 'Телефоны компании (2)', 'telephone_company_2', 'general');
	register_setting('general', 'phones_company_2');

	add_settings_field('phones_company_3', 'Телефоны компании (3)', 'telephone_company_3', 'general');
	register_setting('general', 'phones_company_3');

	add_settings_field('worktime', 'Время работы', 'working_time', 'general');
	register_setting('general', 'working_time');

	add_settings_field('dayOff', 'Выходные', 'day_off', 'general');
	register_setting('general', 'day_off');

	add_settings_field('additional_desc', 'Дополнительное описание', 'additional_description', 'general');
	register_setting('general', 'additional_description');

	add_settings_field('address', 'Адрес компании', 'display_address', 'general');
	register_setting('general', 'display_address');
}

function total_title_company()
{
	echo '<input type="text" class="regular-text" name="total_title_company" value="'.esc_attr(get_option('total_title_company')).'" />';
}

function display_address()
{
	echo '<input type="text" class="regular-text" name="display_address" value="'.esc_attr(get_option('display_address')).'" />';
}

function additional_description()
{
	echo '<input type="text" class="regular-text" name="additional_description" value="'.esc_attr(get_option('additional_description')).'" />';
}

function day_off()
{
	echo '<input type="text" class="regular-text" name="day_off" value="'.esc_attr(get_option('day_off')).'" />';
}

function working_time()
{
	echo '<input type="text" class="regular-text" name="working_time" value="'.esc_attr(get_option('working_time')).'" />';
}

function telephone_company()
{
	echo '<input type="text" class="regular-text" name="phones_company" value="'.esc_attr(get_option('phones_company')).'" />';
}

function telephone_company_2()
{
	echo '<input type="text" class="regular-text" name="phones_company_2" value="'.esc_attr(get_option('phones_company_2')).'" />';
	
}

function telephone_company_3()
{
	echo '<input type="text" class="regular-text" name="phones_company_3" value="'.esc_attr(get_option('phones_company_3')).'" />';
}

add_action('admin_menu', 'steclodom_options');

// виджеты
add_action('widgets_init', 'steklodom_widgets');
function steklodom_widgets()
{
	// виджет для иконок платежных карт
	register_sidebar(array(
		'name' => 'Платёжные карты',
		'id' => 'payments_methods_icons',
		'description' => 'Изображения для платежных карт',
		'before_widget' => '<ul id="steklodom_payment_widget">',
		'after_widget' => '</ul>'
	));
}
if( function_exists('acf_add_options_page') ) {
	$option_page = acf_add_options_page(array(
        'page_title'    => 'Настройки темы',
        'menu_title'    => 'Настройки темы',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'  => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Наши клиенты',
        'menu_title'    => 'Наши клиенты',
        'parent_slug'   => 'theme-general-settings',
        'menu_slug'     => 'steklodom_clients',
        'redirect'  => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Наши награды',
        'menu_title'    => 'Наши награды',
        'parent_slug'   => 'theme-general-settings',
        'menu_slug'     => 'steklodom_prize',
        'redirect'  => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Сертификаты',
        'menu_title'    => 'Сертификаты',
        'parent_slug'   => 'theme-general-settings',
        'menu_slug'     => 'steklodom_certificates',
        'redirect'  => false
    ));
}

add_image_size( 'category-preview', 270, 270, false );

// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<div class="row navigation %1$s" role="navigation">
		<div class="col-xs-12 nav-links">%3$s</div>
	</div>    
	';
}

add_filter('excerpt_more', function () {
	return '...';
});


/**
 * Implement the Custom Send Mail feature.
 */
require get_template_directory() . '/inc/custom-send-mail.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

