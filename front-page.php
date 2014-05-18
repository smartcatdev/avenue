<?php
/*
 * Short description
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */
get_header();
?>
<script>
    jQuery(document).ready(function($) {
        var options = {$AutoPlay: true};
        var jssor_slider1 = new $JssorSlider$('slider_container', options);
    });
</script>
<div id="main-slider"> <!-- #slider -->
    <div class="col-md-12">
        <div id="slider_container" style="position: relative; top: 0px; left: 0px; width: 960px; height: 300px;">
            <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; width: 960px; top: 0px; height: 300px;">
                <div><img u="image" src="http://cdn.themepride.netdna-cdn.com/themes/corp/wp-content/uploads/2014/04/ls_11.png" /></div>
                <div><img u="image" src="http://cdn.themepride.netdna-cdn.com/themes/corp/wp-content/uploads/2014/04/slide_bg_2.jpg" /></div>
            </div>
        </div>
    </div>
</div><!-- #slider -->

<div id="site-cta" class="row"><!-- #CTA boxes -->
    <div class="col-md-12">
        <div class="col-md-4 site-cta">
            <div class="col-md-2">
                <i class="fa fa-map-marker"></i>
            </div>
            <div class="col-md-10">
                <div>
                    <h3>CTA Box Title</h3>
                    <p>
                        Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repella.
                    </p>
                    <p class="text-right">
                        <a href="#" class="btn btn-default btn-primary">Click Here</a>
                    </p>                                
                </div>                            
            </div>
        </div>
        <div class="col-md-4 site-cta">
            <div class="col-md-2">
                <i class="fa fa-map-marker"></i>
            </div>
            <div class="col-md-10">
                <div>
                    <h3>CTA Box Title</h3>
                    <p>
                        Itaque earum rerum hic tenetur  Itaque earum rerum hic tenetur  Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repella.
                    </p>
                    <p class="text-right">
                        <a href="#" class="btn btn-default btn-primary">Click Here</a>
                    </p>                                
                </div>                            
            </div>
        </div>
        <div class="col-md-4 site-cta">
            <div class="col-md-2">
                <i class="fa fa-map-marker"></i>
            </div>
            <div class="col-md-10">
                <div>
                    <h3>CTA Box Title</h3>
                    <p>
                        Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repella.
                    </p>
                    <p class="text-right">
                        <a href="#" class="btn btn-default btn-primary">Click Here</a>
                    </p>
                </div>                            
            </div>
        </div>
    </div>
</div><!-- #CTA boxes -->
<div id="top-banner" class="full-banner col-md-12">
    <div class="row">
        <div class="col-md-12 center">
            <p class="top-banner-text">
                <span class="primary-color">Avenue</span> is a responsive and easily customizable theme<br>
                designed to help you set up your site in minutes

            </p>
            <p>
                <a href="#" class="btn btn-default btn-primary">Learn More</a>
            </p>
        </div>
    </div>
</div>


        <div id="content" class="site-content row">
            <div class="col-md-12">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('content', 'page'); ?>
                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if (comments_open() || '0' != get_comments_number()) :
                    comments_template();
                endif;
                ?>
            <?php endwhile; // end of the loop.  ?>
            </div>
        </div>


    <?php get_footer(); ?>