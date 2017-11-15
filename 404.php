<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Avenue
 */

get_header(); 

$avenue_options = avenue_get_options();

?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <section class="error-404 not-found">

            <div class="container">

                <div class="frontpage row">

                    <div class="col-sm-12">
                        
                        <div class="page-content">
                            
                            <article>
                                
                                <div class="widget widget_categories">
                                    
                                    <h2 class="widgettitle center">
                                        
                                        <i class="fa fa-exclamation-triangle icon404"></i>
                                        
                                        <h1 class="page-title">
                                            <?php if ( isset( $avenue_options['avenue_error_page_heading'] ) && $avenue_options['avenue_error_page_heading'] != '' ) : ?>
                                                <?php echo esc_html( $avenue_options['avenue_error_page_heading'] ); ?>
                                            <?php else : ?>
                                                <?php esc_html_e( 'Oops! That page can\'t be found.', 'avenue' ); ?>
                                            <?php endif; ?>
                                        </h1>
                                        
                                        <h3 class="description center">
                                            <?php if ( isset( $avenue_options['avenue_error_page_subheading'] ) && $avenue_options['avenue_error_page_subheading'] != '' ) : ?>
                                                <?php echo esc_html( $avenue_options['avenue_error_page_subheading'] ); ?>
                                            <?php else : ?>
                                                <?php _e('Please try again or perform a search.', 'avenue' ); ?>
                                            <?php endif; ?>
                                        </h3>
                                        
                                        <div class="center mt20">
                                            <?php get_search_form(); ?>
                                        </div>
                                        
                                    </h2>

                                </div><!-- .widget -->
                                
                            </article>
                            
                        </div><!-- .page-content -->
                        
                    </div>
                    
                </div>
                
            </div>
            
        </section><!-- .error-404 -->

    </main><!-- #main -->
    
</div><!-- #primary -->

<?php
get_footer();
