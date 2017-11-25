<?php
/**
 * Avenue functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Avenue
 */

if ( ! function_exists( 'avenue_setup' ) ) :
    
    if( !defined( 'AVENUE_VERSION' ) ) :
        define( 'AVENUE_VERSION', '3.0.0' );
    endif;
    
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function avenue_setup() {
        
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Avenue, use a find and replace
         * to change 'avenue' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'avenue', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'avenue' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        // add_theme_support( 'custom-background', apply_filters( 'avenue_custom_background_args', array(
        //     'default-color' => 'ffffff',
        //     'default-image' => '',
        // ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
        
        if( ! get_option( 'avenue' ) ) :
            
            // Options array does not exist from a previous version
            
            add_option( 'avenue', avenue_get_options() );
        
        else :
            
            if ( !get_option( 'avenue_migration_process' ) || get_option( 'avenue_migration_process' ) != 'completed' ) : 
            
                avenue_migration_process();
                
            endif;
            
        endif;
        
    }
    
endif;
add_action( 'after_setup_theme', 'avenue_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function avenue_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'avenue_content_width', 1170 );
}
add_action( 'after_setup_theme', 'avenue_content_width', 0 );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load the Font Awesome helper function.
 */
require get_template_directory() . '/inc/font-awesome.php';

/**
 * Load TGM
 */
require get_template_directory() . '/inc/tgm.php';

/**
 * Load the main custom theme functions file.
 */
require get_template_directory() . '/inc/avenue/avenue.php';

function avenue_get_options() {
    
    return get_option( 'avenue', array(
        
        // GENERAL
        
        'sc_headerbar_bool'                 => 'yes',           
//        'sc_logo_image'                   => '',      // Custom Logo
//        'sc_favicon'                      => '',      // Favicon
//        'sc_custom_code                   => '',      // JS Analytics Code
        
        // HEADER
        
        'avenue_branding_bar_height'        => 80,                                                      // New
        
        // SOCIAL
        
        'sc_facebook_url'                   => '',
        'sc_twitter_url'                    => '',
        'sc_linkedin_url'                   => '',
        'sc_gplus_url'                      => '',
        'sc_instagram_url'                  => '',                                                      // New
        'sc_youtube_url'                    => '',
        'sc_pinterest_url'                  => '',
        'sc_phone_url'                      => '(555) 555-5555',
        'sc_address_url'                    => __( '123 Main St., Kingston, Ontario', 'avenue' ),
        
        // FOOTER
        
        'sc_footer_columns'                 => 'col-md-4',
        'sc_footer_text'                    => __( '© 2017 Your Company Name', 'avenue' ),
        
        // APPEARANCE
        
        'sc_theme_color'                    => 'orange',                          
        'sc_font_size'                      => 14,                              
        'sc_font_family'                    => 'Montserrat, sans-serif',      
        'sc_font_family_secondary'          => 'Lato, sans-serif',                                      // New
        
        // SINGLE LAYOUT
        
        'sc_single_layout'                  => 'col2r',                         
        'sc_single_featured'                => 'on',                            
        'sc_single_date'                    => 'on',                            
        'sc_single_author'                  => 'on',        
        'sc_homepage_sidebar'               => 'sidebar-off',        
        
        // BLOG LAYOUT
        
        'sc_blog_layout'                    => 'col2r',
        'sc_blog_layout_left'               => 'col1',
        'sc_blog_featured'                  => 'on',
        
        // SLIDER
        
        'sc_slider_bool'                    => 'yes',
        
        'sc_slide1_image'                   => get_template_directory_uri() . '/inc/images/avenue_demo.jpg',
        'sc_slide1_text'                    => __( 'Welcome to Avenue', 'avenue' ),
        'sc_slide1_text2'                   => __( 'A professional, multi-purpose WordPress theme', 'avenue' ),
        
        'sc_slide2_image'                   => get_template_directory_uri() . '/inc/images/avenue_demo.jpg',
        'sc_slide2_text'                    => __( 'Welcome to Avenue', 'avenue' ),
        'sc_slide2_text2'                   => __( 'A professional, multi-purpose WordPress theme', 'avenue' ),
        
        'sc_slide3_image'                   => get_template_directory_uri() . '/inc/images/avenue_demo.jpg',
        'sc_slide3_text'                    => __( 'Welcome to Avenue', 'avenue' ),
        'sc_slide3_text2'                   => __( 'A professional, multi-purpose WordPress theme', 'avenue' ),
        
        // CTA TRIO
        
        'sc_cta_bool'                       => 'yes',
        
        'sc_cta1_title'                     => __( 'Theme Options', 'avenue' ),
        'sc_cta1_icon'                      => 'fa-cogs',
        'sc_cta1_text'                      => __( 'Change typography, colors, layouts...', 'avenue' ),
        'sc_cta1_url'                       => '',
        'sc_cta1_button_text'               => __( 'Click Here', 'avenue' ),
        
        'sc_cta2_title'                     => __( 'Responsive Layout', 'avenue' ),
        'sc_cta2_icon'                      => 'fa-mobile',
        'sc_cta2_text'                      => __( 'Fully responsive and mobile-ready', 'avenue' ),
        'sc_cta2_url'                       => '',
        'sc_cta2_button_text'               => __( 'Click Here', 'avenue' ),
        
        'sc_cta3_title'                     => __( 'Professional Design', 'avenue' ),
        'sc_cta3_icon'                      => 'fa-diamond',
        'sc_cta3_text'                      => __( 'Modern design to give your site a professional look', 'avenue' ),
        'sc_cta3_url'                       => '',
        'sc_cta3_button_text'               => __( 'Click Here', 'avenue' ),
        
        // FRONTPAGE
        
        'sc_frontpage_content_bool'         => 'yes',                                                   // New
        'sc_cta_trio_underline'             => 'no',                                                    // New
       
    ) );
    
}

