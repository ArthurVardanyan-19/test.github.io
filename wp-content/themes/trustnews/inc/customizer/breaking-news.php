<?php
/**
 * Breaking News Categroy
 *
 * @package trustnews
 */

/**
 * Display Breaking News Categroy in frontpage. 
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

$wp_customize->add_setting( 'breaking_news_title_text', array(
	'default' => esc_html__('Breaking News','trustnews'),
	'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'breaking_news_title_text', array(
	'priority'=>20,
	'label' => esc_html__('Title', 'trustnews'),
	'section' => 'trustnews_breaking_news_section',
	'type' => 'text',
));

$wp_customize->add_setting( 'breaking_news_category', array(
	'default' => '',
	'sanitize_callback' => 'trustnews_sanitize_select',
));
$wp_customize->add_control( 'breaking_news_category', array(
	'priority'=>30,
	'label' => esc_html__('Breaking News', 'trustnews'),
	'description' => esc_html__('Select Category from Dropdown ', 'trustnews'),
	'section' => 'trustnews_breaking_news_section',
	'type' => 'select',
	'choices'   =>  trustnews_cat_list()
));

