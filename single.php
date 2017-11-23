<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Avenue
 */

$avenue_options     = avenue_get_options();
$is_alternate       = get_post_meta( get_the_ID(), 'avenue_layout_style', true ) && get_post_meta( get_the_ID(), 'avenue_layout_style', true ) == 'alternate' && function_exists( 'avenue_strap_pl' ) && avenue_strap_pl() ? true : false;  
$sidebar_override   = get_post_meta( get_the_ID(), 'avenue_sidebar_location', true );
if ( empty( $sidebar_override ) ) {
    $sidebar_override = isset( $avenue_options['sc_single_layout'] ) && $avenue_options['sc_single_layout'] == 'col2r' ? 'right' : 'none';
}

get_header(); ?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <div class="container">
    
            <?php while ( have_posts() ) : the_post(); ?>
    
                <div class="page-content row">
                    
                    <?php if ( ( $sidebar_override == 'left' || $sidebar_override == 'leftright' || $sidebar_override == 'default' ) && is_active_sidebar( 'sidebar-left' ) ) : ?>
                    
                        <div class="col-md-4 avenue-sidebar">
                            <?php get_sidebar( 'left' ); ?>
                        </div>
                    
                    <?php endif; ?>
                    
                    <div class="col-md-<?php echo esc_attr( avenue_main_width( $sidebar_override ) ); ?>">
                    
                        <?php if ( $is_alternate ) : ?>
                        
                            <?php get_template_part( 'template-parts/content', 'single-alt' ); ?>
                        
                        <?php else : ?>
                        
                            <?php get_template_part( 'template-parts/content', 'single' ); ?>

                        <?php endif; ?>
                        
                    </div>

                    <?php if ( ( $sidebar_override == 'right' || $sidebar_override == 'leftright' || $sidebar_override == 'default' ) && is_active_sidebar( 1 ) ) : ?>

                        <div class="col-md-4 avenue-sidebar">
                            <?php get_sidebar( '1' ); ?>
                        </div>

                    <?php endif; ?>

                </div>

            <?php endwhile; // end of the loop. ?>

        </div>
        
    </main><!-- #primary -->
    
</div><!-- #primary -->

<?php get_footer();
