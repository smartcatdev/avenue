<?php

// ---------------------------------------------
// Header - Customizer Panel
// ---------------------------------------------
$wp_customize->add_panel( 'avenue_header_panel', array(
    'title'                 => __( 'Header & Footer', 'avenue' ),
    'description'           => __( 'Customize the appearance of your Header', 'avenue' ),
    'priority'              => 10
) );

// Move Site Identity
$wp_customize->add_section( 'title_tagline', array(
    'title'                 => __( 'Site Title & Tagline', 'avenue' ),
    'panel'                 => 'avenue_header_panel'
) );

// ---------------------------------------------
// Toolbar Section
// ---------------------------------------------
$wp_customize->add_section( 'avenue_toolbar_section', array(
    'title'                 => __( 'Toolbar & Social Links', 'avenue'),
    'description'           => __( 'Customize the Toolbar in the Header and the Social Links it contains', 'avenue' ),
    'panel'                 => 'avenue_header_panel'
) );

    // Show / Hide the Toolbar?
    $wp_customize->add_setting( 'avenue[sc_headerbar_bool]', array(
        'default'               => 'yes',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'avenue_sanitize_show_hide',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_headerbar_bool]', array(
        'label'   => __( 'Show or hide the Toolbar section?', 'avenue' ),
        'section' => 'avenue_toolbar_section',
        'type'    => 'radio',
        'choices'    => array(
            'yes'   => __( 'Show', 'avenue' ),
            'no'    => __( 'Hide', 'avenue' ),
        )
    ));

    // Facebook URL
    $wp_customize->add_setting( 'avenue[sc_facebook_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_facebook_url]', array(
        'type'                  => 'text',
        'section'               => 'avenue_toolbar_section',
        'label'                 => __( 'Facebook URL', 'avenue' ),
    ) );

    // Twitter URL
    $wp_customize->add_setting( 'avenue[sc_twitter_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_twitter_url]', array(
        'type'                  => 'text',
        'section'               => 'avenue_toolbar_section',
        'label'                 => __( 'Twitter URL', 'avenue' ),
    ) );

    // LinkedIn URL
    $wp_customize->add_setting( 'avenue[sc_linkedin_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_linkedin_url]', array(
        'type'                  => 'text',
        'section'               => 'avenue_toolbar_section',
        'label'                 => __( 'LinkedIn URL', 'avenue' ),
    ) );

    // Google+ URL
    $wp_customize->add_setting( 'avenue[sc_gplus_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_gplus_url]', array(
        'type'                  => 'text',
        'section'               => 'avenue_toolbar_section',
        'label'                 => __( 'Google+ URL', 'avenue' ),
    ) );

    // Instagram URL
    $wp_customize->add_setting( 'avenue[sc_instagram_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_instagram_url]', array(
        'type'                  => 'text',
        'section'               => 'avenue_toolbar_section',
        'label'                 => __( 'Instagram URL', 'avenue' ),
    ) );

    // YouTube URL
    $wp_customize->add_setting( 'avenue[sc_youtube_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_youtube_url]', array(
        'type'                  => 'text',
        'section'               => 'avenue_toolbar_section',
        'label'                 => __( 'YouTube URL', 'avenue' ),
    ) );
    
    // Pinterest URL
    $wp_customize->add_setting( 'avenue[sc_pinterest_url]', array(
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_pinterest_url]', array(
        'type'                  => 'text',
        'section'               => 'avenue_toolbar_section',
        'label'                 => __( 'Pinterest URL', 'avenue' ),
    ) );
    
    // Phone Number
    $wp_customize->add_setting( 'avenue[sc_phone_url]', array(
        'default'               => '(555) 555-5555',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_phone_url]', array(
        'type'                  => 'text',
        'section'               => 'avenue_toolbar_section',
        'label'                 => __( 'Phone Number', 'avenue' ),
        'description'           => __( '(###) ###-####', 'avenue' ),
    ) );
    
    // Street Address
    $wp_customize->add_setting( 'avenue[sc_address_url]', array(
        'default'               => __( '123 Main St., Kingston, Ontario', 'avenue' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_address_url]', array(
        'type'                  => 'text',
        'section'               => 'avenue_toolbar_section',
        'label'                 => __( 'Street Address', 'avenue' ),
        'description'           => __( 'Outputs as a single line', 'avenue' ),
    ) );

// ---------------------------------------------
// Header Height Section
// ---------------------------------------------
$wp_customize->add_section( 'avenue_header_height_section', array(
    'title'                 => __( 'Branding & Nav Bar', 'avenue'),
    'description'           => __( 'Customize the Branding & Navigation bar in the Header', 'avenue' ),
    'panel'                 => 'avenue_header_panel'
) );

    // Branding Bar Height
    $wp_customize->add_setting( 'avenue[avenue_branding_bar_height]', array (
        'default'               => 80,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'avenue_sanitize_integer',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[avenue_branding_bar_height]', array(
        'type'                  => 'number',
        'section'               => 'avenue_header_height_section',
        'label'                 => __( 'Branding & Nav Bar Height', 'avenue' ),
        'description'           => __( 'Adjust the height of the branding & navigation bar in the Header', 'avenue' ),
        'input_attrs'           => array(
            'min' => 80,
            'max' => 400,
            'step' => 1,
    ) ) );

// ---------------------------------------------
// Footer Section
// ---------------------------------------------
$wp_customize->add_section( 'avenue_footer_section', array(
    'title'                 => __( 'Footer', 'avenue'),
    'description'           => __( 'Customize the Footer', 'avenue' ),
    'panel'                 => 'avenue_header_panel'
) );

    // Footer Widget Area Columns
    $wp_customize->add_setting( 'avenue[sc_footer_columns]', array(
        'default'               => 'col-md-4',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_footer_columns]', array(
        'label'   => __( 'Footer Widget Area - Columns', 'avenue' ),
        'label'   => __( 'Save changes and reload to preview column changes', 'avenue' ),
        'section' => 'avenue_footer_section',
        'type'    => 'radio',
        'choices'    => array(
            'col-md-12'     => __( 'One', 'avenue' ),
            'col-md-6'      => __( 'Two', 'avenue' ),
            'col-md-4'      => __( 'Three', 'avenue' ),
            'col-md-3'      => __( 'Four', 'avenue' ),
        )
    ));
    
    // Footer Copyright Text
    $wp_customize->add_setting( 'avenue[sc_footer_text]', array(
        'default'               => __( '© 2017 Your Company Name', 'avenue' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_footer_text]', array(
        'type'                  => 'text',
        'section'               => 'avenue_footer_section',
        'label'                 => __( 'Copyright Area Text', 'avenue' ),
    ) );
    