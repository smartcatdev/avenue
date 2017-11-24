<?php

// ---------------------------------------------
// Slider - Customizer Panel
// ---------------------------------------------
$wp_customize->add_panel( 'avenue_slider_panel', array(
    'title'                 => __( 'Slider', 'avenue' ),
    'description'           => __( 'Customize the appearance of your Slider', 'avenue' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Slide Settings Section
// ---------------------------------------------
$wp_customize->add_section( 'avenue_slider_settings_section', array(
    'title'                 => __( 'Slider Settings', 'avenue'),
    'description'           => __( 'Customize the general settings for the Slider', 'avenue' ),
    'panel'                 => 'avenue_slider_panel'
) );

    // Show / Hide Slider?
    $wp_customize->add_setting( 'avenue[sc_slider_bool]', array(
        'default'               => 'yes',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'avenue_sanitize_show_hide',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'avenue[sc_slider_bool]', array(
        'label'   => __( 'Show or hide the Slider?', 'avenue' ),
        'section' => 'avenue_slider_settings_section',
        'type'    => 'radio',
        'choices'    => array(
            'yes'   => __( 'Show', 'avenue' ),
            'no'    => __( 'Hide', 'avenue' ),
        )
    ));

// ---------------------------------------------
// Slides Loop
// ---------------------------------------------

for ( $ctr = 1; $ctr < apply_filters( 'avenue_capacity', 1 ); $ctr++ ) :

    // ---------------------------------------------
    // Slide Section
    // ---------------------------------------------
    $wp_customize->add_section( 'avenue_slide_' . $ctr . '_section', array(
        'title'                 => __( 'Slide #', 'avenue') . $ctr,
        'description'           => __( 'Customize slide #', 'avenue' ) . $ctr,
        'panel'                 => 'avenue_slider_panel'
    ) );

        // Slide - Image            
        $wp_customize->add_setting( 'avenue[sc_slide' . $ctr . '_image]', array(
            'default'               => $ctr > 3 ? '' : get_template_directory_uri() . '/inc/images/avenue_demo.jpg',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'avenue[sc_slide' . $ctr . '_image]', array(
            'mime_type'             => 'image',
            'settings'              => 'avenue[sc_slide' . $ctr . '_image]',
            'section'               => 'avenue_slide_' . $ctr . '_section',
            'label'                 => __( 'Slide Image', 'avenue' ),
        ) ) );

        // Slide - Caption Heading
        $wp_customize->add_setting( 'avenue[sc_slide' . $ctr . '_text]', array(
            'default'               => __( 'Welcome to Avenue', 'avenue' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_slide' . $ctr . '_text]', array(
            'type'                  => 'text',
            'section'               => 'avenue_slide_' . $ctr . '_section',
            'label'                 => __( 'Caption Heading', 'avenue' ),
        ) );

        // Slide - Caption Subheading
        $wp_customize->add_setting( 'avenue[sc_slide' . $ctr . '_text2]', array(
            'default'               => __( 'A professional, multi-purpose WordPress theme', 'avenue' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
            'type'                  => 'option'
        ) );
        $wp_customize->add_control( 'avenue[sc_slide' . $ctr . '_text2]', array(
            'type'                  => 'text',
            'section'               => 'avenue_slide_' . $ctr . '_section',
            'label'                 => __( 'Caption Subheading', 'avenue' ),
        ) );

endfor;
