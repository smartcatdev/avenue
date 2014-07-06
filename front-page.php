<?php
/*
 * Theme homepage
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */
get_header();
?>
<script>
    jQuery(document).ready(function($) {



    });
</script>
<?php if(of_get_option('sc_slider_bool','yes')=='yes') echo sc_slider(); ?>
<?php if(of_get_option('sc_cta_bool','yes')=='yes') echo sc_ctas(); ?>
<?php if(of_get_option('sc_banner_bool','yes')=='yes') echo sc_banner(); ?>

<div id="content" class="site-content row">
    <div class="col-md-12">
        <?php while (have_posts()) : the_post(); ?>
            <?php
                if('posts' == get_option('show_on_front')){
                    get_template_part('content', 'posts');
                }else{
                    get_template_part('content', 'page');
                }
            // If comments are open or we have at least one comment, load up the comment template
            if (comments_open() || '0' != get_comments_number()) :
                comments_template();
            endif;
            ?>
        <?php endwhile; // end of the loop.  ?>
    </div>
</div>
<?php get_footer(); ?>