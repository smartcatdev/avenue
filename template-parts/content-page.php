<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Avenue
 */

$avenue_options     = avenue_get_options();
$sidebar_override   = get_post_meta( get_the_ID(), 'avenue_sidebar_location', true );
if ( empty( $sidebar_override ) ) {
    $sidebar_override = isset( $avenue_options['sc_single_layout'] ) && $avenue_options['sc_single_layout'] == 'col2r' ? 'right' : 'none';
}

?>

<div class="homepage-content">
    
    <div class="row">
        
        <?php if ( ( $sidebar_override == 'left' || $sidebar_override == 'leftright' || $sidebar_override == 'default' ) && is_active_sidebar( 'sidebar-left' ) ) : ?>

            <div class="col-md-4 avenue-sidebar">
                <?php get_sidebar( 'left' ); ?>
            </div>

        <?php endif; ?>
        
        <div class="col-md-<?php echo esc_attr( avenue_main_width( $sidebar_override ) ); ?>">
        
            <article id="post-<?php the_ID(); ?>">

                <h2 class="post-title">
                    <?php the_title(); ?>
                </h2>
                
                <?php if ( has_post_thumbnail() && $avenue_options['sc_single_featured'] == 'on' ) : ?>

                    <div class="featured-image">

                        <img class="feat-img" src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" alt="<?php esc_html( get_the_title() ); ?>">

                    </div>

                <?php endif; ?>

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
        
        <?php if ( ( $sidebar_override == 'right' || $sidebar_override == 'leftright' || $sidebar_override == 'default' ) && is_active_sidebar( 1 ) ) : ?>

            <div class="col-md-4 avenue-sidebar">
                <?php get_sidebar( '1' ); ?>
            </div>

        <?php endif; ?>
        
    </div>
    
</div>