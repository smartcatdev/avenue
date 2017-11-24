<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Avenue
 */

get_header(); 

$avenue_options = avenue_get_options();
$alternate_blog = isset( $avenue_options['blog_layout_style'] ) && $avenue_options['blog_layout_style'] == 'masonry' ? true : false;

?>

<div id="primary" class="content-area">

    <main id="main" class="site-main index">
  
        <div class="container">

            <div class="page-content row">

                <?php 
                
                if ( ( $avenue_options['sc_blog_layout_left'] == 'col2l' && is_active_sidebar( 'sidebar-left' ) ) && ( $avenue_options['sc_blog_layout'] == 'col2r' && is_active_sidebar( 1 ) ) ) : 
                    $columns = 4;
                elseif ( ( $avenue_options['sc_blog_layout_left'] == 'col2l' && is_active_sidebar( 'sidebar-left' ) ) || ( $avenue_options['sc_blog_layout'] == 'col2r' && is_active_sidebar( 1 ) ) ) : 
                    $columns = 8;
                else :
                    $columns = 12;
                endif;
                
                if ( $avenue_options['sc_blog_layout_left'] == 'col2l' && is_active_sidebar( 'sidebar-left' ) ) : ?>
                    
                    <div class="col-md-4 avenue-sidebar">
                        <?php get_sidebar( 'left' ); ?>
                    </div>

                <?php endif; ?>
                
                <div class="col-md-<?php echo esc_attr( $columns ); ?> site-content item-page">

                    <?php if ( have_posts() ) :
                    
                        if ( $alternate_blog ) : ?>

                            <div id="avenue-alt-blog-wrap">

                                <div id="masonry-blog-wrapper">

                                    <div class="grid-sizer"></div>
                                    <div class="gutter-sizer"></div>

                        <?php endif;
                    
                        while ( have_posts() ) : the_post();

                            if ( $alternate_blog ) :
                                    
                                get_template_part('template-parts/content', 'posts-alt' );
                                    
                            else : ?>
                                    
                                <div class="item-post">

                                    <?php if ( $avenue_options['sc_blog_featured'] == 'on' && has_post_thumbnail() ) : ?>

                                        <div class="post-thumb col-sm-4">

                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('large'); ?>
                                            </a>
                                            <div class="clear"></div>
                                            
                                        </div>

                                    <?php endif; ?>

                                    <div class="col-sm-<?php echo $avenue_options['sc_blog_featured'] == 'on' && has_post_thumbnail() ? '8' : '12'; ?> <?php echo has_post_thumbnail() ? '' : 'text-left'; ?>">

                                        <h2 class="post-title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>

                                        <div class="post-content">
                                            <?php the_excerpt(); ?>
                                        </div>

                                        <div class="text-right">
                                            <a class="btn btn-default btn-primary avenue-button" href="<?php the_permalink(); ?>">
                                                <?php _e( 'Read More', 'avenue' ); ?>
                                            </a>
                                        </div>  

                                    </div>
                                    
                                    <div class="clear"></div>

                                </div>
                                    
                            <?php endif;

                        endwhile;
                                    
                        if ( $alternate_blog ) : ?>

                                </div>
                                
                            </div>

                        <?php endif; ?>

                        <div class="pagination-links">
                            <?php echo the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
                        </div>
                    
                    <?php else : ?>
                    
                        <?php get_template_part('template-parts/content', 'none'); ?>
                    
                    <?php endif; ?>
                    
                </div>
                
                <?php if ( $avenue_options['sc_blog_layout'] == 'col2r' && is_active_sidebar( 1 ) ) : ?>

                    <div class="col-md-4 avenue-sidebar">
                        <?php get_sidebar( '1' ); ?>
                    </div>

                <?php endif; ?>
                
            </div>
            
            <div class="clear"></div>
            
        </div>

    </main>
    
</div>

<?php get_footer();