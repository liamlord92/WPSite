<?php

if ( ! function_exists( 'liam_setup' ) ) :
// Sets up theme defaults and registers support for various WordPress features.

function liam_setup() {

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'header-menu' => esc_html__( 'Header Menu', 'liam' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'liam' ),
	) );
}
endif; // liam_setup
add_action( 'after_setup_theme', 'liam_setup' );



/**
 * Enqueue scripts and styles.
 */
function liam_scripts() {
	// MAIN STYLESHEET WITH THEME DETIALS ONLY
	wp_enqueue_style( 'liam-style', get_stylesheet_uri() );

	// STYLE SHEETS
	wp_enqueue_style( 'liam-default', get_template_directory_uri() . '/css/style-default.css' );
	wp_enqueue_style( 'liam-custom', get_template_directory_uri() . '/css/style-custom.css' );

}
add_action( 'wp_enqueue_scripts', 'liam_scripts' );



/************************* ADD FAVICON ***********************/
function add_my_favicon() {
	$favicon_path = get_stylesheet_directory_uri() . '/favicon.png';
	echo '<link rel="shortcut icon" href="' . $favicon_path . '" />';
}

add_action( 'wp_head', 'add_my_favicon' ); //front end
add_action( 'admin_head', 'add_my_favicon' ); //admin end



/************************************** ADVANCED CUSTOM FIELDS PRO - OPTIONS PAGES *********************************/

/************************************** OPTIONS PAGE ***************************************/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Site Options',
		'menu_title'	=> 'Site Options',
		'menu_slug' 	=> 'liam-custom-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}



show_admin_bar( false );



?>