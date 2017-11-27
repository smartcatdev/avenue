<?php

/**
 * Enqueue scripts and styles.
 */
function avenue_scripts() {
    
    wp_enqueue_style( 'avenue-style', get_stylesheet_uri() );
    
    // Get the Options array
    $avenue_options     = avenue_get_options();

    // Load Fonts from array
    $fonts              = avenue_fonts();
    $non_google_fonts   = avenue_non_google_fonts();
    
    // Are both fonts Google Fonts?
    if ( array_key_exists ( $avenue_options['sc_font_family'], $fonts ) && !array_key_exists ( $avenue_options['sc_font_family'], $non_google_fonts ) &&
        array_key_exists ( $avenue_options['sc_font_family_secondary'], $fonts ) && !array_key_exists ( $avenue_options['sc_font_family_secondary'], $non_google_fonts ) ) :
        
        if ( $avenue_options['sc_font_family'] == $avenue_options['sc_font_family_secondary'] ) :
            // Both fonts are Google Fonts and are the same, enqueue once
            wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ $avenue_options['sc_font_family'] ] ), array(), AVENUE_VERSION ); 
        else :
            // Both fonts are Google Fonts but are different, enqueue together
            wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ $avenue_options['sc_font_family'] ] . '|' . $fonts[ $avenue_options['sc_font_family_secondary'] ] ), array(), AVENUE_VERSION ); 
        endif;
        
    elseif ( array_key_exists ( $avenue_options['sc_font_family'], $fonts ) && !array_key_exists ( $avenue_options['sc_font_family'], $non_google_fonts ) ) :
    
        // Only Primary is a Google Font. Enqueue it.
        wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ $avenue_options['sc_font_family'] ] ), array(), AVENUE_VERSION ); 
        
    elseif ( array_key_exists ( $avenue_options['sc_font_family_secondary'], $fonts ) && !array_key_exists ( $avenue_options['sc_font_family_secondary'], $non_google_fonts ) ) :
        
        // Only Secondary is a Google Font. Enqueue it.
        wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ $avenue_options['sc_font_family_secondary'] ] ), array(), AVENUE_VERSION ); 
        
    endif;
    
    // Styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css', array(), AVENUE_VERSION );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/inc/css/animate.css', array(), AVENUE_VERSION );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', array(), AVENUE_VERSION );
    wp_enqueue_style( 'camera', get_template_directory_uri() . '/inc/css/camera.css', array(), AVENUE_VERSION );
    wp_enqueue_style( 'avenue-old-style', get_template_directory_uri() . '/inc/css/old_avenue.css', array(), AVENUE_VERSION );
    wp_enqueue_style( 'avenue-main-style', get_template_directory_uri() . '/inc/css/avenue.css', array(), AVENUE_VERSION );

    // Scripts
    wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/inc/js/jquery.easing.1.3.js', array('jquery'), AVENUE_VERSION, true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/inc/js/bootstrap.min.js', array('jquery'), AVENUE_VERSION, true );
    wp_enqueue_script( 'sticky-js', get_template_directory_uri() . '/inc/js/jquery.sticky.js', array('jquery'), AVENUE_VERSION, true );
    wp_enqueue_script( 'bigSlide-js', get_template_directory_uri() . '/inc/js/bigSlide.min.js', array('jquery'), AVENUE_VERSION, true );
    wp_enqueue_script( 'camera-js', get_template_directory_uri() . '/inc/js/camera.min.js', array('jquery'), AVENUE_VERSION, true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/inc/js/wow.min.js', array('jquery'), AVENUE_VERSION, true );
    wp_enqueue_script( 'avenue-main-script', get_template_directory_uri() . '/inc/js/avenue.js', array('jquery', 'jquery-masonry'), AVENUE_VERSION, true );

    $slider_array = array(
        'desktop_height'    => isset( $avenue_options['avenue_slider_height'] )     ? $avenue_options['avenue_slider_height']       : '42',
        'slide_timer'       => isset( $avenue_options['avenue_slider_time'] )       ? $avenue_options['avenue_slider_time']         : 4000, 
        'animation'         => isset( $avenue_options['avenue_slider_fx'] )         ? $avenue_options['avenue_slider_fx']           : 'simpleFade',
        'pagination'        => isset( $avenue_options['avenue_slider_pagination'] ) ? $avenue_options['avenue_slider_pagination']   : 'off',
        'navigation'        => isset( $avenue_options['avenue_slider_navigation'] ) ? $avenue_options['avenue_slider_navigation']   : 'on',
        'animation_speed'   => isset( $avenue_options['avenue_slider_trans_time'] ) ? $avenue_options['avenue_slider_trans_time']   : 2000,
        'hover'             => isset( $avenue_options['avenue_slider_hover'] )      ? $avenue_options['avenue_slider_hover']        : 'on',
    );
    
    // Pass each JS object to the custom script using wp_localize_script
    wp_localize_script( 'avenue-main-script', 'avenueSlider', $slider_array );
    
    // Other Scripts
    wp_enqueue_script( 'avenue-navigation', get_template_directory_uri() . '/js/navigation.js', array(), AVENUE_VERSION, true );
    wp_enqueue_script( 'avenue-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), AVENUE_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
}
add_action( 'wp_enqueue_scripts', 'avenue_scripts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function avenue_widgets_init() {
    
    $avenue_options = avenue_get_options();
    
    $homepage_a_widths = isset( $avenue_options['homepage_a_widget_widths'] ) && function_exists( 'avenue_strap_pl' ) && avenue_strap_pl() ? $avenue_options['homepage_a_widget_widths'] : '12';
    $homepage_b_widths = isset( $avenue_options['homepage_b_widget_widths'] ) && function_exists( 'avenue_strap_pl' ) && avenue_strap_pl() ? $avenue_options['homepage_b_widget_widths'] : '12';
    $homepage_c_widths = isset( $avenue_options['homepage_c_widget_widths'] ) && function_exists( 'avenue_strap_pl' ) && avenue_strap_pl() ? $avenue_options['homepage_c_widget_widths'] : '12';
    
    // Homepage A
    register_sidebar(array(
        'name' => __('Homepage Widget Area - A', 'avenue'),
        'id' => 'sidebar-banner',
        'description' => '',
        'before_widget' => '<div class="col-sm-' . esc_attr( $homepage_a_widths ) . '"><aside id="%1$s" class="widget %2$s animated wow fadeIn">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    // Homepage B
    register_sidebar(array(
        'name' => __('Homepage Widget Area - B', 'avenue'),
        'id' => 'sidebar-bannerb',
        'description' => '',
        'before_widget' => '<div class="col-sm-' . esc_attr( $homepage_b_widths ) . '"><aside id="%1$s" class="widget %2$s animated wow fadeIn">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    // Homepage C
    register_sidebar(array(
        'name' => __('Homepage Widget Area - C', 'avenue'),
        'id' => 'sidebar-bannerc',
        'description' => '',
        'before_widget' => '<div class="col-sm-' . esc_attr( $homepage_c_widths ) . '"><aside id="%1$s" class="widget %2$s animated wow fadeIn">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    // Left Sidebar
    register_sidebar(array(
        'name' => __('Left Sidebar', 'avenue'),
        'id' => 'sidebar-left',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
    // Right Sidebar
    register_sidebar(array(
        'name' => __('Right Sidebar', 'avenue'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    // Footer
    register_sidebar(array(
        'name' => __('Footer', 'avenue'),
        'id' => 'sidebar-footer',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="' . esc_attr( $avenue_options['sc_footer_columns'] ) . ' widget %2$s animated wow fadeIn">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
}
add_action( 'widgets_init', 'avenue_widgets_init' );

/**
 * Hex to rgb(a) converter function.
 */
function avenue_hex2rgba( $color, $opacity = false ) {

    $default = 'rgb(0,0,0)';

    // Return default if no color provided
    if ( empty( $color ) ) { return $default; }

    // Sanitize $color if "#" is provided
    if ( $color[0] == '#' ) { $color = substr( $color, 1 ); }

    // Check if color has 6 or 3 characters and get values
    if ( strlen( $color ) == 6 ) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    // Convert hexadec to rgb
    $rgb =  array_map( 'hexdec', $hex );

    // Check if opacity is set(rgba or rgb)
    if( $opacity ) {

        if( abs( $opacity ) > 1 ) { $opacity = 1.0; }
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';

    } else {

        $output = 'rgb('.implode(",",$rgb).')';

    }

    // Return rgb(a) color string
    return $output;

}

/**
 * Inject dynamic CSS rules with wp_head.
 */
function avenue_custom_css() { 

    $avenue_options = avenue_get_options(); ?>

    <style>

        #parent-slider-wrap {
            height: calc(100vw * <?php echo isset( $avenue_options['avenue_slider_height'] ) ? (int)$avenue_options['avenue_slider_height'] / 100 : (int)'42' / 100; ?>);
        }
        
        h1,h2,h3,h4,h5,h6,
        #site-branding div.navigation div#primary-menu > ul > li > a,
        #site-branding div.navigation ul#primary-menu > li > a,
        div#mobile-menu-wrap ul#mobile-menu > li,
        .avenue-callout .buttons .avenue-button,
        .avenue-events .event-details .location {
            font-family: <?php echo esc_attr( $avenue_options['sc_font_family'] ); ?>;
            
        }
        
        body {
            font-size: <?php echo esc_attr( $avenue_options['sc_font_size'] ); ?>px;
            font-family: <?php echo esc_attr( $avenue_options['sc_font_family_secondary'] ); ?>;
        }
        
        .error-404 .description,
        .faq-item .faq-answer,
        #masonry-blog-wrapper .blog-roll-item .post-category,
        #masonry-blog-wrapper .blog-roll-item .post-meta,
        div#post-slider-cta .secondary-heading {
            font-family: <?php echo esc_attr( $avenue_options['sc_font_family_secondary'] ); ?>;
        }
        
        /*
        ----- Header Heights ---------------------------------------------------------
        */

        @media (min-width:992px) {
            #site-branding,
            #site-navigation {
               height: <?php echo intval( $avenue_options['avenue_branding_bar_height'] ); ?>px !important;
            }
            #site-branding img {
               max-height: <?php echo intval( $avenue_options['avenue_branding_bar_height'] ); ?>px;
            }
            div#primary-menu > ul > li,
            ul#primary-menu > li {
                line-height: <?php echo intval( $avenue_options['avenue_branding_bar_height'] - 5 ); ?>px;
            }
        }

        @media (max-width:991px) {
            header#masthead,
            #site-branding,
            #site-branding-sticky-wrap-sticky-wrapper,
            #site-branding-sticky-wrap-sticky-wrapper #site-branding-sticky-wrap{
                height: <?php echo isset( $avenue_options['avenue_branding_bar_height_mobile'] ) ? intval( $avenue_options['avenue_branding_bar_height_mobile'] ) : intval( $avenue_options['avenue_branding_bar_height'] ); ?>px !important;
                min-height: <?php echo isset( $avenue_options['avenue_branding_bar_height_mobile'] ) ? intval( $avenue_options['avenue_branding_bar_height_mobile'] ) : intval( $avenue_options['avenue_branding_bar_height'] ); ?>px !important;
            }
        }
        
        #site-branding div#primary-menu > ul ul.sub-menu,
        #site-branding ul#primary-menu ul.sub-menu {
            top: <?php echo intval( $avenue_options['avenue_branding_bar_height'] ); ?>px;
        }
            
        <?php if ( isset( $avenue_options['sc_cta_trio_underline'] ) && $avenue_options['sc_cta_trio_underline'] == 'yes' ) : ?>
            .site-cta .title-wrap {
                margin-bottom: 15px;
                border-bottom: thin solid #e3e3e3;
                padding-bottom: 10px;
            }
        <?php endif; ?>
        
        /*
        ----- Theme Colors -----------------------------------------------------
        */
       
        <?php 
        
        $colors_array = avenue_get_theme_skin_colors();
        
        $primary_theme_color = $colors_array['primary'];
        $secondary_theme_color = $colors_array['accent']; 
        
        ?>
       
        /* --- Primary --- */
        
        a, a:visited,
        .primary-color,
        .btn-primary .badge,
        .btn-link,
        .sc-primary-color,
        .icon404,
        header#masthead div#primary-menu > ul > li > a:hover,
        #site-branding div#primary-menu > ul ul.sub-menu > li a:hover,
        header#masthead ul#primary-menu > li > a:hover,
        #site-branding ul#primary-menu ul.sub-menu > li a:hover,
        .scroll-top:hover,
        .avenue-sidebar .avenue-contact-info .contact-row .detail span.fa
        {
            color: <?php echo esc_attr( $primary_theme_color ); ?>;
        }
        
        .btn-primary,
        fieldset[disabled] .btn-primary.active,
        #homepage-area-a,
        #site-toolbar .social-bar a:hover,
        .error-404 i.fa.icon404,
        .avenue-sidebar .avenue-callout .buttons .avenue-button,
        .avenue-sidebar .avenue-contact-form input[type="submit"],
        .avenue-sidebar .avenue-events .event-details a.avenue-button,
        .page-template-cpt-page-events .avenue-events .event-details a.avenue-button,
        footer#colophon .footer-boxes .avenue-callout .buttons .avenue-button,
        footer#colophon .footer-boxes .avenue-contact-form input[type="submit"],
        footer#colophon .footer-boxes .avenue-events .event-details a.avenue-button,
        footer#colophon .footer-boxes .avenue-pricing-table a.avenue-button,
        .pagination-links .page-numbers.current
        {
            background: <?php echo esc_attr( $primary_theme_color ); ?>;
        }
        
        .btn-primary,
        .sc-primary-border,
        .scroll-top:hover,
        header#masthead div#primary-menu > ul > li > a:hover,
        header#masthead ul#primary-menu > li > a:hover
        {
            border-color: <?php echo esc_attr( $primary_theme_color ); ?>;
        }
        
        .site-branding .search-bar .search-field:focus{
            border-bottom: 1px solid <?php echo esc_attr( $primary_theme_color ); ?>;
        }
        
        .main-navigation .current_page_parent .current-menu-item a,
        .main-navigation .current_page_item > a,
        .main-navigation .current_page_parent > a {
            border-bottom: 5px solid <?php echo esc_attr( $primary_theme_color ); ?>;
        }
        
        .sc-slider-wrapper .camera_caption .secondary-caption {
            background: <?php echo esc_attr( avenue_hex2rgba( $primary_theme_color, 1 ) ); ?>;
        }
        
        <?php if ( !avenue_any_homepage_areas_active() ) : ?>
            div#site-cta-wrap {
                border-bottom: 2px solid #333333;
            }
        <?php endif; ?>
        
        div#post-slider-cta {
            background: <?php echo isset( $avenue_options['avenue_callout_banner_background'] ) ? esc_attr( $avenue_options['avenue_callout_banner_background'] ) : esc_attr( $primary_theme_color ); ?>;
            color: <?php echo isset( $avenue_options['avenue_callout_banner_text_color'] ) ? esc_attr( $avenue_options['avenue_callout_banner_text_color'] ) : '#ffffff'; ?>;
        }
        
        div#post-slider-cta a.avenue-button {
            color: <?php echo isset( $avenue_options['avenue_callout_banner_text_color'] ) ? esc_attr( $avenue_options['avenue_callout_banner_text_color'] ) : '#ffffff'; ?>;
            border-color: <?php echo isset( $avenue_options['avenue_callout_banner_text_color'] ) ? esc_attr( $avenue_options['avenue_callout_banner_text_color'] ) : '#ffffff'; ?>;
        }

        div#post-slider-cta a.avenue-button:hover {
            background: <?php echo isset( $avenue_options['avenue_callout_banner_text_color'] ) ? esc_attr( avenue_hex2rgba( $avenue_options['avenue_callout_banner_text_color'], .25 ) ) : 'rgba(255,255,255,0.25)'; ?>;
        }
        
        @media(max-width: 600px){
            .nav-menu > li.current_page_item a {
                color: <?php echo esc_attr( $primary_theme_color ); ?>;
            }
        }
               
        /* --- Secondary --- */
        
        a:hover,
        .main-navigation .current_page_item a,
        .main-navigation .current-menu-item a
        {
            color: <?php echo esc_attr( $secondary_theme_color ); ?>;
        }
        
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active,
        .open .dropdown-toggle.btn-primary,
        .avenue-sidebar .avenue-callout .buttons .avenue-button:hover,
        .avenue-sidebar .avenue-contact-form input[type="submit"]:hover,
        .avenue-sidebar .avenue-events .event-details a.avenue-button:hover,
        .page-template-cpt-page-events .avenue-events .event-details a.avenue-button:hover,
        footer#colophon .footer-boxes .avenue-callout .buttons .avenue-button:hover,
        footer#colophon .footer-boxes .avenue-contact-form input[type="submit"]:hover,
        footer#colophon .footer-boxes .avenue-events .event-details a.avenue-button:hover,
        footer#colophon .footer-boxes .avenue-pricing-table a.avenue-button:hover
        {
            background-color: <?php echo esc_attr( $secondary_theme_color ); ?>;
        }
        
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active,
        .open .dropdown-toggle.btn-primary
        {
            border-color: <?php echo esc_attr( $secondary_theme_color ); ?>;
        }
        
    </style>

<?php }
add_action( 'wp_head', 'avenue_custom_css' );

/**
 * Returns all available fonts as an array
 *
 * @return array of fonts
 */
if( !function_exists( 'avenue_fonts' ) ) {

    function avenue_fonts() {

        $font_family_array = array(
            
            // Web Fonts
            'Arial, Helvetica, sans-serif'                      => 'Arial',
            'Arial Black, Gadget, sans-serif'                   => 'Arial Black',
            'Courier New, monospace'                            => 'Courier New',
            'Georgia, serif'                                    => 'Georgia',
            'Impact, Charcoal, sans-serif'                      => 'Impact',
            'Lucida Console, Monaco, monospace'                 => 'Lucida Console',
            'Lucida Sans Unicode, Lucida Grande, sans-serif'    => 'Lucida Sans Unicode',
            'MS Sans Serif, Tahoma, sans-serif'                 => 'MS Sans Serif',
            'MS Serif, New York, serif'                         => 'MS Serif',
            'Palatino Linotype, Book Antiqua, Palatino, serif'  => 'Palatino Linotype',
            'Tahoma, Geneva, sans-serif'                        => 'Tahoma',
            'Times New Roman, Times, serif'                     => 'Times New Roman',
            'Trebuchet MS, sans-serif'                          => 'Trebuchet MS',
            'Verdana, Geneva, sans-serif'                       => 'Verdana',
            
            // Google Fonts
            'Abel, sans-serif'                                  => 'Abel',
            'Arvo, serif'                                       => 'Arvo:400,400i,700',
            'Bangers, cursive'                                  => 'Bangers',
            'Courgette, cursive'                                => 'Courgette',
            'Domine, serif'                                     => 'Domine',
            'Dosis, sans-serif'                                 => 'Dosis:200,300,400',
            'Droid Sans, sans-serif'                            => 'Droid+Sans:400,700',
            'Economica, sans-serif'                             => 'Economica:400,700',
            'Josefin Sans, sans-serif'                          => 'Josefin+Sans:300,400,600,700',
            'Itim, cursive'                                     => 'Itim',
            'Lato, sans-serif'                                  => 'Lato:100,300,400,700,900,300italic,400italic',
            'Lobster Two, cursive'                              => 'Lobster+Two',
            'Lora, serif'                                       => 'Lora',
            'Lilita One, cursive'                               => 'Lilita+One',
            'Montserrat, sans-serif'                            => 'Montserrat:400,700',
            'Noto Serif, serif'                                 => 'Noto+Serif',
            'Old Standard TT, serif'                            => 'Old+Standard+TT:400,400i,700',
            'Open Sans, sans-serif'                             => 'Open Sans',
            'Open Sans Condensed, sans-serif'                   => 'Open+Sans+Condensed:300,300i,700',
            'Orbitron, sans-serif'                              => 'Orbitron',
            'Oswald, sans-serif'                                => 'Oswald:300,400',
            'Poiret One, cursive'                               => 'Poiret+One',
            'PT Sans Narrow, sans-serif'                        => 'PT+Sans+Narrow',
            'Rajdhani, sans-serif'                              => 'Rajdhani:300,400,500,600',
            'Raleway, sans-serif'                               => 'Raleway:200,300,400,500,700',
            'Roboto, sans-serif'                                => 'Roboto:100,300,400,500',
            'Roboto Condensed, sans-serif'                      => 'Roboto+Condensed:400,300,700',
            'Shadows Into Light, cursive'                       => 'Shadows+Into+Light',
            'Shrikhand, cursive'                                => 'Shrikhand',
            'Source Sans Pro, sans-serif'                       => 'Source+Sans+Pro:200,400,600',
            'Teko, sans-serif'                                  => 'Teko:300,400,600',
            'Titillium Web, sans-serif'                         => 'Titillium+Web:400,200,300,600,700,200italic,300italic,400italic,600italic,700italic',
            'Trirong, serif'                                    => 'Trirong:400,700',
            'Ubuntu, sans-serif'                                => 'Ubuntu',
            'Vollkorn, serif'                                   => 'Vollkorn:400,400i,700',
            'Voltaire, sans-serif'                              => 'Voltaire',
            
        );

        return apply_filters( 'avenue_fonts', $font_family_array );

    }

}

/**
 * Retrieve non-Google based fonts.
 */
function avenue_non_google_fonts() {
    
    return array(
            
        // Web Fonts
        'Arial, Helvetica, sans-serif'                      => 'Arial',
        'Arial Black, Gadget, sans-serif'                   => 'Arial Black',
        'Courier New, monospace'                            => 'Courier New',
        'Georgia, serif'                                    => 'Georgia',
        'Impact, Charcoal, sans-serif'                      => 'Impact',
        'Lucida Console, Monaco, monospace'                 => 'Lucida Console',
        'Lucida Sans Unicode, Lucida Grande, sans-serif'    => 'Lucida Sans Unicode',
        'MS Sans Serif, Tahoma, sans-serif'                 => 'MS Sans Serif',
        'MS Serif, New York, serif'                         => 'MS Serif',
        'Palatino Linotype, Book Antiqua, Palatino, serif'  => 'Palatino Linotype',
        'Tahoma, Geneva, sans-serif'                        => 'Tahoma',
        'Times New Roman, Times, serif'                     => 'Times New Roman',
        'Trebuchet MS, sans-serif'                          => 'Trebuchet MS',
        'Verdana, Geneva, sans-serif'                       => 'Verdana',

    );
    
}

/**
 * Render the toolbar in the header.
 */
add_action( 'avenue_toolbar', 'avenue_render_toolbar' );
function avenue_render_toolbar() {
    
    get_template_part('template-parts/layout', 'toolbar' );
    
}

/**
 * Render the slider on the frontpage.
 */
add_action( 'avenue_slider', 'avenue_render_slider', 10 );
function avenue_render_slider() {
    
    get_template_part('template-parts/layout', 'slider' );
    
}

/**
 * Render the CTA Trio on the frontpage.
 */
add_action( 'avenue_cta_trio', 'avenue_render_cta_trio' );
function avenue_render_cta_trio() {

    get_template_part('template-parts/layout', 'cta-trio' );

}

/**
 * Render the footer.
 */
add_action( 'avenue_footer', 'avenue_render_footer' );
function avenue_render_footer() {
    
    get_template_part('template-parts/layout', 'footer' );
    
}

/**
 * Render the free Widget Areas.
 */
add_action( 'avenue_free_widget_areas', 'avenue_render_free_widget_areas' );
function avenue_render_free_widget_areas() {
    
    get_template_part('template-parts/layout', 'homepage-areas' );
    
}

/**
 * Render the SC designer section.
 */
add_action( 'avenue_designer', 'avenue_add_designer', 10 );
function avenue_add_designer() { ?>
    
    <a href="https://smartcatdesign.net/" rel="designer" style="display: inline-block !important" class="rel">
        <?php printf( esc_html__( 'Designed by %s', 'avenue' ), 'Smartcat' ); ?> 
        <img id="scl" src="<?php echo get_template_directory_uri() . '/inc/images/cat_logo_mini.png'?>" alt="<?php printf( esc_attr__( '%s Logo', 'avenue'), 'Smartcat' ); ?>" />
    </a>
    
<?php }

/**
 * 
 * Get an array containing the primary and accent colors in use by the theme.
 * 
 * @return String Array
 */
function avenue_get_theme_skin_colors() {
    
    $avenue_options = avenue_get_options();
    
    $colors_array = array();
    
    if ( isset( $avenue_options['avenue_use_custom_colors'] ) && $avenue_options['avenue_use_custom_colors'] == 'custom' ) :
        
        $colors_array['primary'] = isset( $avenue_options['avenue_custom_primary'] ) ? $avenue_options['avenue_custom_primary'] : '#83CBDC';
        $colors_array['accent'] = isset( $avenue_options['avenue_custom_accent'] ) ? $avenue_options['avenue_custom_accent'] : '#57A9BD';

    else :

        switch ( $avenue_options['sc_theme_color'] ) :

            case 'orange' :
                $colors_array['primary'] = '#FF6131';
                $colors_array['accent'] = '#D85904';
                break;

            case 'green' :
                $colors_array['primary'] = '#0FAF97';
                $colors_array['accent'] = '#0B9681';
                break;

            case 'blue' :
                $colors_array['primary'] = '#3B7DBD';
                $colors_array['accent'] = '#195794';
                break;

            default :
                $colors_array['primary'] = '#FF6131';
                $colors_array['accent'] = '#D85904';
                break;

        endswitch;

    endif;
    
    return $colors_array;

}

add_filter( 'avenue_capacity', 'avenue_check_capacity', 10, 1 );
function avenue_check_capacity( $base_value = 1 ) {
    
    if ( function_exists( 'avenue_strap_pl' ) && avenue_strap_pl() ) :
        return $base_value + 6;
    else:
        return $base_value + 3;
    endif;
    
}

/**
 * Determine the width of columns based on left and right sidebar settings.
 */
function avenue_main_width( $override = 'default' ) {
    
    if ( $override == 'default' ) :
        
        // An override was not passed from the Page / Post calling this function, or default is set
        
        if( is_active_sidebar( 'sidebar-left' ) && is_active_sidebar( 1 ) ) :
            $width = 4;
        elseif( is_active_sidebar( 'sidebar-left' ) || is_active_sidebar( 1 ) ) :
            $width = 8;
        else:
            $width = 12;
        endif;
        
    else :

        // An override was passed from the Page / Post calling this function
        
        if( $override == 'leftright' && ( is_active_sidebar( 'sidebar-left' ) && is_active_sidebar( 1 ) ) ) :
            $width = 4;
        elseif( ( ( $override == 'left' || $override == 'leftright' ) && is_active_sidebar( 'sidebar-left' ) ) || ( ( $override == 'right' || $override == 'leftright' ) && is_active_sidebar( 1 ) ) ) :
            $width = 8;
        else:
            $width = 12;
        endif;
        
    endif;        
    
    return $width;

}

new Avenue_Sidebar_Location_Meta_Box();
class Avenue_Sidebar_Location_Meta_Box {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php',        array ( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php',    array ( $this, 'init_metabox' ) );
        }
        
    }

    public function init_metabox() {

        add_action( 'add_meta_boxes',           array ( $this, 'add_metabox' ) );
        add_action( 'save_post',                array ( $this, 'save_metabox' ), 10, 2 );
        
    }

    public function add_metabox() {

        add_meta_box( 
            'avenue_sidebar_location_meta_box', 
            __( 'Sidebar Location', 'avenue' ), 
            array ( $this, 'render_avenue_sidebar_location_meta_box' ), 
            array( 'page', 'post'), 
            'normal', 
            'high' 
        );

    }

    public function render_avenue_sidebar_location_meta_box( $post ) {
        
        // Add nonce for security and authentication.
        wp_nonce_field( 'avenue_sidebar_location_meta_box_nonce_action', 'avenue_sidebar_location_meta_box_nonce' );

        // Retrieve an existing value from the database.
        $avenue_sidebar_location    = get_post_meta( $post->ID, 'avenue_sidebar_location', true );
        	
        // Set default values.
        if ( empty( $avenue_sidebar_location ) )    { $avenue_sidebar_location = 'right'; }
        
        // Form fields
        
        echo '<table class="form-table">';
            
        // Sidebar Setting
        echo '  <tr>';
        echo '      <th><label for="avenue_sidebar_location" class="avenue_sidebar_location_label">' . __( 'Sidebar Location', 'avenue' ) . '</label></th>';
        echo '      <td>';
        echo '          <select id="avenue_sidebar_location" name="avenue_sidebar_location" class="avenue_sidebar_location_field">';
        // echo '          <option value="default" ' . esc_attr( selected( $avenue_sidebar_location, 'default', false ) ) . '> ' . __( 'Default', 'avenue' ) . '</option>';
        echo '          <option value="left" ' . esc_attr( selected( $avenue_sidebar_location, 'left', false ) ) . '> ' . __( 'Left Sidebar', 'avenue' ) . '</option>';
        echo '          <option value="right" ' . esc_attr( selected( $avenue_sidebar_location, 'right', false ) ) . '> ' . __( 'Right Sidebar', 'avenue' ) . '</option>';
        echo '          <option value="leftright" ' . esc_attr( selected( $avenue_sidebar_location, 'leftright', false ) ) . '> ' . __( 'Left + Right Sidebars', 'avenue' ) . '</option>';
        echo '          <option value="none" ' . esc_attr( selected( $avenue_sidebar_location, 'none', false ) ) . '> ' . __( 'No Sidebar', 'avenue' ) . '</option>';
        echo '          </select>';
        echo '          <p class="description">' . __( 'Do you want to display a sidebar on this post/page?', 'avenue' ) . '</p>';
        echo '      </td>';
        echo '  </tr>';

        echo '</table>';
        
    }
    
    public function save_metabox( $post_id, $post ) {

        // Add nonce for security and authentication.
        $nonce_name     = isset( $_POST[ 'avenue_sidebar_location_meta_box_nonce' ] ) ? $_POST[ 'avenue_sidebar_location_meta_box_nonce' ] : '';
        $nonce_action   = 'avenue_sidebar_location_meta_box_nonce_action';

        // Check if a nonce is set and valid
        if ( !isset( $nonce_name ) ) { return; }
        if ( !wp_verify_nonce( $nonce_name, $nonce_action ) ) { return; }
            
        // Sanitize user input.
        $avenue_sidebar_location  = isset( $_POST[ 'avenue_sidebar_location' ] ) ? sanitize_text_field( $_POST[ 'avenue_sidebar_location' ] ) : '';
		
        // Update the meta field in the database
        update_post_meta( $post_id, 'avenue_sidebar_location', $avenue_sidebar_location );
        
    }
    
}

