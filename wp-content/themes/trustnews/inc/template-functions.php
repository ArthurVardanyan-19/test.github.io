<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package trustnews
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function trustnews_body_classes( $classes ) {
    $select_layout = get_theme_mod('select-layout','right');
    $select_layer = get_theme_mod('select-layer','dark');

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    //has header image
    if(has_header_image()){
        $classes[] = 'has-header-image';
    }

    //left sidebar
    if($select_layout=='left'){
        $classes[] = 'left-sidebar';

    }

    if ( is_active_sidebar( 'trustnews-template-primary' ) ) {
        $classes[] = 'lw-area';
    }

    if ( is_active_sidebar( 'trustnews-template-secondary' ) ) {
        $classes[] = 'rw-area';
    }

     // Add class if sidebar is used.
    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'has-sidebar';
    }
    if ($select_layer == 'dark'){
        $classes[] = 'dark-layer';
    }

	return $classes;
}
add_filter( 'body_class', 'trustnews_body_classes' );

/**
 * Adds custom class to the array of posts classes.
 */
function trustnews_post_classes( $classes, $class, $post_id ) {
    $classes[] = 'entry';

    return $classes;
}
add_filter( 'post_class', 'trustnews_post_classes', 10, 3 );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function trustnews_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'trustnews_pingback_header' );

// Default Category Lists for Dropdown

if( !function_exists( 'trustnews_cat_list' ) ):
    function trustnews_cat_list() {
        $trustnews_args = array(
            'type'       => 'post',
            'taxonomy'   => 'category',
        );
        $trustnews_cat_lists = get_categories( $trustnews_args );
        $trustnews_cat_list = array('' => esc_html__('--Select--','trustnews'));
        foreach( $trustnews_cat_lists as $category ) {
            $trustnews_cat_list[esc_attr( $category->slug )] = esc_html( $category->name );
        }
        return $trustnews_cat_list;
    }
endif;

//front page category list

if( !function_exists( 'trustnews_frontpage_cat_list' ) ):
    function trustnews_frontpage_cat_list() {
        $trustnews_args = array(
            'type'       => 'post',
            'taxonomy'   => 'category',
        );
        $trustnews_frontpage_cat_lists = get_categories( $trustnews_args );
        foreach( $trustnews_frontpage_cat_lists as $category ) {
            $trustnews_frontpage_cat_list[esc_attr( $category->term_id )] = esc_html( $category->name );
        }
        return $trustnews_frontpage_cat_list;
    }
endif;

//Exclude posts from home page

function trustnews_exclude_homepage($query) {
    $front_page_categories = get_theme_mod('front_page_categories','');
    if ( is_array( $front_page_categories ) && !in_array( 0, $front_page_categories ) ) {
        if ( $query->is_home() && $query->is_main_query() ) {
            $query->query_vars['category__in'] = $front_page_categories;
        }
    }
}
add_action('pre_get_posts', 'trustnews_exclude_homepage');

