<?php
 /**
 * Enqueue scripts and styles.
 *
 * @package trustnews
 */

function trustnews_scripts() {
	$select_main_banner_category = get_theme_mod('select_main_banner_category','');
	$slider_options = get_theme_mod('slider-options','main-banner');
	$disable_main_banner = get_theme_mod('disable_main_banner',0);
	$enable_sticky_menu = get_theme_mod('enable_sticky_menu',1);
	wp_enqueue_style( 'trustnews-style', get_stylesheet_uri() );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/library/fontawesome/css/all.min.css' );

	wp_enqueue_style( 'trustnews-google-font', trustnews_fonts_url(), array(), null );

	wp_enqueue_script('trustnews-global', get_template_directory_uri().'/assets/js/global.js', array('jquery'), true, false);

	wp_enqueue_script( 'trustnews-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array(), false, true );

	wp_enqueue_script( 'trustnews-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), false, true );

	wp_enqueue_script( 'ResizeSensor', get_template_directory_uri() . '/assets/library/sticky-sidebar/ResizeSensor.min.js', array(), false, true );

	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/library/sticky-sidebar/theia-sticky-sidebar.min.js', array(), false, true );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/library/slick/slick.min.js', array(), false, true );

	wp_enqueue_script( 'trustnews-slick-settings', get_template_directory_uri() . '/assets/library/slick/slick-settings.js', array(), false, true );

	if($slider_options !='main-banner'){
		// Silence is Golden
	} else {
		if ($disable_main_banner ==1){
			// Silence is Golden
		} elseif ($select_main_banner_category ==''){
			// Silence is Golden
		} else {

			wp_enqueue_script( 'trustnews-slick-banner-settings', get_template_directory_uri() . '/assets/library/slick/slick-banner-settings.js', array(), false, true );
		}

	}

	if($enable_sticky_menu ==1 ){
		wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/assets/library/sticky/jquery.sticky.js', array(), false, true );
		wp_enqueue_script( 'trustnews-sticky-settings', get_template_directory_uri() . '/assets/library/sticky/sticky-setting.js', array(), false, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'marquee', get_template_directory_uri() . '/assets/library/marquee/jquery.marquee.min.js', array(), false, true );

	wp_enqueue_script( 'trustnews-marquee-settings', get_template_directory_uri() . '/assets/library/marquee/marquee-settings.js', array(), false, true );
}

add_action( 'wp_enqueue_scripts', 'trustnews_scripts' );

function trustnews_admin_notice (){

  wp_enqueue_style( 'trustnews-admin-css', get_template_directory_uri() . '/css/admin/admin.css' );

}

add_action( 'admin_enqueue_scripts', 'trustnews_admin_notice' );

if ( ! function_exists( 'trustnews_fonts_url' ) ) :
/**
 * Register Google fonts for TrustNews.
 *
 * Create your own trustnews_fonts_url() function to override in a child theme.
 *
 *
 * @return string Google fonts URL for the theme.
 */
function trustnews_fonts_url() {
	$fonts_url = '';
	$fonts     = array();

	/* translators: If there are characters in your language that are not supported by Cairo, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Cairo font: on or off', 'trustnews' ) ) {
		$fonts[] = 'Cairo:wght@400;600;700';
	}

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'trustnews' ) ) {
		$fonts[] = 'Lato:ital,wght@0,400;0,700;1,400&display=swap';
	}

	if ( $fonts ) {

		$fonts_url = add_query_arg( array(
			'family' => esc_attr( implode( '&family=', $fonts ) ),
		), '//fonts.googleapis.com/css2' );
	}

	return $fonts_url;
}
endif;

// Dynamic Category Color
if ( ! function_exists( 'trustnews_trustnews_category_colors' ) ) :
	function trustnews_category_colors(){
		$categories_list =get_terms( 'category' );

		$output_css='';

		foreach ( $categories_list as $category_data ) {

			 $cat_data = get_theme_mod('cat_col_'.esc_html( strtolower( $category_data->name ) ) );

			 $cat_id = $category_data->term_id;
			 ?>
			 <?php if( $cat_data != '' ){

				 	$output_css .= '.cat-links a.category-color-'.absint($cat_id).':before'.'{

						background-color:'.esc_attr($cat_data).';'.'

					}
					.nav-menu > li.category-color-'.absint($cat_id). ' > a:before {
						background:'.esc_attr($cat_data).';'.'

					}';
				}
		}
	wp_add_inline_style( 'trustnews-style', $output_css );
	}
	add_action( 'wp_enqueue_scripts', 'trustnews_category_colors', 10 );
endif;