<?php
/**
 * Theme functions and definitions.
 *
 * @package Artko
 * @subpackage Designership
 * @since Designership 1.0
 */

/**
 * Max Content Width
 */
if ( ! isset( $content_width ) ) $content_width = 940;


/**
 * Theme Setup
 */
if ( ! function_exists( 'designership_theme_setup' ) ) :

function designership_theme_setup(){
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org.
	 */
	load_theme_textdomain( 'designership', get_template_directory() . '/languages' );
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	/*
	 * Enable support for custom logo.
	 *
	 *  @since Designership 1.0
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'       => 120,
		'flex-height' => true,
	) );
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu' => esc_html__( 'Primary', 'designership' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style( 'css/editor-style.css' );

	/* Enable support for Post Thumbnails on posts and pages */
	/* @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );

	set_post_thumbnail_size( 825, 510, true ); // Normal post thumbnails

	add_image_size('designership_home', 1920, 1080, true);
}
endif; // designership_theme_setup
add_action( 'after_setup_theme', 'designership_theme_setup' );


/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Designership 1.0
 */
function designership_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'designership' ),
		'id'            => 'designership-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'designership' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Full Width', 'designership' ),
		'id'            => 'designership-sidebar-2',
		'description'   => esc_html__( 'Appears full width on selective pages.', 'designership' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'designership_widgets_init' );


/**
 * Enqueue scripts & styles
 *
 * @since Designership 1.0
 *
 */
function designership_enqueue_scripts(){
	/* Enqueue Styles */
	// Bootstrap
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/css/bootstrap.min.css' );
	
	// Slick
	wp_enqueue_style( 'slick-style', get_template_directory_uri().'/css/slick.css' );
	
	// Main theme style
	wp_enqueue_style( 'designership-style', get_stylesheet_uri());

	
	/* Enqueue Scripts */
	wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/lax.js', array( 'jquery' ), true );
	wp_enqueue_script( 'designership-script', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), true );
	wp_enqueue_script( 'tether', get_template_directory_uri() . '/js/tether.js', array( 'jquery' ), '1.2.4', true );
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '4.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' ); // loads the javascript required for threaded comments
}
add_action( 'wp_enqueue_scripts', 'designership_enqueue_scripts' );


/**
 * Enqueue typekit scripts & styles
 *
 * @since Designership 1.0
 *
 */
add_action( 'wp_enqueue_scripts', 'prefix_enqueue_scripts' );
/**
 * Loads the main typekit Javascript. Replace your-id-here with the script name
 * provided in your Kit Editor.
 *
 * @todo Replace prefix with your theme or plugin prefix
 */
function prefix_enqueue_scripts() {
	wp_enqueue_script( 'typekit', 'https://use.typekit.net/avu6trq.js', array(), '1.0.0' );
}
add_action( 'wp_head', 'prefix_typekit_inline' );
/**
 * Check to make sure the main script has been enqueued and then load the typekit
 * inline script.
 *
 * @todo Replace prefix with your theme or plugin prefix
 */
function prefix_typekit_inline() {
	if ( wp_script_is( 'typekit', 'enqueued' ) ) {
		echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
	}
}



/**
 * Custom template tags for this theme.
 *
 * @since Designership 1.0
 */
require get_template_directory() . '/includes/template-tags.php';



/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Designership 1.0
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function designership_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'designership_widget_tag_cloud_args' );
