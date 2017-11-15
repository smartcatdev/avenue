<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Avenue
 */

$avenue_options = avenue_get_options();

get_header(); ?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <div class="container">
    
            <?php while ( have_posts() ) : the_post(); ?>
    
                <div class="page-content row ">
                    
                    <div class="col-md-<?php echo is_active_sidebar(1) && $avenue_options['sc_single_layout'] == 'col2r' ? '8' : '12'; ?>">
                    
                        <?php if ( isset( $avenue_options['single_post_layout_style'] ) && $avenue_options['single_post_layout_style'] == 'alternate' ) : ?>
                        
                            <?php get_template_part( 'template-parts/content', 'single-alt' ); ?>
                        
                        <?php else : ?>
                        
                            <article class="item-page">

                                <h2 class="post-title">
                                    <?php the_title(); ?>
                                </h2>

                                <?php echo $avenue_options['sc_single_date'] == 'on' ? __( 'Posted on: ', 'avenue' ) . esc_html( get_the_date() ) : ''; ?><?php echo $avenue_options['sc_single_author'] == 'on' && $avenue_options['sc_single_date'] == 'on' ? __( ', ', 'avenue' ) : ''; ?>

                                <?php echo $avenue_options['sc_single_author'] == 'on' ? __( 'by : ', 'avenue' ) . get_the_author_posts_link() : ''; ?>
                                
                                <div class="entry-content">

                                    <?php $avenue_options['sc_single_featured'] == 'on' ? the_post_thumbnail( 'medium' ) : ''; ?>

                                    <?php the_content(); ?>

                                    <?php 

                                    wp_link_pages(array(
                                        'before' => '<div class="page-links">' . __( 'Pages:', 'avenue' ),
                                        'after' => '</div>',
                                    ));

                                    if (comments_open() || '0' != get_comments_number()) :
                                        comments_template();
                                    endif;

                                    ?>

                                </div>
                                
                            </article>
                        
                        <?php endif; ?>
                        
                    </div>

                    <?php if ( is_active_sidebar(1) && $avenue_options['sc_single_layout'] == 'col2r' ) : ?>

                        <div class="col-md-4 avenue-sidebar">
                            <?php get_sidebar(); ?>
                        </div>

                    <?php endif; ?>

                </div>

            <?php endwhile; // end of the loop. ?>

        </div>
        
    </main><!-- #primary -->
    
</div><!-- #primary -->

<?php get_footer();
