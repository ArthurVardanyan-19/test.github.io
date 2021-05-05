<?php
/**
 * TrustNews Main Banner
 *
 * @package trustnews
 */

/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

$wp_customize->add_setting( 'select_main_banner_category', array(
    'default' => '',
    'sanitize_callback' => 'trustnews_sanitize_select',
));
$wp_customize->add_control( 'select_main_banner_category', array(
    'priority'=>10,
    'label' => esc_html__('Select Main Banner', 'trustnews'),
    'section' => 'trustnews_main_banner_section',
    'type' => 'select',
    'choices'   =>  trustnews_cat_list()
));

// Background for main banner

$wp_customize->add_setting( 'upload_main_banner', array(
    'default'        => '',
    'sanitize_callback' => 'trustnews_sanitize_url',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'upload_main_banner', array(
	'priority' => 20,
    'label' => esc_html__('Main Banner BG Image', 'trustnews'),
    'section' => 'trustnews_main_banner_section',
) ) );