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

        // Show / Hide the Bottom Border Under the Titles?
        $wp_customize->add_setting( 'avenue[sc_cta_trio_underline]', array(
            'default'               => 'no',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'avenue_sanitize_show_hide',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_cta_trio_underline]', array(
            'label'   => __( 'Show or hide the divider underline for titles?', 'avenue' ),
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
