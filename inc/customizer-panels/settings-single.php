<?php

// ---------------------------------------------
// Single Post Section
// ---------------------------------------------
$wp_customize->add_section( 'avenue_single_post_section', array(
    'title'                 => __( 'Single Layout', 'avenue'),
    'description'           => __( 'Customize the single templates for Posts/Pages', 'avenue' ),
    'priority'              => 10
) );

    // Single Post Images
    $wp_customize->add_setting( 'avenue[sc_single_featured]', array(
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'avenue_sanitize_on_off',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_single_featured]', array(
        'label'   => __( 'Show or Hide the Post images on single posts?', 'avenue' ),
        'section' => 'avenue_single_post_section',
        'type'    => 'radio',
        'choices'    => array(
            'on'    => __( 'Show', 'avenue' ),
            'off'   => __( 'Hide', 'avenue' ),
        )
    ));

    // Single Post Dates
    $wp_customize->add_setting( 'avenue[sc_single_date]', array(
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'avenue_sanitize_on_off',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_single_date]', array(
        'label'   => __( 'Show or Hide the Date on single posts?', 'avenue' ),
        'section' => 'avenue_single_post_section',
        'type'    => 'radio',
        'choices'    => array(
            'on'    => __( 'Show', 'avenue' ),
            'off'   => __( 'Hide', 'avenue' ),
        )
    ));

    // Single Post Author
    $wp_customize->add_setting( 'avenue[sc_single_author]', array(
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'avenue_sanitize_on_off',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_single_author]', array(
        'label'   => __( 'Show or Hide the Author on single posts?', 'avenue' ),
        'section' => 'avenue_single_post_section',
        'type'    => 'radio',
        'choices'    => array(
            'on'    => __( 'Show', 'avenue' ),
            'off'   => __( 'Hide', 'avenue' ),
        )
    ));

    