<?php
/**
 * avenue functions and definitions
 *
 * @package avenue
 */
if (!function_exists('avenue_setup')) :
    function avenue_setup() {
        if (!isset($content_width)) {
            global $content_width;
            $content_width = 1060;
        }

        define('SC_AVENUE_VERSION', '2.03');
        load_theme_textdomain('avenue', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_editor_style('');
        add_theme_support( 'title-tag' );
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'avenue'),
        ));

        // Enable support for Post Formats.
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('avenue_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Enable support for HTML5 markup.
        add_theme_support('html5', array(
            'comment-list',
            'search-form',
            'comment-form',
            'gallery',
            'caption',
        ));
        
    }
endif; 
add_action('after_setup_theme', 'avenue_setup');
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/jetpack.php';
define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/');
require_once dirname(__FILE__) . '/inc/options-framework.php';
require_once dirname(__FILE__) . '/inc/engine/tgm.php';
require_once dirname(__FILE__) . '/inc/engine/avenue.php';
