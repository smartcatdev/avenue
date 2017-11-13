<?php
/**
 * The template for displaying the home pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Avenue
 */

get_header(); 

$avenue_options = avenue_get_options();
$alternate_blog = isset( $avenue_options['blog_layout_style'] ) && $avenue_options['blog_layout_style'] == 'masonry' ? true : false;

?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <?php // if ( $avenue_options['sc_slider_bool'] == 'yes' ) : ?>
        <?php if ( true ) : ?>

            <?php do_action( 'avenue_slider' ); ?>
        
        <?php endif; ?>

        <?php if ( 'no post slider cta' == 'yes' ) : ?>

            <div id="post-slider-cta">

                <?php if ( $avenue_options['ares_cta_header_one'] ) : ?>
                    <h3 class="main-heading smartcat-animate fadeInLeft">
                        <?php echo esc_html( $avenue_options['ares_cta_header_one'] ); ?>
                    </h3>
                <?php endif; ?>

                <?php if ( $avenue_options['ares_cta_header_two'] ) : ?>
                    <h4 class="secondary-heading smartcat-animate fadeInRight">
                        <?php echo esc_html( $avenue_options['ares_cta_header_two'] ); ?>
                    </h4>
                <?php endif; ?>

            </div>

        <?php endif; ?>
        
        <?php if ( $avenue_options['sc_cta_bool'] == 'yes' ) : ?>
            <?php do_action( 'avenue_cta_trio' ); ?>
        <?php endif; ?>
        
        <?php // do_action( 'ares_pro_widget_areas' ); ?>
        
        <?php // do_action( 'ares_free_widget_areas' ); ?>
        
        <?php if ( isset( $avenue_options['sc_frontpage_content_bool'] ) && $avenue_options['sc_frontpage_content_bool'] == 'yes' ) : ?>
        
            <div class="container">

                <div class="frontpage row">

                    <?php if ( get_option( 'show_on_front' ) == 'posts' && $alternate_blog ) : ?>
                    
                        <div class="col-sm-12">

                            <div id="ares-alt-blog-wrap">
                                
                                <div id="masonry-blog-wrapper">

                                    <div class="grid-sizer"></div>
                                    <div class="gutter-sizer"></div>
                    
                    <?php endif; ?>
                    
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php

                        if ( 'posts' == get_option( 'show_on_front' ) ) {
                            
                            if ( $alternate_blog ) { 
                                get_template_part('template-parts/content', 'posts-alt' );
                            } else {
                                get_template_part('template-parts/content', 'posts' );
                            }
                            
                        } else {
                            get_template_part('template-parts/content', 'home');
                        }                

                        // If comments are open or we have at least one comment, load up the comment template
                        if (comments_open() || '0' != get_comments_number()) :
                            comments_template();
                        endif;

                        ?>

                    <?php endwhile; // end of the loop.   ?>
                    
                    <?php if ( get_option( 'show_on_front' ) == 'posts' && $alternate_blog ) : ?>
                    
                                </div>
                                
                            </div>
                            
                        </div>
                    
                    <?php endif; ?>
                                
                    <div class="pagination-links">
                        <?php echo the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
                    </div>

                </div>

            </div>

        <?php endif; ?>
        
    </main>
    
</div>

<?php get_footer();
