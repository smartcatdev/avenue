<?php
/**
 * Avenue Theme Customizer
 *
 * @package Avenue
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function avenue_customize_register( $wp_customize ) {
    
    // Header
    require_once( 'customizer-panels/settings-header-footer.php' );

    // Frontpage
    require_once( 'customizer-panels/settings-frontpage.php' );

    // Slider
    require_once( 'customizer-panels/settings-slider.php' );

    // Blog
    require_once( 'customizer-panels/settings-blog.php' );

    // Single
    require_once( 'customizer-panels/settings-single.php' );
    
    // Appearance
    require_once( 'customizer-panels/settings-appearance.php' );
    
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
                'selector'        => '.site-title a',
                'render_callback' => 'avenue_customize_partial_blogname',
        ) );
        
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
                'selector'        => '.site-description',
                'render_callback' => 'avenue_customize_partial_blogdescription',
        ) );
        
    }
}
add_action( 'customize_register', 'avenue_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function avenue_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function avenue_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function avenue_customize_preview_js() {
    wp_enqueue_script( 'avenue-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'avenue_customize_preview_js' );

/**
 * Sanitization Functions
 */
function avenue_sanitize_integer( $input ) {
    return intval( $input );
}

function avenue_sanitize_show_hide( $input ) {

    $valid_keys = array(
        'yes'   => __( 'Show', 'avenue' ),
        'no'    => __( 'Hide', 'avenue' ),
    );

    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }

}

function avenue_sanitize_on_off( $input ) {

    $valid_keys = array(
        'on'    => __( 'Show', 'avenue' ),
        'off'   => __( 'Hide', 'avenue' ),
    );

    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }

}

function avenue_sanitize_col_sidebar( $input ) {

    $valid_keys = array(
        'col1'      => __( 'No Sidebar', 'avenue' ),
        'col2r'     => __( 'Right Sidebar', 'avenue' ),
    );

    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }

}

function avenue_sanitize_col_sidebar_left( $input ) {

    $valid_keys = array(
        'col1'      => __( 'No Sidebar', 'avenue' ),
        'col2l'     => __( 'Left Sidebar', 'avenue' ),
    );

    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }

}

function avenue_sanitize_sidebar_off_on( $input ) {

    $valid_keys = array(
        'sidebar-off'   => __( 'No Sidebar', 'avenue' ),
        'sidebar-on'    => __( 'Right Sidebar', 'avenue' ),
    );

    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }

}

function avenue_sanitize_icon( $input ) {

    $valid_keys = smk_font_awesome('readable');

    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }

}