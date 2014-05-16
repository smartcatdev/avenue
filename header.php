<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package avenue
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="hfeed site">
            <header id="masthead" class="site-header" role="banner">
                <div id="site-toolbar">
                    <div class="row">
                        <div class="col-xs-4">
                            <a href="#">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-map-marker"></i>
                            </a>
                        </div>
                        <div class="col-xs-4"></div>
                        <div class="col-xs-4 social-bar">
                            <a href="#" target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" target="_blank">
                                <i class="fa fa-facebook"></i>                            
                            </a>
                            <a href="#" target="_blank">
                                <i class="fa fa-linkedin"></i>                            
                            </a>
                            <a href="#" target="_blank">
                                <i class="fa fa-flickr"></i>                            
                            </a>

                        </div>
                    </div>

                </div>
                <div class="site-branding">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                            <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                        </div>
                    </div>

                </div>

                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="menu-toggle"><?php _e('Primary Menu', 'avenue'); ?></button>
                            <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'avenue'); ?></a>

                            <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
                        </div>
                    </div>
                </nav><!-- #site-navigation -->
            </header><!-- #masthead -->


