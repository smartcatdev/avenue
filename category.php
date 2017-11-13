<?php
/*
 * Theme homepage
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */
get_header();?>

<div class="site-content-wrapper">
    <div id="content" class="page-content row">
            <div class="col-md-9">
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    if ('posts' == get_option('show_on_front')) {
                        get_template_part('content', 'posts');
                    } else {
                        get_template_part('content', 'page');
                    }
                    // If comments are open or we have at least one comment, load up the comment template
                    if (comments_open() || '0' != get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                <?php endwhile; // end of the loop.   ?>
            </div>
            <div class="col-md-3 avenue-sidebar">
                <?php get_sidebar('homepage'); ?>
            </div>
    </div>
</div>
<?php get_footer(); ?>
