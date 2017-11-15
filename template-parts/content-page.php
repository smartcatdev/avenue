<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Avenue
 */

$avenue_options = avenue_get_options();

$alternate_layout = isset( $avenue_options['single_post_layout_style'] ) && $avenue_options['single_post_layout_style'] == 'alternate' ? true : false;

?>

<div class="homepage-content">
    
    <div class="row">
        
        <div class="col-md-<?php echo $avenue_options['sc_single_layout'] == 'col2r' && is_active_sidebar(1) ? '8' : '12'; ?>">
        
            <?php if ( has_post_thumbnail() && $avenue_options['sc_single_featured'] == 'on' && $alternate_layout ) : ?>
            
                <div class="featured-image">

                    <img class="feat-img" src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" alt="<?php esc_html( get_the_title() ); ?>">

                </div>
            
            <?php endif; ?>
            
            <article id="post-<?php the_ID(); ?>">

                <header class="entry-header">
                    <?php the_title( '<h2 class="post-title ' . ( ( $alternate_layout ) ? 'alt-layout' : '' ) . '">', '</h2>' ); ?>
                    <div class="avenue-underline"></div>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'avenue' ),
                        'after' => '</div>',
                    ) );
                    ?>
                </div><!-- .entry-content -->
                <footer class="entry-footer">
                    <?php edit_post_link( __( 'Edit', 'avenue' ), '<span class="edit-link">', '</span>' ); ?>
                </footer><!-- .entry-footer -->

            </article><!-- #post-## -->
            
        </div>
        
        <?php if ( $avenue_options['sc_single_layout'] == 'col2r' && is_active_sidebar(1) ) : ?>
            
            <div class="col-md-4 avenue-sidebar">
                <?php get_sidebar(); ?>
            </div>
        
        <?php endif; ?>
        
    </div>
    
</div>