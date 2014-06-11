<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package avenue
 */
get_header();
?>

<div id="content" class="site-content">

    <?php if (have_posts()) : ?>

        <div class="col-md-12">
            <div class="page-title">
                <div class="row center">

                    <?php
                    if (is_category()) :
                        single_cat_title();

                    elseif (is_tag()) :
                        single_tag_title();

                    elseif (is_author()) :
                        printf(__('Author: %s', 'avenue'), '<span class="vcard">' . get_the_author() . '</span>');

                    elseif (is_day()) :
                        printf(__('Day: %s', 'avenue'), '<span>' . get_the_date() . '</span>');

                    elseif (is_month()) :
                        printf(__('Month: %s', 'avenue'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'avenue')) . '</span>');

                    elseif (is_year()) :
                        printf(__('Year: %s', 'avenue'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'avenue')) . '</span>');

                    elseif (is_tax('post_format', 'post-format-aside')) :
                        _e('Asides', 'avenue');

                    elseif (is_tax('post_format', 'post-format-gallery')) :
                        _e('Galleries', 'avenue');

                    elseif (is_tax('post_format', 'post-format-image')) :
                        _e('Images', 'avenue');

                    elseif (is_tax('post_format', 'post-format-video')) :
                        _e('Videos', 'avenue');

                    elseif (is_tax('post_format', 'post-format-quote')) :
                        _e('Quotes', 'avenue');

                    elseif (is_tax('post_format', 'post-format-link')) :
                        _e('Links', 'avenue');

                    elseif (is_tax('post_format', 'post-format-status')) :
                        _e('Statuses', 'avenue');

                    elseif (is_tax('post_format', 'post-format-audio')) :
                        _e('Audios', 'avenue');

                    elseif (is_tax('post_format', 'post-format-chat')) :
                        _e('Chats', 'avenue');

                    else :
                        _e('Archives', 'avenue');

                    endif;
                    ?>
                </div>
            </div>
            <div class="row">
                <div class=" page-content col-md-12">
                    <div class="col-md-9">
                        <?php
                        // Show an optional term description.
                        $term_description = term_description();
                        if (!empty($term_description)) :
                            printf('<div class="taxonomy-description">%s</div>', $term_description);
                        endif;
                        ?>
                        </header><!-- .page-header -->

                        <?php /* Start the Loop */ ?>
                        <?php while (have_posts()) : the_post(); ?>

                            <?php
                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('content', get_post_format());
                            ?>

                        <?php endwhile; ?>

                        <?php avenue_paging_nav(); ?>

                    <?php else : ?>

                        <?php get_template_part('content', 'none'); ?>

                    <?php endif; ?>   
                </div>
                <div class="col-md-3">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