function avenue_migration_process() {
    
    // Options array exists from a previous version, set defaults on newer Customizer options

    $existing_avenue_options = avenue_get_options();

    // If exists (strip extra "fa " from old theme option values)
    
    if ( array_key_exists( 'sc_cta1_icon', $existing_avenue_options ) && strpos( $existing_avenue_options['sc_cta1_icon'], 'fa ' ) !== false ) :
        $existing_avenue_options['sc_cta1_icon'] = str_replace( 'fa ', '', $existing_avenue_options['sc_cta1_icon'] );
    endif; 

    if ( array_key_exists( 'sc_cta2_icon', $existing_avenue_options ) && strpos( $existing_avenue_options['sc_cta2_icon'], 'fa ' ) !== false ) :
        $existing_avenue_options['sc_cta2_icon'] = str_replace( 'fa ', '', $existing_avenue_options['sc_cta2_icon'] );
    endif; 

    if ( array_key_exists( 'sc_cta3_icon', $existing_avenue_options ) && strpos( $existing_avenue_options['sc_cta3_icon'], 'fa ' ) !== false ) :
        $existing_avenue_options['sc_cta3_icon'] = str_replace( 'fa ', '', $existing_avenue_options['sc_cta3_icon'] );
    endif; 

    // If not exists
    
    if ( ! array_key_exists( 'sc_cta_trio_underline', $existing_avenue_options ) ) :
        $existing_avenue_options['sc_cta_trio_underline'] = 'no';
    endif; 
    
    if ( ! array_key_exists( 'sc_blog_layout_left', $existing_avenue_options ) ) :
        $existing_avenue_options['sc_blog_layout_left'] = 'col1';
    endif; 

    if ( ! array_key_exists( 'sc_frontpage_content_bool', $existing_avenue_options ) ) :
        $existing_avenue_options['sc_frontpage_content_bool'] = 'yes';
    endif; 

    if ( ! array_key_exists( 'sc_font_family_secondary', $existing_avenue_options ) ) :
        $existing_avenue_options['sc_font_family_secondary'] = $existing_avenue_options['sc_font_family'];
    endif; 

    if ( ! array_key_exists( 'avenue_branding_bar_height', $existing_avenue_options ) ) :
        $existing_avenue_options['avenue_branding_bar_height'] = 80;
    endif; 

    if ( ! array_key_exists( 'sc_instagram_url', $existing_avenue_options ) ) :
        $existing_avenue_options['sc_instagram_url'] = '';
    endif; 

    if ( array_key_exists( 'sc_font_size', $existing_avenue_options ) ) : 

        switch ( $existing_avenue_options['sc_font_size'] ):

            case '10px' :
                $existing_avenue_options['sc_font_size'] = 10;
                break;

            case '12px' :
                $existing_avenue_options['sc_font_size'] = 12;
                break;

            case '14px' :
                $existing_avenue_options['sc_font_size'] = 14;
                break;

            case '16px' :
                $existing_avenue_options['sc_font_size'] = 16;
                break;

            case '18px' :
                $existing_avenue_options['sc_font_size'] = 18;
                break;

            default :
                $existing_avenue_options['sc_font_size'] = 14;

        endswitch;

    endif;

    if ( array_key_exists( 'sc_font_family', $existing_avenue_options ) ) : 

        switch ( $existing_avenue_options['sc_font_family'] ):

            case 'MS Sans Serif, Geneva, sans-serif' :
                $existing_avenue_options['sc_font_family'] = 'MS Sans Serif, Tahoma, sans-serif';
                break;

            default :
                break;

        endswitch;

    endif;

    update_option( 'avenue', $existing_avenue_options );
    update_option( 'avenue_migration_process', 'completed' );
    
}
