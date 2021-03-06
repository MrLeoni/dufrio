<?php
/**
 * Dufrio functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dufrio
 */

if ( ! function_exists( 'dufrio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dufrio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Dufrio, use a find and replace
	 * to change 'dufrio' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dufrio', get_template_directory() . '/languages' );

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
		'header' => esc_html__( 'Topo', 'dufrio' ),
	) );

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
	add_theme_support( 'custom-background', apply_filters( 'dufrio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'dufrio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dufrio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dufrio_content_width', 640 );
}
add_action( 'after_setup_theme', 'dufrio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dufrio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dufrio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Adicione widgets aqui.', 'dufrio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	)	);
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'dufrio' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Troque o texto do footer aqui.', 'dufrio' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	)	);
}
add_action( 'widgets_init', 'dufrio_widgets_init' );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * 
 * Display most popular posts.
 *
 */

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**
 * 
 * Custom cloud tags style.
 *
 */

function custom_tag_cloud_widget($args) {
	$args['largest'] = 0.8; //largest tag
	$args['smallest'] = 0.8; //smallest tag
	$args['unit'] = 'em'; //tag font unit
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget' );

/**
 * Enqueue scripts and styles.
 */
function dufrio_scripts() {
	wp_enqueue_style( 'dufrio-style', get_stylesheet_uri() );

	wp_enqueue_script( 'dufrio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'dufrio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dufrio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Register "complementos" custom post type with "Categoria" custom taxonomy
 */
add_action("init", "complementosPostType");
function complementosPostType() {
	
	// Registering new Custom Post Type
	$labels_post = array( 
		"name" => "Complementos",
		"singular_name" => "Complemento",
		
	);
	$args_post = array(
		"labels" => $labels_post,
		"supports" => array("title", "editor", "excerpt", "thumbnail"),
		"menu_position" => 20,
		"menu_icon" => "dashicons-plus",
		"public"	=> true,
		"show_in_menu"	=> true,
	);
	register_post_type("complementos", $args_post);
	
	// Registering new Taxonomy
	$labels_taxonomy = array( "name" => "Categorias de Complementos", "singular_name" => "Categoria da Complementos");
	$args_taxonomy = array(
		"labels"	=> $labels_taxonomy,
		"show_ui"	=> true,
		"show_in_menu"	=> true,
		"show_tagcloud"	=> false,
		'show_admin_column' => true,
		"hierarchical"	=> true,
		"capabilities"	=> array("manage_terms", "edit_terms", "delete_terms", "assign_terms"),
	);
	register_taxonomy("complementos-categorias", "complementos", $args_taxonomy);
}
