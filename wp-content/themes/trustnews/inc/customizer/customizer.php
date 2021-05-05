<?php
/**
 * TrustNews Theme Customizer
 *
 * @package trustnews
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function trustnews_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'trustnews_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'trustnews_customize_partial_blogdescription',
		) );
	}
	class TrustNews_title_display extends WP_Customize_Control {
        public $type = 'main-title';
        public $label = '';
        public function render_content() {
        ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
        <?php
        }
    }

    // Background for Header brand

    $wp_customize->add_setting( 'upload_header_brand', array(
        'default'        => '',
        'sanitize_callback' => 'trustnews_sanitize_url',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'upload_header_brand', array(
    	'priority' => 100,
        'label' => esc_html__('Header Brand BG Image', 'trustnews'),
        'section' => 'title_tagline',
    ) ) );

	// Add Panel
	$wp_customize->add_panel( 'trustnews_options_panel', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'Theme Options', 'trustnews' ),
	) );



	// Add Section
	$wp_customize->add_section( 'trustnews_all_theme_options', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'All theme Options', 'trustnews' ),
		'panel' => 'trustnews_options_panel',
	) );

	$wp_customize->add_section( 'trustnews_breaking_news_section', array(
		'priority' => 20,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'Breaking News', 'trustnews' ),
		'panel' => 'trustnews_options_panel',
	) );

	$wp_customize->add_section( 'trustnews_main_banner_section', array(
		'priority' => 30,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'Main Banner', 'trustnews' ),
		'panel' => 'trustnews_options_panel',
	) );

	$wp_customize->add_section( 'trustnews_highlighted_category_section', array(
		'priority' => 40,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'Highlighted Category', 'trustnews' ),
		'panel' => 'trustnews_options_panel',
	) );

	/**
	 * Load our custom control.
	 */
	require_once get_template_directory() . '/inc/custom/class-customizer-toggle-control.php';

	/**
	 * Load our custom radio image.
	 */
   require_once get_template_directory() . '/inc/custom/radio-image/class-radio-image-control.php';
   $wp_customize->register_control_type( 'TrustNews_Control_Radio_Image' );

	/**
	 * Control Checkbox Multiple
	 */
	 require get_template_directory() . '/inc/customizer/control-checkbox-multiple.php';

	/**
	 * Breaking News section
	 */
	require get_template_directory() . '/inc/customizer/breaking-news.php';

	/**
	 * All theme Options section
	 */
	require get_template_directory() . '/inc/customizer/all-theme-options.php';

	/**
	 * Main Banner Section
	 */
	require get_template_directory() . '/inc/customizer/main-banner.php';

	/**
	 * Excerpt Display
	 */
	require get_template_directory() . '/inc/customizer/excerpt-display.php';

	/**
	 * Color Schemes Section
	 */
	require get_template_directory() . '/inc/customizer/cat-color.php';


	/**
	 * Sanitize functions
	 */
	require get_template_directory() . '/inc/customizer/sanitize-callback-functions.php';

	}
add_action( 'customize_register', 'trustnews_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function trustnews_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function trustnews_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function trustnews_customize_preview_js() {
	wp_enqueue_script( 'trustnews-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20180801', true );

}
add_action( 'customize_preview_init', 'trustnews_customize_preview_js' );
