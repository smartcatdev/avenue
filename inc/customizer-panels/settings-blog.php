<?php

// ---------------------------------------------
// Blog Section
// ---------------------------------------------
$wp_customize->add_section( 'avenue_blog_section', array(
    'title'                 => __( 'Blog Layout', 'avenue'),
    'description'           => __( 'Customize the Blog of your site', 'avenue' ),
    'priority'              => 10
) );

    // Blog Layout - Include Left Sidebar?
    $wp_customize->add_setting( 'avenue[sc_blog_layout_left]', array(
        'default'               => 'col1',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'avenue_sanitize_col_sidebar_left',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_blog_layout_left]', array(
        'label'   => __( 'Include the left sidebar on the blog?', 'avenue' ),
        'section' => 'avenue_blog_section',
        'type'    => 'radio',
        'choices'    => array(
            'col1'      => __( 'No Sidebar', 'avenue' ),
            'col2l'     => __( 'Left Sidebar', 'avenue' ),
        )
    ));
    
    // Blog Layout - Include Sidebar?
    $wp_customize->add_setting( 'avenue[sc_blog_layout]', array(
        'default'               => 'col2r',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'avenue_sanitize_col_sidebar',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_blog_layout]', array(
        'label'   => __( 'Include the right sidebar on the blog?', 'avenue' ),
        'section' => 'avenue_blog_section',
        'type'    => 'radio',
        'choices'    => array(
            'col1'      => __( 'No Sidebar', 'avenue' ),
            'col2r'     => __( 'Right Sidebar', 'avenue' ),
        )
    ));

    // Show / Hide Post images on the Blog?
    $wp_customize->add_setting( 'avenue[sc_blog_featured]', array(
         'default'               => 'on',
         'transport'             => 'refresh',
         'sanitize_callback'     => 'avenue_sanitize_on_off',
         'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_blog_featured]', array(
        'label'   => __( 'Show or Hide the Post images on the blog page?', 'avenue' ),
        'section' => 'avenue_blog_section',
        'type'    => 'radio',
        'choices'    => array(
            'on'    => __( 'Show', 'avenue' ),
            'off'   => __( 'Hide', 'avenue' ),
        )
    ));

    
    