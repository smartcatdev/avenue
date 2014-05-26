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
                </div>
            </div>
            <div class="row">
                <div class=" page-content col-md-12">
                    <div class="col-md-9">
                        <?php
                        the_post_thumbnail('medium');
                        the_content();
                        // If comments are open or we have at least one comment, load up the comment template
                        if (comments_open() || '0' != get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; // end of the loop. ?>

</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>