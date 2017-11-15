<?php

// ---------------------------------------------
// Frontpage - Customizer Panel
// ---------------------------------------------
$wp_customize->add_panel( 'avenue_frontpage_panel', array(
    'title'                 => __( 'Frontpage', 'avenue' ),
    'description'           => __( 'Customize the appearance of your site homepage', 'avenue' ),
    'priority'              => 10
) );

// Move Static Front Page
$wp_customize->add_section( 'static_front_page', array(
    'title'                 => __( 'Static Front Page', 'avenue' ),
    'panel'                 => 'avenue_frontpage_panel'
) );

    // ---------------------------------------------
    // CTA Header Section
    // ---------------------------------------------
//    $wp_customize->add_section( 'avenue_cta_header_section', array(
//        'title'                 => __( 'CTA Header', 'avenue'),
//        'description'           => __( 'Customize the CTA banner that appears below the Slider', 'avenue' ),
//        'panel'                 => 'avenue_frontpage_panel'
//    ) );

        // Show / Hide the CTA Header?
//        $wp_customize->add_setting( 'avenue[avenue_post_slider_cta_bool]', array(
//            'default'               => 'yes',
//            'transport'             => 'refresh',
//            'sanitize_callback'     => 'avenue_sanitize_show_hide',
//            'type'                  => 'option'
//        ) );
//        $wp_customize->add_control( 'avenue[avenue_post_slider_cta_bool]', array(
//            'label'   => __( 'Show or hide the CTA banner below the Slider?', 'avenue' ),
//            'section' => 'avenue_cta_header_section',
//            'type'    => 'radio',
//            'choices'    => array(
//                'yes'   => __( 'Show', 'avenue' ),
//                'no'    => __( 'Hide', 'avenue' ),
//            )
//        ));
    
        // Main Heading 
//        $wp_customize->add_setting( 'avenue[avenue_cta_header_one]', array(
//            'default'               => __( 'Modern design with a responsive layout', 'avenue' ),
//            'transport'             => 'refresh',
//            'sanitize_callback'     => 'sanitize_text_field',
//            'type'                  => 'option'
//        ) );
//        $wp_customize->add_control( 'avenue[avenue_cta_header_one]', array(
//            'type'                  => 'text',
//            'section'               => 'avenue_cta_header_section',
//            'label'                 => __( 'Main Heading', 'avenue' ),
//        ) );
        
        // Secondary Heading 
