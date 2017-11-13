<?php
/*
 * Theme homepage
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */
get_header();
?>
<?php if (of_get_option('sc_slider_bool', 'yes') == 'yes') echo sc_slider(); ?>
<?php if (of_get_option('sc_cta_bool', 'yes') == 'yes') echo sc_ctas(); ?>

<?php if(is_active_sidebar( 'sidebar-banner' ) ) : sc_banner(); endif; ?>
<?php if(is_active_sidebar( 'sidebar-bannerb' ) ) : sc_bannerb(); endif; ?>
<?php if(is_active_sidebar( 'sidebar-bannerc' ) ) : sc_bannerc(); endif; ?>


<div class="site-content-wrapper">
    <div id="content" class="page-content row">
        <div class="col-md-9 page-container <?php echo esc_attr( of_get_option('sc_homepage_sidebar', 'sidebar-off') ); ?>">
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    if ('posts' == get_option('show_on_front')) {
                        get_template_part('content', 'posts');
                    } else {
                        get_template_part('content', 'page');
                    }
                    // If comments are open or we have at least one comment, load up the comment template
                    if (comments_open() || '0' != get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                <?php endwhile; // end of the loop.   ?>
            </div>
            
            <?php if( 'sidebar-on' == of_get_option('sc_homepage_sidebar', 'sidebar-off')) : ?>
            <div class="col-md-3 avenue-sidebar">
                <?php get_sidebar(); ?>
            </div>
            <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>
