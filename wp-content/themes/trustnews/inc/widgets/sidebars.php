<?php
 /**
 * Register Sidebar area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package trustnews
 */
function trustnews_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'trustnews' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'trustnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Side Header Banner', 'trustnews' ),
		'id'            => 'header-banner',
		'description'   => esc_html__( 'This section will appear at right side of Site Title', 'trustnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Advertise Area', 'trustnews' ),
		'id'            => 'advertise-area',
		'description'   => esc_html__( 'This section will appear above the Header Section', 'trustnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'TrustNews Template Main Section', 'trustnews' ),
		'id'            => 'trustnews-template-main',
		'description'   => esc_html__( 'This section will appear when TrustNews Template is selected at Main Section', 'trustnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'TrustNews Template Primary Section', 'trustnews' ),
		'id'            => 'trustnews-template-primary',
		'description'   => esc_html__( 'This section will appear when TrustNews Template is selected at Primary Section', 'trustnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'TrustNews Template Secondary Section', 'trustnews' ),
		'id'            => 'trustnews-template-secondary',
		'description'   => esc_html__( 'This section will appear when TrustNews Template is selected at Secondary Section', 'trustnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_widget( 'TrustNews_posts' );
	register_widget( 'TrustNews_two_category_posts' );
	register_widget( 'TrustNews_category_slide' );
	register_widget( 'TrustNews_blog_category_posts' );
}
add_action( 'widgets_init', 'trustnews_widgets_init' );