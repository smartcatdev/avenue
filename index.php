<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package avenue
 */
get_header();
?>

<div id="content" class="site-content row blogroll">
    <div class="col-md-9">
        <?php if (have_posts()) : ?>
            <?php /* Start the Loop */ ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="item-post col-md-12">
                    <div class="post-thumb col-md-4">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                    </div>
                    <div class="col-md-8">
                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="post-content">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="text-right">
                            <a class="btn btn-default btn-primary" href="<?php the_permalink(); ?>">Read More</a>
                        </div>                        
                    </div>

                    
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif; ?>
    </div>
    <div class="col-md-3">
        <?php get_sidebar(); ?>
    </div>
    <div class="col-md-12">
        <?php avenue_paging_nav(); ?>
    </div>

</div>

<?php get_footer(); ?>
