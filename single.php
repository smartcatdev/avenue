<?php
/**
 * The Template for displaying all single posts.
 *
 * @package avenue
 */
get_header();
?>

<div id="content" class="site-content">
    <?php while (have_posts()) : the_post(); ?>
        <div class="col-md-12">
            <div class="page-title single-title">
                <div class="row text-left">
                    <?php the_title(); ?>
                    <div class="post-details">
                    <?php
                        echo 'on' == of_get_option('sc_single_date', 'on') ? ' Posted on: ' .  esc_html( get_the_date() ) : '';
                        echo 'on' == of_get_option('sc_single_author', 'on') ? ', by : ' . esc_attr(get_the_author() ) : '';  
                    ?>                    
                    </div>
                </div>
            </div>
            
            <div class="page-content row">
                <div class="col-md-9 item-page <?php echo esc_attr( of_get_option('sc_single_layout') ); ?>">
                    <?php
                    'on' == of_get_option('sc_single_featured', 'on') ? the_post_thumbnail('medium') : '';
                    the_content();
                  
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'avenue'),
                        'after' => '</div>',
                    ));
                    // If comments are open or we have at least one comment, load up the comment template
                    if (comments_open() || '0' != get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>
                <?php if( 'col2r' == of_get_option('sc_single_layout', 'col2r')) : ?>
                <div class="col-md-3 avenue-sidebar">
                    <?php get_sidebar(); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; // end of the loop. ?>

</div><!-- #primary -->
<?php get_footer(); ?>