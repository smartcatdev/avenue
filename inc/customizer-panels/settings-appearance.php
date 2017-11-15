<?php

// ---------------------------------------------
// Appearance - Customizer Panel
// ---------------------------------------------
$wp_customize->add_panel( 'avenue_appearance_panel', array(
    'title'                 => __( 'Appearance', 'avenue' ),
    'description'           => __( 'Customize the appearance of your site', 'avenue' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Colors Section
// ---------------------------------------------
$wp_customize->add_section( 'avenue_colors_section', array(
    'title'                 => __( 'Skin Color', 'avenue'),
    'description'           => __( 'Customize the colors of your site', 'avenue' ),
    'panel'                 => 'avenue_appearance_panel'
) );

    // Theme Color
    $wp_customize->add_setting( 'avenue[sc_theme_color]', array(
        'default'               => 'orange',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_theme_color]', array(
        'label'   => __( 'Select the theme skin color', 'avenue' ),
        'section' => 'avenue_colors_section',
        'type'    => 'radio',
        'choices'    => array(
            'orange'      => __( 'Orange', 'avenue' ),
            'green'     => __( 'Green', 'avenue' ),
            'blue'       => __( 'Blue', 'avenue' ),
        )
    ));

// ---------------------------------------------
// Fonts Section
// ---------------------------------------------
$wp_customize->add_section( 'avenue_fonts_section', array(
    'title'                 => __( 'Fonts', 'avenue'),
    'description'           => __( 'Customize the site\'s fonts', 'avenue' ),
    'panel'                 => 'avenue_appearance_panel'
) );

    // Primary Font Family
    $wp_customize->add_setting( 'avenue[sc_font_family]', array(
        'default'               => 'Montserrat, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_font_family]', array(
        'label'   => __( 'Select the primary font family (Headings)', 'avenue' ),
        'section' => 'avenue_fonts_section',
        'type'    => 'select',
        'choices' => avenue_fonts()
    ));

    // Secondary Font Family
    $wp_customize->add_setting( 'avenue[sc_font_family_secondary]', array(
        'default'               => 'Lato, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_font_family_secondary]', array(
        'label'   => __( 'Select the secondary font family (Body)', 'avenue' ),
        'section' => 'avenue_fonts_section',
        'type'    => 'select',
        'choices' => avenue_fonts()
    ));
    
    // Main Font Size
    $wp_customize->add_setting( 'avenue[sc_font_size]', array (
        'default'               => 14,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'avenue_sanitize_integer',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_font_size]', array(
        'type'                  => 'number',
        'section'               => 'avenue_fonts_section',
        'label'                 => __( 'Body Font Size', 'avenue' ),
        'input_attrs'           => array(
            'min' => 10,
            'max' => 40,
            'step' => 1,
    ) ) );
