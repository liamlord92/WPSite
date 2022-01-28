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



/************************* ENQUEUE SCRIPTS & STYLES ***********************/
function liam_scripts() {
	// MAIN STYLESHEET WITH THEME DETAILS ONLY
	wp_enqueue_style( 'liam-style', get_stylesheet_uri() );

	// STYLE SHEETS
	wp_enqueue_style( 'liam-default', get_template_directory_uri() . '/css/style-default.css' );
	wp_enqueue_style( 'liam-custom', get_template_directory_uri() . '/css/style-custom.css' );

}
add_action( 'wp_enqueue_scripts', 'liam_scripts' );



/************************* BLOG PAGINATION ***********************/
if ( ! function_exists( 'liam_pagination' ) ) :
	/*** Pagination for the theme ***/
	function liam_pagination() {
		$settings = get_option( 'blog_options' );
		if(isset( $settings["liam_pagination"] ) && $settings["liam_pagination"] == "nextprev"):
			// Previous/next page navigation.
			echo "<div class='prevpostlink'>" . get_previous_posts_link(__( '&lt; Previous page', 'liam' )) . "</div>";
			echo "<div class='nextpostlink'>" . get_next_posts_link(__( 'Next page &gt;', 'liam' )) . "</div>";
		else:
			global $wp_query;
			$big = 999999999; // need an unlikely integer
			$translated = __( 'Page', 'liam' ); // Supply translatable string
			$pagination =  paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages,
				'type' => 'array',
				'prev_next' => true,
				'prev_text'	=> '&laquo;',
				'next_text'	=> '&raquo;',
				'before_page_number' => ''
			) );
			if(count($pagination) > 0):
				$pagestr = '<ul class="pagination">';
				foreach($pagination as $pagenum):
					$pagestr .= '<li>' . $pagenum . '</li>';
				endforeach;
				$pagestr .= '</ul>';
				echo $pagestr;
			endif;
		endif;
	}
endif;



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