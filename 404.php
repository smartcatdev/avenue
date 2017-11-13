<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package avenue
 */
get_header();
?>

<div id="content" class="site-content">
    <div class="page-title">
        <div class="row text-left">
            <div class="col-md-12">
                Page Not Found
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <?php if (avenue_categorized_blog()) : // Only show the widget if site has multiple categories. ?>
                <div class="widget widget_categories">
                    <h2 class="widgettitle center">
                        <i class="fa fa-exclamation-triangle icon404"></i>
                        <h3 class="center">Sorry the page you're looking for is not available</h3>
                        <div class="center mt20">
                            <?php get_search_form(); ?>
                        </div>
                    </h2>

                </div><!-- .widget -->
            <?php endif; ?>
        </div>
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>