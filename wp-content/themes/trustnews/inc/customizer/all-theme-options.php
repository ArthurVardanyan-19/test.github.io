<?php
/**
 * TrustNews All theme Options
 *
 * @package trustnews
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
//Front Page Category (List of categories to hide from home page)

    $trustnews_frontpage_cat_lists = trustnews_frontpage_cat_list();

    $wp_customize->add_setting( 'front_page_categories', array(
        'default'           => '',
        'sanitize_callback' => 'trustnews_sanitize_multi_checkbox'
    ) );

    $wp_customize->add_control(
        new TrustNews_Customize_Multiple_Checkboxes_Control(
            $wp_customize,
            'front_page_categories',
            array(
                'section' => 'trustnews_all_theme_options',
                'label'   => esc_html__( 'Front/ Home page posts categories', 'trustnews' ),
                'description' => esc_html__('Selected category display on front/ home page. If not selected, all post will be displayed','trustnews'),
                'choices' => $trustnews_frontpage_cat_lists,
                'priority'    => 10,
            )
        )
    );

    //  Blog Options
    $wp_customize->add_setting('main-title', array(
            'type'              => 'main-title-control',
            'sanitize_callback' => 'sanitize_text_field',            
        )
    );
    $wp_customize->add_control( new TrustNews_title_display( $wp_customize, 'trustnews-100', array(
            'priority' => 100,
            'label' => esc_html__('Blog/ Single Options', 'trustnews'),
            'section' => 'trustnews_all_theme_options',
            'settings' => 'main-title',
        ) )
    );

    $wp_customize->add_setting( 'disable-author', array(
        'default' => 0,
        'sanitize_callback' => 'trustnews_sanitize_checkbox',
    ));
    $wp_customize->add_control( new TrustNews_Control_Toggle( 
        $wp_customize,'disable-author', 
        array(
            'priority'=>110,
            'label' => esc_html__('Hide Author', 'trustnews'),
            'section' => 'trustnews_all_theme_options',
            'type'        => 'ios',
        )
    ));

    $wp_customize->add_setting( 'disable-date', array(
        'default' => 0,
        'sanitize_callback' => 'trustnews_sanitize_checkbox',
    ));
    $wp_customize->add_control( new TrustNews_Control_Toggle( 
        $wp_customize,'disable-date', 
        array(
            'priority'=>120,
            'label' => esc_html__('Hide Date', 'trustnews'),
            'section' => 'trustnews_all_theme_options',
            'type' => 'ios',
        )
    ));

    $wp_customize->add_setting( 'disable-cateogry', array(
        'default' => 0,
        'sanitize_callback' => 'trustnews_sanitize_checkbox',
    ));
    $wp_customize->add_control( new TrustNews_Control_Toggle( 
        $wp_customize,'disable-cateogry', 
        array(
            'priority'=>130,
            'label' => esc_html__('Hide Category', 'trustnews'),
            'section' => 'trustnews_all_theme_options',
            'type' => 'ios',
        )
    ));

    $wp_customize->add_setting( 'disable-comments', array(
        'default' => 0,
        'sanitize_callback' => 'trustnews_sanitize_checkbox',
    ));

    $wp_customize->add_control( new TrustNews_Control_Toggle( 
        $wp_customize,'disable-comments', 
        array(
                'priority'=>140,
                'label' => esc_html__('Hide Comments', 'trustnews'),
                'section' => 'trustnews_all_theme_options',
                'settings'  => 'disable-comments',
                'type'        => 'ios',
            )
        )
    );

    //Select Theme Layer
    $wp_customize->add_setting( 'select-layer', array(
        'default' => 'dark',
        'sanitize_callback' => 'trustnews_sanitize_select',
    ));
    $wp_customize->add_control( 'select-layer', array(
        'priority'=>190,
        'label' => esc_html__('Theme Layer', 'trustnews'),
        'section' => 'trustnews_all_theme_options',
        'type' => 'radio',
        'choices' => array(
            'dark' => esc_html__( 'Dark','trustnews' ),
            'light' => esc_html__( 'Light','trustnews' ),
        ),
    ));

    //Select Theme Layout
    $wp_customize->add_setting( 'select-layout', array(
        'default' => 'right',
        'sanitize_callback' => 'trustnews_sanitize_select',
    ));
    $wp_customize->add_control( new TrustNews_Control_Radio_Image(
        $wp_customize, 'select-layout',
            array(
                'priority'=>200,
                    'label' => esc_html__('Select Sidebar Layout', 'trustnews'),
                    'section' => 'trustnews_all_theme_options',
                    'choices' => array(
                        'right' => esc_url( get_template_directory_uri() ) . '/assets/images/right-sidebar.png',
                        'left' => esc_url( get_template_directory_uri() ) . '/assets/images/left-sidebar.png',
                ),
            )
        )
    );

    $wp_customize->add_setting( 'enable_sticky_menu', array(
        'default' => 1,
        'sanitize_callback' => 'trustnews_sanitize_checkbox',
    ));
    $wp_customize->add_control( new TrustNews_Control_Toggle( 
        $wp_customize,'enable_sticky_menu', 
        array(
            'priority'=>270,
            'label' => esc_html__('Enable Sticky Menu', 'trustnews'),
            'section' => 'trustnews_all_theme_options',
            'type' => 'ios'
        )
        
    ));

    $wp_customize->add_setting( 'post-pagination', array(
        'default' => 'numeric',
        'sanitize_callback' => 'trustnews_sanitize_select',
    ));
    $wp_customize->add_control( 'post-pagination', array(
        'priority'=>290,
        'label' => esc_html__('Post Pagination', 'trustnews'),
        'section' => 'trustnews_all_theme_options',
        'type' => 'radio',
        'choices' => array(
            'default' => esc_html__( 'Default','trustnews' ),
            'numeric' => esc_html__( 'Numeric','trustnews' ),
        ),
    ));
