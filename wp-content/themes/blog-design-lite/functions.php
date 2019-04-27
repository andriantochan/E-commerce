<?php
/**
 *  Blog Design Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blog Design Lite
 * @since 1.0
 */

// Defining Some Variable
if( !defined( 'BLOG_DESIGN_LITE_VERSION' ) ) {
	define('BLOG_DESIGN_LITE_VERSION', '1.0.4'); // Theme Version
}
if( !defined( 'BLOG_DESIGN_LITE_DIR' ) ) {
	define( 'BLOG_DESIGN_LITE_DIR', get_template_directory() ); // Theme dir
}
if( !defined( 'BLOG_DESIGN_LITE_URL' ) ) {
	define( 'BLOG_DESIGN_LITE_URL', get_template_directory_uri() ); // Theme url
}


// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 1170;
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blog_design_lite_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Blog Design Lite, use a find and replace
	 * to change 'blog-design-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'blog-design-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
        
        // This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
        
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );	   

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(		
		'main-menu' 	=> esc_html__( 'Main Menu', 'blog-design-lite' ),
		'top-menu' 	=> esc_html__( 'Top Menu', 'blog-design-lite' ),
		'footer-menu' 	=> esc_html__( 'Footer Menu', 'blog-design-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'blog_design_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for custom logo.
	add_theme_support( 'custom-logo' );

	// Post format.
	add_theme_support( 'post-formats', array('video', 'audio', 'quote', 'gallery'));
	
}
add_action( 'after_setup_theme', 'blog_design_lite_setup' );

/**
 * Admin Welcome Notice
 *
 * @package Blog Design Lite
 * @since 1.0
 */
function blog_design_lite_admin_welcom_notice() {
	global $pagenow;

	if ( is_admin() && isset( $_GET['activated'] ) && 'themes.php' === $pagenow ) {
		echo '<div class="updated notice notice-success is-dismissible"><p>'.sprintf( __( 'Thank you for choosing Blog Design Lite Blog Theme. To get started, visit our <a href="%s">welcome page</a>.', 'blog-design-lite' ), esc_url( admin_url( 'themes.php?page=blog-design-lite' ) ) ).'</p></div>';
	}
}
add_action( 'admin_notices', 'blog_design_lite_admin_welcom_notice' );


/**
 * Handles Post Classes
 *
 * @package Blog Design Lite
 * @since 1.0
 */
function blog_design_lite_render_post_classes( $classes ) {
	global $post_count,$count;
	$wrapper = has_post_thumbnail();   

	if ( $wrapper ) {
		$classes[] = 'blog_design-has-thumbnail';
	}
	if(is_home()) {
		$blog_layout_grid 	= blog_design_lite_get_theme_mod( 'blog_layout_grid' );
		$classes[] = 'blog-design-lite-columns blog-design-lite-masonry blog-design-lite-col-'.$blog_layout_grid;        

	} else if( is_search() || is_author() ) {         
        $classes[] = 'blog-design-lite-columns blog-design-lite-masonry blog-design-lite-col-4';                
	} else if( (is_category() || is_archive() || is_tag()) && ( (class_exists('WooCommerce') && !is_post_type_archive('product')) || !class_exists('WooCommerce') ) ) { // Category Page
		$cat_layout_grid 	= blog_design_lite_get_theme_mod( 'cat_layout_grid' );        
        $classes[] = 'blog-design-lite-columns blog-design-lite-masonry blog-design-lite-col-'.$cat_layout_grid;     
              
	}
	 return $classes;
	}

add_filter( 'post_class', 'blog_design_lite_render_post_classes' );
/**
	* Register Sidebars
	* 
	* @package Blog Design Lite
	* @since 1.0
	*/
	function blog_design_lite_register_sidebar() {

		// Main Sidebar Area
		register_sidebar( array(
			'name'          => esc_html__( 'Main Sidebar', 'blog-design-lite' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Appears on posts and pages.', 'blog-design-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
		
		

		// Footer Sidebar Area
		register_sidebar( array(
			'name'          => esc_html__( 'Footer', 'blog-design-lite' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Footer Widhet Area : Add widgets here.', 'blog-design-lite' ),
			'before_widget' => '<section id="%1$s" class="widget blog-design-lite-columns '. blog_design_lite_footer_widgets_cls( 'footer' ) .' %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));

		// Footer Instgarm Widget Area
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Instgarm Widget Area', 'blog-design-lite' ),
			'id'            => 'blog-design-lite-intsgram-feed',
			'description'   => esc_html__( 'Add widgets here.', 'blog-design-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
	}
	// Action to register sidebar
		
	add_action( 'widgets_init', 'blog_design_lite_register_sidebar' );
	
if ( ! function_exists( 'blog_design_lite_fonts_url' ) ) {
/**
 * Register Google fonts for Blog Design Lite.
 * Create your own blog_design_lite_fonts_url() function to override in a child theme.
 * @return string Google fonts URL for the theme.
 */
function blog_design_lite_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'blog-design-lite' ) ) {
		$fonts[] = 'Poppins:400,500,700';
	}
	/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'blog-design-lite' ) ) {
		$fonts[] = 'Roboto:400,500';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
}	
/**
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 *
 * @package Blog Design Lite
 * @since 1.0
 */
function blog_design_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blog_design_lite_pingback_header', 5 );

// Common Functions File
require_once BLOG_DESIGN_LITE_DIR . '/includes/blog-design-lite-functions.php';

// Custom template tags for this theme
require_once BLOG_DESIGN_LITE_DIR . '/includes/template-tags.php';

// Theme Customizer Settings
require_once BLOG_DESIGN_LITE_DIR . '/includes/customizer.php';

// Script Class
require_once( BLOG_DESIGN_LITE_DIR . '/includes/class-blog-design-lite-script.php' );

// Theme Dynemic CSS
require_once( BLOG_DESIGN_LITE_DIR . '/includes/blog-design-lite-theme-css.php' );

/**
 * Load tab dashboard
 */
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
    require get_template_directory() . '/includes/dashboard/blog-design-lite-how-it-work.php';
    
}

/************Category image Module Module End******************/

// Plugin recomendation class
require_once( BLOG_DESIGN_LITE_DIR . '/includes/plugins/class-wpcrt-recommendation.php' );