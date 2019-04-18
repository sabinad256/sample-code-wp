<?php
/**
 * kuhs functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kuhs
 */

if ( ! function_exists( 'kuhs_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kuhs_setup() {


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
	// register_nav_menus( array(
	// 	'menu-1' => esc_html__( 'Primary', 'kuhs' ),
	// ) );

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
	add_theme_support( 'custom-background', apply_filters( 'kuhs_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'kuhs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kuhs_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kuhs_content_width', 640 );
}
add_action( 'after_setup_theme', 'kuhs_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kuhs_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kuhs' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kuhs' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'kuhs_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kuhs_scripts() {
	wp_enqueue_style( 'kuhs-style', get_stylesheet_uri() );
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/assets/css/slick.css');
	wp_enqueue_style( 'fancy-style', get_template_directory_uri() . '/assets/css/fancybox.css');
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css');

	wp_enqueue_script( 'jquery-library', get_template_directory_uri() . '/assets/js/jquery-1.11.2.min.js', array(), '', true );
	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '', true );
	wp_enqueue_script( 'jquery-fancy', get_template_directory_uri() . '/assets/js/jquery.fancybox.js', array(), '', true );
	wp_enqueue_script( 'jquery-custom', get_template_directory_uri() . '/assets/js/main.js', array(), '', true );

}
add_action( 'wp_enqueue_scripts', 'kuhs_scripts' );


if( function_exists('acf_add_options_page') ) { 
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title' 	=> 'Theme Option',
		'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));
}

function pr($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

// image crop
add_image_size( 'thumb-399x299', 399, 299, true );


add_action( 'init', 'kuhsPostType' );
function kuhsPostType(){
	$postTypes = array(
		array(
		  'slug'         	=> 'galleries',
		  'singular_name'  	=> 'Gallery',
		  'plural_name'  	=> 'Galleries',
		  'post_type'    	=> 'galleries',
		  'supports'		=> array('title','editor', 'thumbnail', 'page-attributes','excerpt'),
		  'has_single'		=> true
		),

		/*array(
		  'slug'         	=> 'teams',
		  'singular_name'  	=> 'Team',
		  'plural_name'  	=> 'Teams',
		  'post_type'    	=> 'teams',
		  'supports'		=> array('title','editor', 'thumbnail', 'page-attributes','excerpt'),
		  'has_single'		=> true
		),*/

		array(
		  'slug'         	=> 'students',
		  'singular_name'  	=> 'Student',
		  'plural_name'  	=> 'Students',
		  'post_type'    	=> 'students',
		  'supports'		=> array('title','editor', 'thumbnail', 'page-attributes','excerpt'),
		  'has_single'		=> true
		),

	  );

	  foreach($postTypes as $postType){
		$args = array(
			'labels' => array(
						'name' => $postType['plural_name'],
						'singular_name' => $postType['singular_name'],
						'add_new' => 'Add New',
						'add_new_item' => 'Add New '.$postType['singular_name'],
						'edit_item' => 'Edit '.$postType['singular_name'],
						'new_item' => 'New '.$postType['singular_name'],
						'all_items' => 'All '.$postType['plural_name'],
						'view_item' => 'View '.$postType['singular_name'],
						'search_items' => 'Search '.$postType['plural_name'],
						'not_found' =>  'No '.$postType['plural_name'].' found',
						'not_found_in_trash' => 'No '.$postType['plural_name'].' found in Trash',
						'menu_name' => $postType['plural_name']
					),
			'public' => true,
			'publicly_queryable' => $postType['has_single'],
			'show_ui' => true, 
			'show_in_menu' => true,
			'query_var' => $postType['has_single'],
			'rewrite' => array( 'slug' => $postType['slug'] ),
			'capability_type' => 'post',
			'has_archive' => true, 
			'hierarchical' => true,
			'menu_position' => null,
			'supports' => $postType['supports'], 
		);
	    register_post_type( $postType['post_type'], $args);
  	}
}

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => ( 'Header Menu' ),
      'footer-menu1' => ( 'Footer Menu 1' ),
      'footer-menu2' => ( 'Footer Menu 2' ),
      'footer-menu3' => ( 'Footer Menu 3' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

include('inc/custom-widgets.php');

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}



add_action( 'init', 'create_student_taxonomies', 0 );

function create_student_taxonomies() {
	$labels = array(
		'name'              => _x( 'Groups', 'taxonomy general name', 'kuhs' ),
		'singular_name'     => _x( 'Group', 'taxonomy singular name', 'kuhs' ),
		'search_items'      => __( 'Search Groups', 'kuhs' ),
		'all_items'         => __( 'All Groups', 'kuhs' ),
		'parent_item'       => __( 'Parent Group', 'kuhs' ),
		'parent_item_colon' => __( 'Parent Group:', 'kuhs' ),
		'edit_item'         => __( 'Edit Group', 'kuhs' ),
		'update_item'       => __( 'Update Group', 'kuhs' ),
		'add_new_item'      => __( 'Add New Group', 'kuhs' ),
		'new_item_name'     => __( 'New Group Name', 'kuhs' ),
		'menu_name'         => __( 'Groups', 'kuhs' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'group' ),
	);

	register_taxonomy( 'group', array( 'students' ), $args );
}



?>