function avenue_is_homepage_sidebar_active( $homepage_id ) {
    
    $avenue_options = avenue_get_options();
    
    if ( isset( $homepage_id ) ) {
        
        if ( $homepage_id == 'a' ) : 
            $is_active = is_active_sidebar( 'sidebar-banner' );
        else: 
            $is_active = is_active_sidebar( 'sidebar-banner' . $homepage_id );
        endif;

        if ( !is_null( $is_active ) ) :
            
            if ( isset( $avenue_options['homepage_area_' . $homepage_id . '_toggle'] ) && $avenue_options['homepage_area_' . $homepage_id . '_toggle'] == 'on' && $is_active ) {
                return true;    // Is set to ON
            } elseif ( !isset( $avenue_options['homepage_area_' . $homepage_id . '_toggle'] ) && $is_active ) {
                return true;    // Is NOT set at all (Free)
            } else {
                return false;   // Is set to OFF
            }
            
        endif; 
        
    } else {
        
        return false;
        
    }
    
}

function avenue_any_homepage_areas_active() {
    
    $avenue_options = avenue_get_options();
    
    if ( 
        ( avenue_is_homepage_sidebar_active( 'a' ) ) ||
        ( avenue_is_homepage_sidebar_active( 'b' ) ) ||
        ( avenue_is_homepage_sidebar_active( 'c' ) ) ||
        ( function_exists( 'avenue_strap_pl' ) && avenue_strap_pl() && avenue_is_homepage_sidebar_active( 'd' ) ) ||
        ( function_exists( 'avenue_strap_pl' ) && avenue_strap_pl() && avenue_is_homepage_sidebar_active( 'e' ) ) ||
        ( function_exists( 'avenue_strap_pl' ) && avenue_strap_pl() && isset( $avenue_options['avenue_callout_banner_toggle'] ) && $avenue_options['avenue_callout_banner_toggle'] == 'yes' )
    ) {
        return true;
    } else {
        return false;
    }
    
}