//        $wp_customize->add_setting( 'avenue[avenue_cta_header_two]', array(
//            'default'               => __( 'User-friendly & Easily Customizable', 'avenue' ),
//            'transport'             => 'refresh',
//            'sanitize_callback'     => 'sanitize_text_field',
//            'type'                  => 'option'
//        ) );
//        $wp_customize->add_control( 'avenue[avenue_cta_header_two]', array(
//            'type'                  => 'text',
//            'section'               => 'avenue_cta_header_section',
//            'label'                 => __( 'Secondary Heading', 'avenue' ),
//        ) );
    
    // ---------------------------------------------
    // CTA Trio Section
    // ---------------------------------------------
    $wp_customize->add_section( 'avenue_cta_trio_section', array(
        'title'                 => __( 'CTA Trio Section', 'avenue'),
        'description'           => __( 'Customize the trio of icon CTAs on the frontpage', 'avenue' ),
        'panel'                 => 'avenue_frontpage_panel'
    ) );

        // Show / Hide the CTA Trio Section?
        $wp_customize->add_setting( 'avenue[sc_cta_bool]', array(
            'default'               => 'yes',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'avenue_sanitize_show_hide',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_cta_bool]', array(
            'label'   => __( 'Show or hide the CTA Trio section?', 'avenue' ),
            'section' => 'avenue_cta_trio_section',
            'type'    => 'radio',
            'choices'    => array(
                'yes'   => __( 'Show', 'avenue' ),
                'no'    => __( 'Hide', 'avenue' ),
            )
        ));
    
        // CTA 1 - Icon
        $wp_customize->add_setting( 'avenue[sc_cta1_icon]', array(
            'default' => 'fa-gears',
            'transport' => 'refresh',
            'sanitize_callback' => 'avenue_sanitize_icon',
            'type'                  => 'option'
        ));
        $wp_customize->add_control( 'avenue[sc_cta1_icon]', array(
            'label' => __('CTA 1 - Icon', 'avenue'),
            'section' => 'avenue_cta_trio_section',
            'type' => 'select',
            'choices' => smk_font_awesome('readable')
        ));
        
        // CTA 1 - Title
        $wp_customize->add_setting( 'avenue[sc_cta1_title]', array(
            'default'               => __( 'Theme Options', 'avenue' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_cta1_title]', array(
            'type'                  => 'text',
            'section'               => 'avenue_cta_trio_section',
            'label'                 => __( 'CTA 1 - Title', 'avenue' ),
        ) );
        
        // CTA 1 - Tagline
        $wp_customize->add_setting( 'avenue[sc_cta1_text]', array(
            'default'               => __( 'Change typography, colors, layouts...', 'avenue' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_cta1_text]', array(
            'type'                  => 'text',
            'section'               => 'avenue_cta_trio_section',
            'label'                 => __( 'CTA 1 - Tagline', 'avenue' ),
        ) );
        
        // CTA 1 - URL
        $wp_customize->add_setting( 'avenue[sc_cta1_url]', array(
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_cta1_url]', array(
            'type'                  => 'text',
            'section'               => 'avenue_cta_trio_section',
            'label'                 => __( 'CTA 1 - Link/URL', 'avenue' ),
        ) );

        // CTA 1 - Link Text
        $wp_customize->add_setting( 'avenue[sc_cta1_button_text]', array(
            'default'               => __( 'Click Here', 'avenue' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_cta1_button_text]', array(
            'type'                  => 'text',
            'section'               => 'avenue_cta_trio_section',
            'label'                 => __( 'CTA 1 - Link Text', 'avenue' ),
        ) );
    
        // CTA 2 - Icon
        $wp_customize->add_setting( 'avenue[sc_cta2_icon]', array(
            'default' => 'fa-mobile',
            'transport' => 'refresh',
            'sanitize_callback' => 'avenue_sanitize_icon',
            'type'                  => 'option'
        ));
        $wp_customize->add_control( 'avenue[sc_cta2_icon]', array(
            'label' => __('CTA 2 - Icon', 'avenue'),
            'section' => 'avenue_cta_trio_section',
            'type' => 'select',
            'choices' => smk_font_awesome('readable')
        ));
        
        // CTA 2 - Title
        $wp_customize->add_setting( 'avenue[sc_cta2_title]', array(
            'default'               => __( 'Responsive Layout', 'avenue' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_cta2_title]', array(
            'type'                  => 'text',
            'section'               => 'avenue_cta_trio_section',
            'label'                 => __( 'CTA 2 - Title', 'avenue' ),
        ) );
        
        // CTA 2 - Tagline
        $wp_customize->add_setting( 'avenue[sc_cta2_text]', array(
            'default'               => __( 'Looks great on different devices', 'avenue' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_cta2_text]', array(
            'type'                  => 'text',
            'section'               => 'avenue_cta_trio_section',
            'label'                 => __( 'CTA 2 - Tagline', 'avenue' ),
        ) );
        
        // CTA 2 - URL
        $wp_customize->add_setting( 'avenue[sc_cta2_url]', array(
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_cta2_url]', array(
            'type'                  => 'text',
            'section'               => 'avenue_cta_trio_section',
            'label'                 => __( 'CTA 2 - Link/URL', 'avenue' ),
        ) );

        // CTA 2 - Link Text
        $wp_customize->add_setting( 'avenue[sc_cta2_button_text]', array(
            'default'               => __( 'Click Here', 'avenue' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_cta2_button_text]', array(
            'type'                  => 'text',
            'section'               => 'avenue_cta_trio_section',
            'label'                 => __( 'CTA 2 - Link Text', 'avenue' ),
        ) );
    
        // CTA 3 - Icon
        $wp_customize->add_setting( 'avenue[sc_cta3_icon]', array(
            'default' => 'fa-diamond',
            'transport' => 'refresh',
            'sanitize_callback' => 'avenue_sanitize_icon',
            'type'                  => 'option'
        ));
        $wp_customize->add_control( 'avenue[sc_cta3_icon]', array(
            'label' => __('CTA 3 - Icon', 'avenue'),
            'section' => 'avenue_cta_trio_section',
            'type' => 'select',
            'choices' => smk_font_awesome('readable')
        ));
        
        // CTA 3 - Title
        $wp_customize->add_setting( 'avenue[sc_cta3_title]', array(
            'default'               => __( 'Elegant Design', 'avenue' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_cta3_title]', array(
            'type'                  => 'text',
            'section'               => 'avenue_cta_trio_section',
            'label'                 => __( 'CTA 3 - Title', 'avenue' ),
        ) );
        
        // CTA 3 - Tagline
        $wp_customize->add_setting( 'avenue[sc_cta3_text]', array(
            'default'               => __( 'Beautiful design to give your site an elegant look', 'avenue' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_cta3_text]', array(
            'type'                  => 'text',
            'section'               => 'avenue_cta_trio_section',
            'label'                 => __( 'CTA 3 - Tagline', 'avenue' ),
        ) );
        
        // CTA 3 - URL
        $wp_customize->add_setting( 'avenue[sc_cta3_url]', array(
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_cta3_url]', array(
            'type'                  => 'text',
            'section'               => 'avenue_cta_trio_section',
            'label'                 => __( 'CTA 3 - Link/URL', 'avenue' ),
        ) );

        // CTA 3 - Link Text
        $wp_customize->add_setting( 'avenue[sc_cta3_button_text]', array(
            'default'               => __( 'Click Here', 'avenue' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_cta3_button_text]', array(
            'type'                  => 'text',
            'section'               => 'avenue_cta_trio_section',
            'label'                 => __( 'CTA 3 - Link Text', 'avenue' ),
        ) );
    
    // ---------------------------------------------
    // Frontpage Content - Adds to Static Front Page
    // ---------------------------------------------
    
        // Show / Hide the Homepage Content?
        $wp_customize->add_setting( 'avenue[sc_frontpage_content_bool]', array(
            'default'               => 'yes',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'avenue_sanitize_show_hide',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_frontpage_content_bool]', array(
            'label'   => __( 'Show or hide the homepage content?', 'avenue' ),
            'section' => 'static_front_page',
            'type'    => 'radio',
            'choices'    => array(
                'yes'   => __( 'Show', 'avenue' ),
                'no'    => __( 'Hide', 'avenue' ),
            )
        ));

        // Include Right Sidebar on Static Frontpage?
        $wp_customize->add_setting( 'avenue[sc_homepage_sidebar]', array(
            'default'               => 'sidebar-off',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'avenue_sanitize_sidebar_off_on',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_homepage_sidebar]', array(
            'label'   => __( 'Include the right sidebar ( only when using Static Front Page)?', 'avenue' ),
            'section' => 'static_front_page',
            'type'    => 'radio',
            'choices'    => array(
                'sidebar-off'   => __( 'No Sidebar', 'avenue' ),
                'sidebar-on'    => __( 'Right Sidebar', 'avenue' ),
            )
        ));