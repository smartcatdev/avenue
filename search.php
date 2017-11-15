<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Avenue
 */

get_header(); ?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <section class="error-404 not-found">
        
            <header>

                <div class="container">

                    <div class="row">

                        <div class="col-sm-12">

                            <h1 class="page-title">
                                <?php printf( esc_html__( 'Search Results for: %s', 'avenue' ), '<span>' . get_search_query() . '</span>' ); ?>
                            </h1>

                        </div>

                    </div>

                </div>

            </header><!-- .page-header -->

            <div class="container">

                <div class="frontpage row">

                    <div class="col-sm-12">
                        
                        <?php if ( have_posts() ) : ?>
            
                            <?php

                            /* Start the Loop */
                            while ( have_posts() ) : the_post();

                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'template-parts/content', 'posts' );

                            endwhile;

                            the_posts_navigation();

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif; ?>

                    </div>
                    
                </div>
                
            </div>
            
        </section>
                        
    </main><!-- #main -->
    
</div><!-- #primary -->

<?php
get_footer();
